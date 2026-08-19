<?php

namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * MU5 — Clinical Decision Support
 * Endpoint: /dashboard/patients/{pid}/appointments
 *
 * Verifies that patient appointment routes require authentication, role
 * enforcement, and the selected-patient cookie middleware.
 */
class CalendarAppointmentSecurityTest extends SecurityTestCase
{
    public function testAppointmentsRequiresAuthentication(): void
    {
        $patient = $this->createTestPatient();

        $this->assertRouteRequiresAuth('GET', '/dashboard/patients/' . $patient->pid . '/appointments');
    }

    public function testAppointmentsRequiresSelectedPatientCookie(): void
    {
        $patient = $this->createTestPatient();

        // Without selecting the patient first, the request should be rejected.
        $response = $this->actingAs($this->admin)
            ->get('/dashboard/patients/' . $patient->pid . '/appointments');

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 403, 404], true),
            'Accessing appointments without selected patient cookie should redirect or fail, got: ' . $response->getStatusCode()
        );
    }

    public function testAuthorizedRolesCanAccessAppointmentsWithSelectedPatient(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->superAdmin, $this->admin, $this->frontDesk] as $user) {
            $response = $this->actingAs($user)
                ->selectPatient($patient)
                ->get('/dashboard/patients/' . $patient->pid . '/appointments');

            // The controller currently dumps debug output; the middleware
            // should at least allow the request past access control.
            $this->assertNotEquals(403, $response->getStatusCode());
            $this->assertNotEquals(404, $response->getStatusCode());
        }
    }

    public function testUnauthorizedRolesCannotAccessAppointments(): void
    {
        $patient = $this->createTestPatient();

        foreach ([$this->clinician, $this->nurse, $this->patientUser] as $user) {
            $this->actingAs($user)
                ->selectPatient($patient)
                ->get('/dashboard/patients/' . $patient->pid . '/appointments')
                ->assertStatus(403);
        }
    }

    public function testAppointmentsWithMismatchedPatientCookieIsRejected(): void
    {
        $patientOne = $this->createTestPatient();
        $patientTwo = $this->createSecondTestPatient();

        // Cookie says patientOne, URL says patientTwo.
        $response = $this->actingAs($this->admin)
            ->selectPatient($patientOne)
            ->get('/dashboard/patients/' . $patientTwo->pid . '/appointments');

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 403, 404], true),
            'Mismatched patient cookie should redirect or fail, got: ' . $response->getStatusCode()
        );
    }
}
