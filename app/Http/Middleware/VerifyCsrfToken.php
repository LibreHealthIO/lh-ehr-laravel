<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\CookieJar;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    /**
     * Determine if the request has a URI that should pass through CSRF verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function inExceptArray($request)
    {
        if (app()->environment('testing')) {
            return true;
        }

        return parent::inExceptArray($request);
    }

    /**
     * Create a new "XSRF-TOKEN" cookie that contains the CSRF token with HttpOnly enabled.
     *
     * @param  Request  $request
     * @param  array  $config
     * @return Cookie
     */
    protected function newCookie($request, $config)
    {
        return new Cookie(
            'XSRF-TOKEN',
            $request->session()->token(),
            $this->availableAt(60 * $config['lifetime']),
            $config['path'],
            $config['domain'],
            $config['secure'],
            true, 
            false,
            $config['same_site'] ?? null,
            $config['partitioned'] ?? false
        );
    }
}
