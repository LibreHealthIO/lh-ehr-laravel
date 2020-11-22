<?php

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

// LibreHealth Pages/Manual
Route::get('/manual/installation-guide', 'PagesController@getInstallationManual')
    ->name('manual.installation');

        /* =================================
            Application Routes
       ================================= */

Auth::routes();

Route::get('/', 'PagesController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/version', 'PagesController@showVersion')->name('ehr.version');
Route::get('/acknowledge-license-cert', 'PagesController@acknowledgeLicenseCert')
    ->name('acknowledge_license_cert');


        /*=================================
         Multi Language Routes
        =================================*/
Route::get('/lang/{lang}', 'LocaleController@setLocale')->name('locale.set');


        /* =================================
            LH EHR PORTAL Routes
        ================================= */

Route::group(
    [
        'prefix' => 'console/dashboard',
        'middleware' => ['role:super_admin|admin|user']
    ],
    function () {
        Route::get('', 'Admin\DashboardController@index')
            ->name('dashboard');

        // User Profiles/Settings and globals
        Route::get('/settings', 'Admin\DashboardController@settings')
            ->name('dashboard.settings');

        Route::get('/profile', 'Admin\DashboardController@profile')
            ->name('dashboard.profile');

        // calendar routes
        Route::get('/calendar', 'Admin\CalendarController@index')
            ->name('dashboard.calendar');

        // ======== Flow Board routes ========

        Route::get('/flow-board', 'Admin\FlowBoardController@index')
            ->name('dashboard.flow_board');

        // ======== Patient related routes ========
        Route::resource('/patients', 'Admin\Patient\PatientController');
        Route::get('/patients/select/{id}', 'Admin\Patient\PatientController@selectPatient')
            ->name('patients.select');
        Route::get('/patients/clear/{id}', 'Admin\Patient\PatientController@clearPatient')
            ->name('patients.clear');

        // ======== Users related routes ========
        Route::resource('/users', 'Admin\Patient\PatientController');


        // ======== Facility related routes ========
        Route::resource('/facilities', 'Admin\Facility\FacilityController');
    }
);


        /* =================================
             Installer Routes
       ================================= */
Route::group(
    [
        'prefix' => 'install'],
    function () {
        Route::get('', 'Installer\InstallerController@index')
            ->name('ehr_installer.index');
        Route::get('/requirements', 'Installer\RequirementsController@index')
            ->name('ehr_installer.requirements');
        Route::get('/file-permissions', 'Installer\FilePermissionController@index')
            ->name('ehr_installer.file_permissions');
        Route::get('/database', 'Installer\DatabaseController@index')
            ->name('ehr_installer.database');
    }
);

