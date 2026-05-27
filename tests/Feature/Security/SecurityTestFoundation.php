<?php


namespace Tests\Feature\Security;

use Tests\SecurityTestCase;

/**
 * Smoke tests verifying the SecurityTestCase base class and SecurityTestSeeder.
 */

class SecurityTestFoundation extends SecurityTestCase
{
    public function testAllSecurityTestUsersExist(): void
    {
        $expectedUsernames = [
            'test_super_admin',
            'test_admin',
            'test_clinician',
            'test_nurse',
            'test_front_desk',
            'test_patient_user',
        ];

        foreach ($expectedUsernames as $username) {
            $this->assertDatabaseHas('users', ['username' => $username]);
        }
    }

    public function testAllSecurityRolesExist(): void
    {
        foreach (['super_admin', 'admin', 'clinician', 'nurse', 'user', 'patient'] as $role) {
            $this->assertDatabaseHas('roles', ['name' => $role]);
        }
    }

    public function testEachUserHasCorrectRole(): void
    {
        $this->assertTrue($this->superAdmin->hasRole('super_admin'));
        $this->assertTrue($this->admin->hasRole('admin'));
        $this->assertTrue($this->clinician->hasRole('clinician'));
        $this->assertTrue($this->nurse->hasRole('nurse'));
        $this->assertTrue($this->frontDesk->hasRole('user'));
        $this->assertTrue($this->patientUser->hasRole('patient'));
    }


    public function testSuperAdminHasManageUsersPermission(): void
    {
        $this->assertTrue($this->superAdmin->isAbleTo('manage-users'));
    }

    public function testClinicianHasManagePrescriptionsPermission(): void
    {
        $this->assertTrue($this->clinician->isAbleTo('manage-prescriptions'));
    }

    public function testNurseCannotManagePrescriptions(): void
    {
        $this->assertFalse($this->nurse->isAbleTo('manage-prescriptions'));
    }

    public function testFrontDeskCannotViewClinicalData(): void
    {
        $this->assertFalse($this->frontDesk->isAbleTo('view-clinical-data'));
    }

    public function testPatientHasLimitedPermissions(): void
    {
        $this->assertTrue($this->patientUser->isAbleTo('view-own-records'));
        $this->assertFalse($this->patientUser->isAbleTo('view-patients'));
        $this->assertFalse($this->patientUser->isAbleTo('manage-users'));
    }

    public function testCreateTestPatientWithFaceSheet(): void
    {
        $patient = $this->createTestPatient();

        $this->assertNotNull($patient->faceSheet);
        $this->assertEquals('John', $patient->faceSheet->first_name);
        $this->assertEquals('SecurityTest', $patient->faceSheet->last_name);
        $this->assertDatabaseHas('patients', ['id' => $patient->id]);
        $this->assertDatabaseHas('patient_face_sheets', ['patient_id' => $patient->id]);
    }

    public function testSecondTestPatientIsDistinct(): void
    {
        $patient1 = $this->createTestPatient();
        $patient2 = $this->createSecondTestPatient();

        $this->assertNotEquals($patient1->id, $patient2->id);
        $this->assertNotEquals($patient1->pid, $patient2->pid);
        $this->assertEquals('Jane', $patient2->faceSheet->first_name);
    }


    public function testDashboardRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard');
    }

    public function testAdminPanelRequiresAuthentication(): void
    {
        $this->assertRouteRequiresAuth('GET', '/secure.portal/admin');
    }

    public function testAllTestUserPasswordsAreBcryptHashed(): void
    {
        foreach ($this->getAllTestUsers() as $role => $user) {
            $this->assertStringStartsWith(
                '$2y$',
                $user->password,
                "[{$role}] password is not bcrypt hashed — plaintext credentials in DB"
            );
        }
    }
}
