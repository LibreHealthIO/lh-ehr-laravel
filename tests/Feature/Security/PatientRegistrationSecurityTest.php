<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU1 — Patient Registration
 * Endpoints: /dashboard/patients/create, /dashboard/patients (POST)
 *
 * Verifies that patient registration routes require authentication and
 * enforce dashboard role access. XSS/SQLi/CSRF smoke tests are included
 * even though the store action is currently a stub.
 */
class PatientRegistrationSecurityTest extends SecurityTestCase
{
    public function testPatientCreateRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard/patients/create');
    }

    public function testPatientStoreRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('POST', '/dashboard/patients', [
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }

    public function testAuthorizedRolesCanAccessCreateForm(): void
    {
        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/patients/create')
                ->assertStatus(200);
        }
    }

    public function testUnauthorizedRolesCannotAccessCreateForm(): void
    {
        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/patients/create')
                ->assertStatus(403);
        }
    }

    public function testStoreDoesNotCrashOnXssPayloads(): void
    {
        foreach ($this->xssPayloads as $name => $payload) {
            $response = $this->actingAs($this->superAdmin)
                ->post('/dashboard/patients', [
                    'first_name' => $payload,
                    'last_name' => 'SecurityTest',
                ]);

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "XSS payload [{$name}] caused server error on patient store"
            );
        }
    }

    public function testStoreDoesNotCrashOnSqlInjectionPayloads(): void
    {
        foreach ($this->sqlInjectionPayloads as $name => $payload) {
            $response = $this->actingAs($this->superAdmin)
                ->post('/dashboard/patients', [
                    'first_name' => $payload,
                    'last_name' => 'SecurityTest',
                ]);

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "SQLi payload [{$name}] caused server error on patient store"
            );

            $this->assertStringNotContainsString(
                'SQLSTATE',
                $response->getContent() ?? '',
                "SQLi payload [{$name}] leaked database error on patient store"
            );
        }
    }

    public function testPatientStoreIsCsrfProtected(): void
    {
        $this->assertCsrfProtected('POST', '/dashboard/patients', [
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }
}
