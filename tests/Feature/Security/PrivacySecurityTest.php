<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU3 — Privacy
 * Endpoint: /dashboard/users
 *
 * Focuses on user data privacy: sensitive values and access boundaries.
 */
class PrivacySecurityTest extends SecurityTestCase
{
    public function testUsersIndexDoesNotLeakPasswordHashes(): void
    {
        $response = $this->actingAs($this->admin)
            ->get('/dashboard/users');

        $this->assertStringNotContainsString(
            '$2y$',
            $response->getContent() ?? '',
            'Users index leaked bcrypt password hashes'
        );
    }

    public function testUsersIndexDoesNotLeakPlaintextPasswords(): void
    {
        $response = $this->actingAs($this->admin)
            ->get('/dashboard/users');

        $this->assertStringNotContainsString(
            'security_test_123',
            $response->getContent() ?? '',
            'Users index leaked plaintext test passwords'
        );
    }

    public function testUnauthorizedUsersCannotListUsers(): void
    {
        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $response = $this->actingAs($user)
                ->get('/dashboard/users');

            $this->assertStatus(403, $response);
            $this->assertStringNotContainsString(
                $this->admin->email,
                $response->getContent() ?? '',
                'Unauthorized user was able to read admin email from users response'
            );
        }
    }

    public function testUserEditRouteRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard/users/' . $this->admin->id . '/edit');
    }

    public function testUserDeleteRouteRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('DELETE', '/dashboard/users/' . $this->admin->id);
    }
}
