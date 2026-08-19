<?php


namespace Tests\Feature\Security;

use App\Models\Permission;
use Illuminate\Support\Facades\DB;
use Tests\SecurityTestCase;

/**
 * Tests for verifying the SecurityTestCase base class and SecurityTestSeeder.
 */

class SecurityTestFoundationTest extends SecurityTestCase
{
    public function testSecurityTestUsersExist(): void
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

    public function testSecurityRolesExist(): void
    {
        foreach (['super_admin', 'admin', 'clinician', 'nurse', 'user', 'patient'] as $role) {
            $this->assertDatabaseHas('roles', ['name' => $role]);
        }
    }

    public function testUserRole(): void
    {
        $this->assertTrue($this->superAdmin->hasRole('super_admin'));
        $this->assertTrue($this->admin->hasRole('admin'));
        $this->assertTrue($this->clinician->hasRole('clinician'));
        $this->assertTrue($this->nurse->hasRole('nurse'));
        $this->assertTrue($this->frontDesk->hasRole('user'));
        $this->assertTrue($this->patientUser->hasRole('patient'));
    }


    public function testSuperAdminPermissions(): void
    {
        $this->assertTrue($this->superAdmin->isAbleTo('manage-users'));
    }

    public function testClinicianPermissions(): void
    {
        $this->assertTrue($this->clinician->isAbleTo('manage-prescriptions'));
    }

    public function testNursePermissions(): void
    {
        $this->assertFalse($this->nurse->isAbleTo('manage-prescriptions'));
    }

    public function testFrontDeskPermissions(): void
    {
        $this->assertFalse($this->frontDesk->isAbleTo('view-clinical-data'));
    }

    public function testPatientPermissions(): void
    {
        $this->assertTrue($this->patientUser->isAbleTo('view-own-records'));
        $this->assertFalse($this->patientUser->isAbleTo('view-patients'));
        $this->assertFalse($this->patientUser->isAbleTo('manage-users'));
    }

    public function testPatientWithFaceSheet(): void
    {
        $patient = $this->createTestPatient();

        $this->assertNotNull($patient->faceSheet);
        $this->assertEquals('John', $patient->faceSheet->first_name);
        $this->assertEquals('SecurityTest', $patient->faceSheet->last_name);
        $this->assertDatabaseHas('patients', ['id' => $patient->id]);
        $this->assertDatabaseHas('patient_face_sheets', ['patient_id' => $patient->id]);
    }

    public function testSecondPatient(): void
    {
        $patient1 = $this->createTestPatient();
        $patient2 = $this->createSecondTestPatient();

        $this->assertNotEquals($patient1->id, $patient2->id);
        $this->assertNotEquals($patient1->pid, $patient2->pid);
        $this->assertEquals('Jane', $patient2->faceSheet->first_name);
    }


    public function testDashboard(): void
    {
        $this->assertRouteRequiresAuth('GET', '/dashboard');
    }

    public function testAdminPanel(): void
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

    public function testRolePermissions(): void
    {
        $allPermissions = Permission::pluck('id')->toArray();
        $assignedPermissions = DB::table('permission_role')->pluck('permission_id')->unique()->toArray();
        $orphaned = array_diff($allPermissions, $assignedPermissions);
        $this->assertEmpty($orphaned, 'Found permissions in the database not assigned to any role.');
    }

    public function testAdminManageSettings(): void
    {
        $this->assertFalse($this->admin->isAbleTo('manage-settings'), 'Admin cannot manage the settings.');
    }

    public function testFrontDeskManagePatients(): void
    {
        $this->assertTrue(
            $this->frontDesk->isAbleTo('manage-patients'),
            'Front Desk must be able to manage patients'
        );
    }
}
