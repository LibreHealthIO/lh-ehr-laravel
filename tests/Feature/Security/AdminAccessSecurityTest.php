<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU3 — Privacy
 * Endpoint: /secure.portal/admin
 *
 * Verifies that the admin portal is restricted to super_admin and admin roles.
 */
class AdminAccessSecurityTest extends SecurityTestCase
{
    public function testAdminPanelRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/secure.portal/admin');
    }

    public function testAdminAndSuperAdminCanAccessAdminPanel(): void
    {
        foreach ([$this->superAdmin, $this->admin] as $user) {
            $this->actingAs($user)
                ->get('/secure.portal/admin')
                ->assertStatus(200);
        }
    }

    public function testNonAdminRolesCannotAccessAdminPanel(): void
    {
        foreach ([$this->frontDesk, $this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->get('/secure.portal/admin')
                ->assertStatus(403);
        }
    }

    public function testAdminPanelResponseHasSecurityHeaders(): void
    {
        $response = $this->actingAs($this->admin)
            ->get('/secure.portal/admin');

        $this->assertSecurityHeaders($response);
    }
}
