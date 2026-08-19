<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU3 — Privacy
 * Endpoint: /dashboard
 *
 * Verifies that the dashboard landing page is accessible only to users with
 * the dashboard role (super_admin, admin, user) and enforces auth.
 */
class DashboardAccessSecurityTest extends SecurityTestCase
{
    public function testDashboardRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard');
    }

    public function testAuthorizedRolesCanAccessDashboard(): void
    {
        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->get('/dashboard')
                ->assertStatus(200);
        }
    }

    public function testUnauthorizedRolesCannotAccessDashboard(): void
    {
        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->get('/dashboard')
                ->assertStatus(403);
        }
    }

    public function testDashboardResponseHasSecurityHeaders(): void
    {
        $response = $this->actingAs($this->admin)
            ->get('/dashboard');

        $this->assertSecurityHeaders($response);
    }
}
