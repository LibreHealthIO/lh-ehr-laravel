<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU5 — Clinical Decision Support
 * Endpoint: /dashboard/patients/{pid}/appointments
 *
 * Focuses on data leakage and access boundaries for appointment-related
 * clinical decision support views.
 */
class ClinicalDecisionSupportAppointmentSecurityTest extends SecurityTestCase
{
    public function testAppointmentsDoNotLeakPhiToUnauthorizedRoles(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $response = $this->actingAs($user)
                ->selectPatient($patient)
                ->get('/dashboard/patients/' . $patient->pid . '/appointments');

            $this->assertNotEquals(200, $response->getStatusCode());
            $this->assertStringNotContainsString(
                $patient->faceSheet->email,
                $response->getContent() ?? '',
                'Unauthorized role read patient email from appointments response'
            );
        }
    }

    public function testSqlInjectionPayloadsInPatientIdDoNotCauseErrors(): void
    {
        foreach ($this->sqlInjectionPayloads as $name => $payload) {
            $response = $this->actingAs($this->admin)
                ->get('/dashboard/patients/' . urlencode($payload) . '/appointments');

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "SQLi payload [{$name}] in appointment route caused server error"
            );

            $this->assertStringNotContainsString(
                'SQLSTATE',
                $response->getContent() ?? '',
                "SQLi payload [{$name}] leaked database error"
            );
        }
    }
}
