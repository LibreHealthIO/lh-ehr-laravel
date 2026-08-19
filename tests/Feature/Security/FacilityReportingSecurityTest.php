<?php

namespace Tests\Feature\Security;

use App\Models\Facilities\Facility;
use Tests\SecurityTestCase;

/**
 * MU6 — Reporting
 * Endpoint: /dashboard/facilities
 *
 * Focuses on PHI/sensitive data leakage in facility reporting responses.
 */
class FacilityReportingSecurityTest extends SecurityTestCase
{
    public function testUnauthorizedRolesCannotReadFacilityData(): void
    {
        $facility = Facility::factory()->create([
            'name' => 'Acme Secure Facility',
            'email' => 'secure-facility@example.com',
        ]);

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $response = $this->actingAs($user)
                ->get('/dashboard/facilities/' . $facility->id);

            $this->assertNotEquals(200, $response->getStatusCode());
            $this->assertStringNotContainsString(
                $facility->email,
                $response->getContent() ?? '',
                'Unauthorized role read facility email'
            );
        }
    }

    public function testFacilitiesIndexResponseHasSecurityHeaders(): void
    {
        Facility::factory()->create();

        $response = $this->actingAs($this->admin)
            ->get('/dashboard/facilities');

        $this->assertSecurityHeaders($response);
    }

    public function testInvalidFacilityIdDoesNotLeakSystemDetails(): void
    {
        $response = $this->actingAs($this->superAdmin)
            ->get('/dashboard/facilities/999999');

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 404], true),
            'Invalid facility ID should redirect or 404, got: ' . $response->getStatusCode()
        );

        $content = $response->getContent() ?? '';
        $this->assertStringNotContainsString('SQLSTATE', $content);
        $this->assertStringNotContainsString('syntax error', $content);
    }
}
