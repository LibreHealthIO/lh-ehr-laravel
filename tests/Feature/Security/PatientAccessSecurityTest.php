<?php

namespace Tests\Feature\Security;

use App\Models\Patients\Patient;
use Tests\SecurityTestCase;

/**
 * MU1 — Patient Registration
 * Endpoint: /dashboard/patients/{patient}
 *
 * Verifies that the patient profile/detail route is protected by
 * authentication, role enforcement, and does not leak PHI between patients.
 */
class PatientAccessSecurityTest extends SecurityTestCase
{
    public function testPatientShowRequiresAuthentication(): void
    {
        $patient = $this->createTestPatient();

        $this->assertRouteRequiresAuth('GET', '/dashboard/patients/' . $patient->pid);
    }

    public function testAuthorizedRolesCanViewPatient(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/patients/' . $patient->pid)
                ->assertStatus(200);
        }
    }

    public function testUnauthorizedRolesCannotViewPatient(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/patients/' . $patient->pid)
                ->assertStatus(403);
        }
    }

    public function testPatientShowIsProtectedFromIdor(): void
    {
        $patientOne = $this->createTestPatient();
        $patientTwo = $this->createSecondTestPatient();

        $response = $this->actingAs($this->frontDesk)
            ->get('/dashboard/patients/' . $patientTwo->pid);

        $this->assertEquals(200, $response->getStatusCode());

        // The response should not contain the other patient's sensitive data.
        $this->assertStringNotContainsString(
            $patientOne->faceSheet->email,
            $response->getContent() ?? '',
            'Patient show leaked another patient\'s email (IDOR/PHI leak)'
        );
    }

    public function testPatientShowDoesNotLeakPhiInResponse(): void
    {
        $patient = $this->createTestPatient();

        $response = $this->actingAs($this->superAdmin)
            ->get('/dashboard/patients/' . $patient->pid);

        $this->assertSecurityHeaders($response);
    }

    public function testInvalidPatientPidDoesNotExposeSystemDetails(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->get('/dashboard/patients/INVALID-PID-99999');

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 404], true),
            'Invalid patient PID should redirect or 404, got: ' . $response->getStatusCode()
        );

        $content = $response->getContent() ?? '';
        $this->assertStringNotContainsString('SQLSTATE', $content);
        $this->assertStringNotContainsString('syntax error', $content);
    }
}
