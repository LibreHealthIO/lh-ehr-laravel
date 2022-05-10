<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\Calendar\CalendarController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Facility\FacilityController;
use App\Http\Controllers\Dashboard\FlowBoardController;
use App\Http\Controllers\Dashboard\Patient\PatientAppointmentController;
use App\Http\Controllers\Dashboard\Patient\PatientController;
use App\Http\Controllers\Dashboard\Patient\PatientHistoryController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Installer\InstallerController;
use App\Http\Controllers\Installer\InstallerDatabaseController;
use App\Http\Controllers\Installer\InstallerFilePermissionController;
use App\Http\Controllers\Installer\InstallerRequirementsController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
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

/* =================================
    Application Routes
================================= */

Auth::routes();

Route::get('/', [PagesController::class, 'index'])->name('index');
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
], function () {
    Route::get('', [InstallerController::class, 'index'])
        ->name('ehr_installer.index');
    Route::get('requirements', [InstallerRequirementsController::class, 'index'])
        ->name('ehr_installer.requirements');
    Route::get('file-permissions', [InstallerFilePermissionController::class, 'index'])
        ->name('ehr_installer.file_permissions');
    Route::get('database', [InstallerDatabaseController::class, 'index'])
        ->name('ehr_installer.database');
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
        'prefix' => 'dashboard',
        'middleware' => ['role:super_admin|admin|user'],
        'namespace' => '\\',
    ],
    function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');

        // User Profiles/Settings and globals
        Route::get('profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
        Route::get('settings', [DashboardController::class, 'settings'])->name('dashboard.settings');

        // ======== Flow Board routes ========
        Route::get('flow-board', [FlowBoardController::class, 'index'])->name('dashboard.flow_board');


        // ======== Calendar routes ========
        Route::get('calendar', [CalendarController::class, 'index'])->name('dashboard.calendar');

        // ======== Users related routes ========
        Route::resource('users', UserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'show' => 'users.show',
            'store' => 'users.store',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
        ]);
        Route::get('users/load/data', [UserController::class, 'getUserData'])
            ->name('users.load.data');

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
            'prefix' => 'patients',
            'namespace' => '\\',
            // TODO (add a middleware for selected patients)
            // 'middleware' => 'select.patient',
            ],
            function () {
                Route::get('select/{id}', [PatientController::class, 'selectPatient'])
                    ->name('patients.select');
                Route::get('clear/{id}', [PatientController::class, 'clearPatient'])
                    ->name('patients.clear');

                // Patient History
                Route::get('{id}/history', [PatientHistoryController::class, 'index'])
                    ->name('patients.history');
                Route::get('{id}/history/edit', [PatientHistoryController::class, 'edit'])
                    ->name('patients.history.edit');

                // Patient Documents
                Route::get('{id}/documents', [PatientController::class, 'patientDocuments'])
                    ->name('patients.documents');

                // Patient Reports
                Route::get('{id}/reports', [PatientController::class, 'patientReports'])
                    ->name('patients.reports');

                // Patient Appointments
                Route::get('{id}/appointments', [PatientAppointmentController::class, 'index'])
                    ->name('patients.appointments');

                // Patient Transactions
                Route::get('{id}/transactions', [PatientController::class, 'patientTransactions'])
                    ->name('patients.transactions');

                // Patient Ledger
                Route::get('{id}/ledger', [PatientController::class, 'patientLedger'])
                    ->name('patients.ledger');
            }
        );
    }
);


/* =================================
    LH EHR ADMIN Routes
================================= */

Route::group([
    'prefix' => 'secure.portal',
    'namespace' => 'Admin',
], function () {

    Route::group([
        'prefix' => 'admin',
        'namespace' => '\\',
        'middleware' => ['role:super_admin|admin']
    ], function () {
        Route::get('', [AdminController::class, 'index'])->name('admin.index');
    });
});
