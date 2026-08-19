<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU6 — Reporting
 * Endpoint: /dashboard/patients/{pid}/reports
 *
 * Focuses on PHI leakage and access boundaries for patient reporting views.
 */
class PatientReportingSecurityTest extends SecurityTestCase
{
    public function testPatientReportsDoNotLeakPhiToUnauthorizedRoles(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $response = $this->actingAs($user)
                ->selectPatient($patient)
                ->get('/dashboard/patients/' . $patient->pid . '/reports');

            $this->assertNotEquals(200, $response->getStatusCode());
            $this->assertStringNotContainsString(
                $patient->faceSheet->email,
                $response->getContent() ?? '',
                'Unauthorized role read patient email from reports response'
            );
        }
    }

    public function testSqlInjectionPayloadsInPatientReportsRouteDoNotCauseErrors(): void
    {
        foreach ($this->sqlInjectionPayloads as $name => $payload) {
            $response = $this->actingAs($this->admin)
                ->get('/dashboard/patients/' . urlencode($payload) . '/reports');

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "SQLi payload [{$name}] in patient reports route caused server error"
            );

            $this->assertStringNotContainsString(
                'SQLSTATE',
                $response->getContent() ?? '',
                "SQLi payload [{$name}] leaked database error"
            );
        }
    }
}
