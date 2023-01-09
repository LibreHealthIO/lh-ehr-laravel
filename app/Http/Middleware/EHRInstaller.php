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
    protected array $except = [
        'install*',
    ];

    /**
     *
     */
    private string $installerFilePath = 'app/public/ehr_installer.json';


    /**
     * Handle an incoming request. Checks if application has been Installed already
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (!$this->inExemptedRoutes($request)) {
            if (!$this->isEHRInstalled()) {
                return redirect()->route('installer.index');
            }
        }
        return $next($request);
    }


    /**
     * Check if the application is already installed.
     *
     * @return bool
     */
    public function isEHRInstalled(): bool
    {
        // TODO check installation values of each json
        return File::exists(storage_path($this->installerFilePath));
    }


    /**
     * Checks the default urls to be exempted from the installer middleware
     *
     * @param Request $request
     * @return bool
     */
    protected function inExemptedRoutes($request): bool
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
