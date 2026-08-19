<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU2 — Clinical Data Exchange
 * Endpoint: /dashboard/patients/load/data
 *
 * Focuses on PHI leakage and clinical data access boundaries.
 */
class ClinicalDataExchangeSecurityTest extends SecurityTestCase
{
    public function testPatientDataTableDoesNotLeakPhiToUnauthorizedRoles(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $response = $this->actingAs($user)
                ->getJson('/dashboard/patients/load/data?length=10&column=0&dir=asc&search=' . $patient->pid);

            $this->assertNotEquals(200, $response->getStatusCode());
            $this->assertStringNotContainsString(
                $patient->faceSheet->email,
                $response->getContent() ?? '',
                'Unauthorized role was able to read patient email from data table response'
            );
        }
    }

    public function testPatientDataTableResponseContainsExpectedPhiForAuthorizedRoles(): void
    {
        $patient = $this->createTestPatient();

        $response = $this->actingAs($this->admin)
            ->getJson('/dashboard/patients/load/data?length=10&column=0&dir=asc&search=' . $patient->pid);

        $response->assertStatus(200);
        $this->assertStringContainsString(
            $patient->faceSheet->first_name,
            $response->getContent() ?? ''
        );
    }

    public function testMalformedQueryParametersDoNotLeakSystemDetails(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->getJson('/dashboard/patients/load/data?length=malformed&column[]=invalid&dir=<script>alert(1)</script>');

        $this->assertNotEquals(500, $response->getStatusCode());

        $content = $response->getContent() ?? '';
        $this->assertStringNotContainsString('SQLSTATE', $content);
        $this->assertStringNotContainsString('syntax error', $content);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $content);
    }
}
