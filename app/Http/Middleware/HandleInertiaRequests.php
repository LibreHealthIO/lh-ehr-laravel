<?php

namespace App\Http\Middleware;

use App\Models\Patients\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Inertia\Middleware;
use Jenssegers\Agent\Facades\Agent;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */

    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param Request $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param Request $request
     * @return array
     */
    public function share(Request $request): array
    {
        if (App::isDownForMaintenance()) {
            Debugbar()->disable();
            $this->rootView = 'coming_soon';
        }
        $shared = $this->getShared($request);
        return array_merge(parent::share($request), $shared);
    }


    /**
     * Gets shared props for multi-tenant EHR app
     * @param Request $request
     * @return array
     */
    protected function getShared(Request $request): array
    {
        return [
            'app_name' => app_name(),
            'app_version' => app_version(),
            'copyrights_text' => copyrights_text(),
            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? [
                        'id' => $request->user()->id,
                        'username' => $request->user()->username,
                        'first_name' => $request->user()->first_name,
                        'middle_name' => $request->user()->middle_name,
                        'last_name' => $request->user()->last_name,
                        'email' => $request->user()->email,
                        'profile_picture' => $request->user()->profile_picture,
                        'suffix' => $request->user()->suffix,
                        'info' => $request->user()->info,
                        'is_active' => $request->user()->active,
                        'email_verified_at' => $request->user()->email_verified_at,
                        'timezone' => $request->user()->timezone,
//                        'address' => [ TODO // get user address
//                            'id' => $request->user()->address->id,
//                            'name' => $request->user()->address->name,
//                        ],
                        'country' => [
                            'id' => $request->user()->country->id,
                            'name' => $request->user()->country->name,
                            'code' => $request->user()->country->code,
                            'emoji' => $request->user()->country->emoji,
                            'currency_code' => $request->user()->country->currency_code,
                        ],
                    ] : null,
                ];
            },
            'user_roles' => $request->user() ? $request->user()->user_roles->pluck('name') : null,
            'device_type' => Agent::isTablet() ? 1 : (Agent::isMobile() ? 3 : 0),
            'user_permissions' =>  $request->user() ? $request->user()->user_permissions->pluck('name') : null,
            'ehr_patient' => function () {
                // get patient details
                $pid = Cookie::get('ehr_patient');
                if (!$pid) {
                    return [ 'patient' => null ];
                }
                $patient = Patient::where('pid', decrypt($pid))->first();
                return  [
                    'patient' => $patient ? [
                        'id' => $patient->id,
                        'pid' => $patient->pid,
                        'title' => $patient->title,
                        'first_name' => $patient->faceSheet->first_name,
                        'last_name' => $patient->faceSheet->last_name,
                        'middle_name' => $patient->faceSheet->middle_name,
                        'date_of_birth' => $patient->faceSheet->dob,
                        'age' => $patient->faceSheet->age,
                        'sex' => $patient->faceSheet->sex,
                        'created_at' => $patient->deleted_at,
                    ] : null,
                ];
            },
            'profane_words' => ['fuck', 'bitch'],
            'user_currency' => $request->user() ? $request->user()->currency : currency()->getCurrency(),
            'flash' => function () use ($request) {
                return [
                    'error' => $request->session()->get('error'),
                    'message' => $request->session()->get('message'),
                    'success' => $request->session()->get('success'),
                    'info' => $request->session()->get('info'),
                    'warning' => $request->session()->get('warning')
                ];
            }
        ];
    }
}
