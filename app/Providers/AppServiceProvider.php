<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadInertia();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function loadInertia()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'username' => Auth::user()->username,
                        'first_name' => Auth::user()->first_name,
                        'middle_name' => Auth::user()->middle_name,
                        'last_name' => Auth::user()->last_name,
                        'email' => Auth::user()->email,
                        'profile_picture' => Auth::user()->profile_picture,
                        'suffix' => Auth::user()->suffix,
                        'role' => Auth::user()->roles->first()->name,
                        'info' => Auth::user()->info,
                        'is_active' => Auth::user()->active,
                        'email_verified_at' => Auth::user()->email_verified_at,
                        'timezone' => Auth::user()->timezone,
                        'currency' => Auth::user()->currency,
//                        'address' => [ TODO link address to user or just keep it in the table as default
//                            'id' => Auth::user()->address->id,
//                            'name' => Auth::user()->account->name,
//                        ],
                        'country' => [
                            'id' => Auth::user()->country->id,
                            'name' => Auth::user()->country->name,
                            'code' => Auth::user()->country->code,
                            'emoji' => Auth::user()->country->emoji,
                            'currency_code' => Auth::user()->country->currency_code,
                        ],
                    ] : null,
                ];
            },
            'ehr_patient' => function () {
                return [
                'patient' => Cookie::get('ehr_patient') ? [
                    'id' => decrypt(Cookie::get('ehr_patient')),
                    ] : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
        ]);
    }
}
