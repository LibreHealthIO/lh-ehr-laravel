<?php

namespace Tests\Feature\Security;

use App\Models\Facilities\Facility;
use Tests\SecurityTestCase;

/**
 * MU6 — Reporting
 * Endpoint: /dashboard/facilities
 *
 * Verifies that facility reporting routes enforce authentication and
 * dashboard role access.
 */
class FacilitySecurityTest extends SecurityTestCase
{
    public function testFacilitiesIndexRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard/facilities');
    }

    public function testAuthorizedRolesCanAccessFacilities(): void
    {
        Facility::factory()->create();

        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/facilities')
                ->assertStatus(200);
        }
    }

    public function testUnauthorizedRolesCannotAccessFacilities(): void
    {
        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/facilities')
                ->assertStatus(403);
        }
    }

    public function testFacilityShowRequiresAuthentication(): void
    {
        $facility = Facility::factory()->create();

        $this->assertRouteRequiresAuth('GET', '/dashboard/facilities/' . $facility->id);
    }

    public function testAuthorizedRolesCanViewFacility(): void
    {
        $facility = Facility::factory()->create();

        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $this->actingAs($user)
                ->get('/dashboard/facilities/' . $facility->id)
                ->assertStatus(200);
        }
    }
}
