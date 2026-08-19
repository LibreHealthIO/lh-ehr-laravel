<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU3 — Privacy
 * Endpoints: /login, /logout
 *
 * Verifies authentication boundary behavior for the public login form and
 * authenticated logout action.
 */
class AuthSecurityTest extends SecurityTestCase
{
    public function testLoginFormIsAccessibleWithoutAuthentication(): void
    {
        $response = $this->get('/login');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testLoginWithValidCredentialsRedirectsAuthenticatedUser(): void
    {
        $response = $this->post('/login', [
            'account' => $this->admin->username,
            'password' => 'security_test_123',
        ]);

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 200], true),
            'Login with valid credentials should redirect or return Inertia location'
        );
        $this->assertAuthenticatedAs($this->admin);
    }

    public function testLoginWithInvalidCredentialsIsRejected(): void
    {
        $response = $this->post('/login', [
            'account' => $this->admin->username,
            'password' => 'wrong-password',
        ]);

        $this->assertFalse(
            $this->isAuthenticated(),
            'User should not be authenticated with invalid password'
        );

        $this->assertNotEquals(500, $response->getStatusCode());
    }

    public function testLoginIsCsrfProtected(): void
    {
        $this->assertCsrfProtected('POST', '/login', [
            'account' => $this->admin->username,
            'password' => 'security_test_123',
        ]);
    }

    public function testLogoutRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('POST', '/logout');
    }

    public function testLogoutTerminatesAuthenticatedSession(): void
    {
        $this->actingAs($this->admin)
            ->post('/logout')
            ->assertStatus(200);

        $this->assertFalse($this->isAuthenticated());
    }

    public function testSqlInjectionPayloadsInLoginFormDoNotCauseErrors(): void
    {
        foreach ($this->sqlInjectionPayloads as $name => $payload) {
            $response = $this->post('/login', [
                'account' => $payload,
                'password' => 'password',
            ]);

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "SQLi payload [{$name}] caused server error on login"
            );

            $this->assertStringNotContainsString(
                'SQLSTATE',
                $response->getContent() ?? '',
                "SQLi payload [{$name}] leaked database error on login"
            );
        }
    }
}
