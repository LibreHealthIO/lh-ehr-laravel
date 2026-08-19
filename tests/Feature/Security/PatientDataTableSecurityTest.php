<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU2 — Clinical Data Exchange
 * Endpoint: /dashboard/patients/load/data
 *
 * Verifies that the patient data table endpoint enforces authentication,
 * role-based access, and is resilient to injection payloads in its
 * query parameters.
 */
class PatientDataTableSecurityTest extends SecurityTestCase
{
    public function testPatientDataTableRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard/patients/load/data');
    }

    public function testAuthorizedRolesCanLoadPatientData(): void
    {
        $this->createTestPatient();

        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->getJson('/dashboard/patients/load/data?length=10&column=0&dir=asc&search=')
                ->assertStatus(200);
        }
    }

    public function testUnauthorizedRolesCannotLoadPatientData(): void
    {
        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->getJson('/dashboard/patients/load/data?length=10&column=0&dir=asc&search=')
                ->assertStatus(403);
        }
    }

    public function testSearchParameterIsSafeAgainstSqlInjection(): void
    {
        $this->assertSqlInjectionSafe(
            'GET',
            '/dashboard/patients/load/data',
            ['length' => 10, 'column' => 0, 'dir' => 'asc'],
            'search',
            $this->superAdmin
        );
    }

    public function testSearchParameterDoesNotReflectXss(): void
    {
        $this->assertXssSanitized(
            'GET',
            '/dashboard/patients/load/data',
            ['length' => 10, 'column' => 0, 'dir' => 'asc'],
            'search',
            $this->superAdmin
        );
    }
}
