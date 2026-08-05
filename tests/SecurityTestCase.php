<?php

namespace Tests;

use App\Models\Patients\Patient;
use App\Models\Patients\PatientFaceSheet;
use App\Models\User;
use App\Models\Address;
use Database\Seeders\SecurityTestSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Spatie\Activitylog\Models\Activity;

/**
 * Base class for MU-related security tests.
 */
abstract class SecurityTestCase extends TestCase
{
    use RefreshDatabase;

    protected User $superAdmin;
    protected User $admin;
    protected User $clinician;
    protected User $nurse;
    protected User $frontDesk;
    protected User $patientUser;

    protected array $xssPayloads = [
        'script_tag'     => '<script>alert("XSS")</script>',
        'img_onerror'    => '<img src=x onerror=alert("XSS")>',
        'svg_onload'     => '<svg onload=alert("XSS")>',
        'event_handler'  => '" onfocus="alert(\'XSS\')" autofocus="',
        'javascript_uri' => 'javascript:alert("XSS")',
    ];

    protected array $sqlInjectionPayloads = [
        'classic_or'        => "' OR '1'='1",
        'union_select'      => "' UNION SELECT * FROM users --",
        'comment_bypass'    => "admin'--",
        'boolean_blind'     => "' AND 1=1 --",
        'quote_termination' => "'; --",
    ];

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(SecurityTestSeeder::class);
        $this->loadTestUsers();
    }

    protected function loadTestUsers(): void
    {
        $this->superAdmin  = User::where('username', 'test_super_admin')->firstOrFail();
        $this->admin       = User::where('username', 'test_admin')->firstOrFail();
        $this->clinician   = User::where('username', 'test_clinician')->firstOrFail();
        $this->nurse       = User::where('username', 'test_nurse')->firstOrFail();
        $this->frontDesk   = User::where('username', 'test_front_desk')->firstOrFail();
        $this->patientUser = User::where('username', 'test_patient_user')->firstOrFail();
    }


    protected function assertRouteRequiresAuth(string $method, string $url, array $data = []): void
    {
        $response = $this->call($method, $url, $data);

        $this->assertNotEquals(
            404,
            $response->getStatusCode(),
            "Route returned 404, verify the URL is correct before testing auth on [{$method} {$url}]"
        );

        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 401]),
            "Expected [{$method} {$url}] to require auth, got {$response->getStatusCode()}"
        );

        if ($response->getStatusCode() === 302) {
            $location = $response->headers->get('Location');
            $path = parse_url($location, PHP_URL_PATH) ?? '/';
            $this->assertTrue(
                str_contains($path, 'login') || $path === '/',
                "Expected redirect to login, got: {$location}"
            );
        }
    }


    protected function assertRoleCanAccess(
        User $user,
        string $method,
        string $url,
        int $expectedStatus = 200,
        array $data = []
    ): TestResponse {
        $response = $this->actingAs($user)->call($method, $url, $data);

        $this->assertEquals(
            $expectedStatus,
            $response->getStatusCode(),
            "Expected [{$user->username}] to access [{$method} {$url}] ({$expectedStatus}), got {$response->getStatusCode()}"
        );

        return $response;
    }

    protected function assertRoleCannotAccess(
        User $user,
        string $method,
        string $url,
        int $expectedStatus = 403,
        array $data = []
    ): TestResponse {
        $response = $this->actingAs($user)->call($method, $url, $data);

        $this->assertEquals(
            $expectedStatus,
            $response->getStatusCode(),
            "Expected [{$user->username}] to be denied [{$method} {$url}] ({$expectedStatus}), got {$response->getStatusCode()}"
        );

        return $response;
    }


    protected function assertRoleEnforcement(
        string $method,
        string $url,
        User $allowedUser,
        User $deniedUser
    ): void {
        $allowed = $this->actingAs($allowedUser)->call($method, $url);
        $this->assertNotEquals(
            403,
            $allowed->getStatusCode(),
            "[{$allowedUser->username}] should be allowed on [{$method} {$url}]"
        );

        $denied = $this->actingAs($deniedUser)->call($method, $url);
        $this->assertTrue(
            in_array($denied->getStatusCode(), [403, 302, 401]),
            "[{$deniedUser->username}] should be denied on [{$method} {$url}], got {$denied->getStatusCode()}"
        );
    }


    protected function assertXssSanitized(
        string $method,
        string $url,
        array $data,
        string $field,
        ?User $user = null
    ): void {
        $actor = $user ?? $this->superAdmin;

        foreach ($this->xssPayloads as $name => $payload) {
            $response = $this->actingAs($actor)
                ->call($method, $url, array_merge($data, [$field => $payload]));

            if ($response->getContent()) {
                $this->assertStringNotContainsString(
                    $payload,
                    $response->getContent(),
                    "XSS payload [{$name}] reflected unescaped in response (field: {$field})"
                );
            }
        }
    }

    protected function assertSqlInjectionSafe(
        string $method,
        string $url,
        array $data,
        string $field,
        ?User $user = null
    ): void {
        $actor = $user ?? $this->superAdmin;
        $initialUserCount = DB::table('users')->count();

        $sqlErrorPatterns = [
            'SQLSTATE[',
            'syntax error',
            'mysql_fetch',
            'ORA-',
            'PostgreSQL',
            'Unclosed quotation mark',
            'unterminated quoted string',
        ];

        foreach ($this->sqlInjectionPayloads as $name => $payload) {
            $response = $this->actingAs($actor)
                ->call($method, $url, array_merge($data, [$field => $payload]));

            $this->assertNotEquals(
                500,
                $response->getStatusCode(),
                "SQLi payload [{$name}] caused 500 on [{$method} {$url}] (field: {$field})"
            );

            $content = $response->getContent() ?? '';
            foreach ($sqlErrorPatterns as $pattern) {
                $this->assertStringNotContainsString(
                    $pattern,
                    $content,
                    "DB error [{$pattern}] leaked in response for SQLi payload [{$name}] (field: {$field})"
                );
            }

            if ($name === 'stacked_queries') {
                $this->assertEquals(
                    $initialUserCount,
                    DB::table('users')->count(),
                    "SQLi payload [{$name}] resulted in successful database mutation on [{$method} {$url}]"
                );
            }
        }
    }


    protected function assertCsrfProtected(
        string $method,
        string $url,
        array $data = [],
        ?User $user = null
    ): void {
        $response = $this->actingAs($user ?? $this->superAdmin)
            ->withHeaders(['X-CSRF-TOKEN' => 'invalid-token-for-testing'])
            ->call($method, $url, $data);

        $this->assertEquals(
            419,
            $response->getStatusCode(),
            "Expected CSRF rejection (419) on [{$method} {$url}], got {$response->getStatusCode()}"
        );
    }

    protected function assertNoDataLeakage(TestResponse $response, array $forbiddenFields): void
    {
        $content = $response->getContent() ?? '';

        foreach ($forbiddenFields as $field) {
            $this->assertStringNotContainsString(
                "\"$field\"",
                $content,
                "Sensitive field [{$field}] leaked as a JSON key in response"
            );
        }
    }

    protected function assertNoSensitiveValueLeakage(TestResponse $response, array $sensitiveValues): void
    {
        $content = $response->getContent() ?? '';

        foreach ($sensitiveValues as $label => $value) {
            $this->assertStringNotContainsString(
                $value,
                $content,
                "Sensitive value [{$label}] leaked in response"
            );
        }
    }

    protected function assertIdorProtected(User $actor, string $method, string $url, string $sensitiveData = null): void
    {
        $response = $this->actingAs($actor)->call($method, $url);

        $this->assertTrue(
            in_array($response->getStatusCode(), [403, 404, 302]),
            "IDOR: [{$actor->username}] reached [{$method} {$url}] — got {$response->getStatusCode()}"
        );

        if ($sensitiveData) {
            $this->assertStringNotContainsString(
                $sensitiveData,
                $response->getContent() ?? '',
                "IDOR: Sensitive data leaked in response for [{$actor->username}] on [{$method} {$url}]"
            );
        }
    }


    protected function assertCreatesAuditLog(
        callable $action,
        string $description = ''
    ): void {
        $before = Activity::count();

        $action();

        $this->assertGreaterThan(
            $before,
            Activity::count(),
            'Expected an audit log entry to be created'
        );

        if ($description) {
            $latest = Activity::latest()->first();
            $this->assertStringContainsString(
                $description,
                $latest->description ?? '',
                "Audit log entry missing expected text [{$description}]"
            );
        }
    }


    protected function createTestPatient(): Patient
    {
       
        static $pidCounter = 1000;

        $address = Address::factory()->create([
            'city_id' => null,
            'country_id' => null,
        ]);
        
        Model::unguard();
        $patient = Patient::create([
            'pid'        => 'TEST-' . $pidCounter++,
            'title'      => 'Mr.',
            'occupation' => 'Software Engineer',
            'industry'   => 'Technology',
            'address_id' => $address->id,
        ]);

        PatientFaceSheet::create([
            'patient_id'     => $patient->id,
            'first_name'     => 'John',
            'last_name'      => 'SecurityTest',
            'middle_name'    => 'PHI',
            'dob'            => '1990-01-15',
            'sex'            => 'Male',
            'marital_status' => 'Single',
            'license_id'     => 'DL-TEST-12345',
            'email'          => 'john.test@patient.lh',
            'billing_note'   => 'Test billing note for security testing',
        ]);
        Model::reguard();

        return $patient->fresh(['faceSheet']);
    }

    protected function createSecondTestPatient(): Patient
    {
        
        static $pidCounter2 = 5000;

        $address = Address::factory()->create([
            'city_id' => null,
            'country_id' => null,
        ]);
        
        Model::unguard();
        $patient = Patient::create([
            'pid'        => 'TEST-' . $pidCounter2++,
            'title'      => 'Ms.',
            'occupation' => 'Teacher',
            'industry'   => 'Education',
            'address_id' => $address->id,
        ]);

        PatientFaceSheet::create([
            'patient_id'     => $patient->id,
            'first_name'     => 'Jane',
            'last_name'      => 'OtherPatient',
            'middle_name'    => 'IDOR',
            'dob'            => '1985-06-20',
            'sex'            => 'Female',
            'marital_status' => 'Married',
            'license_id'     => 'DL-OTHER-67890',
            'email'          => 'jane.other@patient.lh',
            'billing_note'   => 'Other patient billing note',
        ]);
        Model::reguard();

        return $patient->fresh(['faceSheet']);
    }


    protected function getAllTestUsers(): array
    {
        return [
            'super_admin' => $this->superAdmin,
            'admin'       => $this->admin,
            'clinician'   => $this->clinician,
            'nurse'       => $this->nurse,
            'front_desk'  => $this->frontDesk,
            'patient'     => $this->patientUser,
        ];
    }

    protected function getClinicalUsers(): array
    {
        return [
            'super_admin' => $this->superAdmin,
            'clinician'   => $this->clinician,
            'nurse'       => $this->nurse,
        ];
    }

    protected function getAdminUsers(): array
    {
        return [
            'super_admin' => $this->superAdmin,
            'admin'       => $this->admin,
        ];
    }

    protected function getNonClinicalUsers(): array
    {
        return [
            'front_desk' => $this->frontDesk,
            'patient'    => $this->patientUser,
        ];
    }

    protected function assertSecurityHeaders(TestResponse $response, array $expectedHeaders = []): void
    {
        $headers = array_merge(
            ['X-Content-Type-Options' => 'nosniff', 'X-Frame-Options' => null],
            $expectedHeaders
        );

        foreach ($headers as $header => $expectedValue) {
            $this->assertTrue(
                $response->headers->has($header),
                "Security header [{$header}] missing from response"
            );

            if ($expectedValue !== null) {
                $this->assertEquals(
                    $expectedValue,
                    $response->headers->get($header),
                    "Security header [{$header}] has wrong value"
                );
            }
        }
    }
}
