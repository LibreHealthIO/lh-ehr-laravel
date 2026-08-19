<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU3 — Privacy
 * Endpoint: /dashboard/users
 *
 * Verifies that user management routes are protected by authentication and
 * dashboard role middleware.
 */
class UserManagementSecurityTest extends SecurityTestCase
{
    public function testUsersIndexRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard/users');
    }

    public function testAuthorizedRolesCanAccessUsersIndex(): void
    {
        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/users')
                ->assertStatus(200);
        }
    }

    public function testUnauthorizedRolesCannotAccessUsersIndex(): void
    {
        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/users')
                ->assertStatus(403);
        }
    }

    public function testUsersStoreRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('POST', '/dashboard/users', [
            'username' => 'new_user',
            'email' => 'new_user@test.com',
        ]);
    }

    public function testUsersStoreIsCsrfProtected(): void
    {
        $this->assertCsrfProtected('POST', '/dashboard/users', [
            'username' => 'new_user',
            'email' => 'new_user@test.com',
        ]);
    }

    public function testUsersStoreDoesNotCrashOnXssPayloads(): void
    {
        foreach ($this->xssPayloads as $name => $payload) {
            $response = $this->actingAs($this->superAdmin)
                ->post('/dashboard/users', [
                    'username' => $payload,
                    'email' => 'xss@test.com',
                ]);

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "XSS payload [{$name}] caused server error on users store"
            );
        }
    }
}
