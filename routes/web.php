<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\Calendar\CalendarController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\Facility\FacilityController;
use App\Http\Controllers\Dashboard\FlowBoardController;
use App\Http\Controllers\Dashboard\Patient\PatientAppointmentController;
use App\Http\Controllers\Dashboard\Patient\PatientController;
use App\Http\Controllers\Dashboard\Patient\PatientHistoryController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\User\SetupAccount;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Installer\InstallerController;
use App\Http\Controllers\Installer\InstallerDatabaseController;
use App\Http\Controllers\Installer\InstallerFilePermissionController;
use App\Http\Controllers\Installer\InstallerRequirementsController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => ['web', 'localization']
], function () {

    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.request.send');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.update');

    Route::get('about', [PagesController::class, 'about'])->name('about');
    Route::get('contact', [PagesController::class, 'contact'])->name('contact');
    Route::get('version', [PagesController::class, 'showVersion'])->name('ehr.version');
    Route::get('acknowledge-license-cert', [PagesController::class, 'acknowledgeLicenseCert'])
        ->name('acknowledge_license_cert');

    // LibreHealth Pages/Manual
    Route::get('manual/installation-guide', [PagesController::class, 'getInstallationManual'])
        ->name('manual.installation');

    /* ============================
        Installer Routes
    ============================= */

    Route::group([
        'prefix' => 'install',
        'namespace' => 'Installer',
        'as' => 'installer.'
    ], function () {
        Route::get('', [InstallerController::class, 'index'])
            ->name('index');
        Route::get('requirements', [InstallerRequirementsController::class, 'index'])
            ->name('requirements');
        Route::get('file-permissions', [InstallerFilePermissionController::class, 'index'])
            ->name('file_permissions');
        Route::get('database', [InstallerDatabaseController::class, 'index'])
            ->name('database');
        Route::get('complete', [InstallerController::class, 'complete'])
            ->name('complete');
    });


    /* =================================
        Multi Language Routes
    ================================= */
    Route::get('lang/{lang}', [LocaleController::class, 'setLocale'])->name('locale.set');


    /* =================================
        LH EHR PORTAL Routes
    ================================= */

    Route::group(
        [
            'as' => 'dashboard.',
            'prefix' => 'dashboard',
            'middleware' => ['role:super_admin|admin|user'],
            'namespace' => '\\',
        ],
        function () {
            Route::get('', [DashboardController::class, 'index'])->name('index');

            // User Profiles/Settings and globals
            Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
            Route::get('settings', [DashboardController::class, 'settings'])->name('settings');

            // ======== Flow Board routes ========
            Route::get('flow-board', [FlowBoardController::class, 'index'])->name('flow_board');

            Route::get('mail', [MailSendingController::class, 'sendWelcomeEmail'])->name('mail');

            // ======== Calendar routes ========
            Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');

            // ======== Roles & Permissions Routes ========
            Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
            Route::get('/roles/{rolesId}', [RolesController::class, 'details'])->name('roles.details');
            Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
            Route::get('/all-roles', [RolesController::class, 'getRoles'])->name('roles.all');
            Route::get('/all-permissions', [PermissionController::class, 'getPermissions'])->name('permissions.all');

            // ======== Users related routes ========
            Route::resource('users', UserController::class)->names([
                'index' => 'users.index',
                'create' => 'users.create',
                'show' => 'users.show',
                'store' => 'users.store',
                'destroy' => 'users.destroy',
            ]);

            Route::get('/add-user', [SetupAccount::class, 'index'])->name('users.invite');
            Route::post('/add-user', [InvitationController::class, 'sendInvite'])->name('users.add');
            Route::get('/invitations', [InvitationController::class, 'showInvitations'])->name('user.invitations');
            Route::get('/users/profile/{userId}', [UserController::class, 'profile'])->name('users.profile');
            Route::get('/users/edit/{userId}', [UserController::class, 'showEditPage'])->name('users.edit');
            Route::post('/users/edit/{userId}', [UserController::class, 'update'])->name('users.update');




            // ======== Facility related routes ========
            Route::resource('facilities', FacilityController::class)->names([
                'index' => 'facilities.index',
                'create' => 'facilities.create',
                'show' => 'facilities.show',
                'store' => 'facilities.store',
                'edit' => 'facilities.edit',
                'update' => 'facilities.update',
                'destroy' => 'facilities.destroy',
            ]);

            // ======== Patient related routes ========
            Route::resource('patients', PatientController::class)->names([
                'index' => 'patients.index',
                'create' => 'patients.create',
                'show' => 'patients.show',
                'store' => 'patients.store',
                'edit' => 'patients.edit',
                'update' => 'patients.update',
                'destroy' => 'patients.destroy',
            ]);
            Route::get('patients/load/data', [PatientController::class, 'getPatientData'])
                ->name('patients.load.data');

            Route::group(
                [
                    'as' => 'patients.',
                    'prefix' => 'patients',
                    'namespace' => '\\',
                    // TODO (add a middleware for selected patients)
                    'middleware' => 'select.patient',
                ],
                function () {
                    Route::get('select/{pid}', [PatientController::class, 'selectPatient'])
                        ->name('select');
                    Route::get('clear/{pid}', [PatientController::class, 'clearPatient'])
                        ->name('clear');

                    // Patient History
                    Route::get('{pid}/history', [PatientHistoryController::class, 'index'])
                        ->name('history');
                    Route::get('{pid}/history/edit', [PatientHistoryController::class, 'edit'])
                        ->name('history.edit');

                    // Patient Documents
                    Route::get('{pid}/documents', [PatientController::class, 'patientDocuments'])
                        ->name('documents');

                    // Patient Reports
                    Route::get('{pid}/reports', [PatientController::class, 'patientReports'])
                        ->name('reports');

                    // Patient Appointments
                    Route::get('{pid}/appointments', [PatientAppointmentController::class, 'index'])
                        ->name('appointments');

                    // Patient Transactions
                    Route::get('{pid}/transactions', [PatientController::class, 'patientTransactions'])
                        ->name('transactions');

                    // Patient Ledger
                    Route::get('{pid}/ledger', [PatientController::class, 'patientLedger'])
                        ->name('ledger');

                    Route::get('{pid?}/chart-label', [PatientController::class, 'chartLabel'])
                        ->name('chart_label');
                }
            );
        }
    );
    /* =================================
        LH EHR New User Routes
    ================================= */

    Route::get('/invitations/join/{token}', [InvitationController::class, 'index'])->name('invitation.get');
    Route::post('/invitations/accept', [InvitationController::class, 'acceptOrRejectInvite'])->name('invitation.accept');
    Route::get('/invitations', [InvitationController::class, 'getInvitations'])->name('invitation.fetch');


    /* =================================
        LH EHR ADMIN Routes
    ================================= */

    Route::group([
        'prefix' => 'secure.portal',
        'namespace' => 'Admin',
    ], function () {

        Route::group([
            'as' => 'admin',
            'prefix' => 'admin',
            'namespace' => '\\',
            'middleware' => ['role:super_admin|admin']
        ], function () {
            Route::get('', [AdminController::class, 'index'])->name('index');
        });
    });
});
