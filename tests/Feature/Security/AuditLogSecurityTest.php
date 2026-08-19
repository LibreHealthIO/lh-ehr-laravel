<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU6 — Reporting
 * Endpoint: /dashboard/patients/{pid}/reports
 *
 * Verifies that patient reporting routes require authentication, role
 * enforcement, and the selected-patient cookie middleware.
 */
class AuditLogSecurityTest extends SecurityTestCase
{
    public function testPatientReportsRequiresAuthentication(): void
    {
        $patient = $this->createTestPatient();

        $this->assertRouteRequiresAuth('GET', '/dashboard/patients/' . $patient->pid . '/reports');
    }

    public function testPatientReportsRequiresSelectedPatientCookie(): void
    {
        $patient = $this->createTestPatient();

        $response = $this->actingAs($this->admin)
            ->get('/dashboard/patients/' . $patient->pid . '/reports');

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 403, 404], true),
            'Accessing patient reports without selected patient cookie should redirect or fail, got: ' . $response->getStatusCode()
        );
    }

    public function testAuthorizedRolesCanAccessPatientReportsWithSelectedPatient(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $response = $this->actingAs($user)
                ->selectPatient($patient)
                ->get('/dashboard/patients/' . $patient->pid . '/reports');

            // The controller action is currently unimplemented, but access
            // control should be enforced before the 500 is reached.
            $this->assertNotEquals(403, $response->getStatusCode());
        }
    }

    public function testUnauthorizedRolesCannotAccessPatientReports(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->selectPatient($patient)
                ->get('/dashboard/patients/' . $patient->pid . '/reports')
                ->assertStatus(403);
        }
    }

    public function testPatientReportsWithMismatchedCookieIsRejected(): void
    {
        $patientOne = $this->createTestPatient();
        $patientTwo = $this->createSecondTestPatient();

        $response = $this->actingAs($this->admin)
            ->selectPatient($patientOne)
            ->get('/dashboard/patients/' . $patientTwo->pid . '/reports');

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 403, 404], true),
            'Mismatched patient cookie should redirect or fail, got: ' . $response->getStatusCode()
        );
    }
}
