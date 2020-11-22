<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EHRInstaller
{

    /**
     * The URIs that should be excluded from Install Verifications.
     * This is necessary for Install Routes.
     *
     * @var array
     */
    protected $except = [
        'install*',
    ];


    /**
     * Handle an incoming request. Checks if application has been Installed already
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->inExemptedRoutes($request)) {
            if (!$this->isEHRInstalled()) {
                emotify('error', __('installer.application_not_installed'));
                return redirect()->route('ehr_installer.index')
                    ->withErrors([
                        'not_installed' => __('installer.application_not_installed'),
                    ]);
            }
        }
        return $next($request);
    }


    /**
     * Check if the application is already installed.
     *
     * @return bool
     */
    public function isEHRInstalled()
    {
        return File::exists(storage_path('ehr_installer.json'));
    }


    /**
     * Checks the default urls to be exempted from the installer middleware
     *
     * @param Request $request
     * @return bool
     */
    protected function inExemptedRoutes($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }
        return false;
    }
}
