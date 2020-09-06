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



Route::get('/', 'PagesController@index')->name('index');
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
            ->name('dashboard.index');

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

        Route::get('/flow-board', 'Admin\FlowBoardController@index')
            ->name('dashboard.flow_board');
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
        Route::get('/requirements', 'Installer\InstallerController@index')
            ->name('ehr_installer.requirements');
    }
);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
