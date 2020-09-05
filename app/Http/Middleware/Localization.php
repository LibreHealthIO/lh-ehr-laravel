<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check header request and determine localization
        if ($request->wantsJson()) {
            $locale = $request->hasHeader('Accept-Language') ? $request->header('Accept-Language') : 'en';
            App::setlocale($locale);
        } else {
            if (session()->has('locale')) {
                App::setlocale(session()->get('locale'));
            } else {
                App::setlocale('en');
            }
        }
        return $next($request);
    }
}
