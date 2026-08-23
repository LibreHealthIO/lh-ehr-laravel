<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Add security headers to every response and strip identifying headers.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        csp_nonce();

        $response = $next($request);

        if ($response->isRedirection()) {
            $response->setContent('');
            $response->headers->remove('Content-Length');
        }

        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self'; "
            . "script-src 'self' 'nonce-" . csp_nonce() . "'; "
            . "style-src 'self' 'unsafe-inline'; "
            . "img-src 'self' data:; "
            . "font-src 'self' data:; "
            . "connect-src 'self'; "
            . "frame-ancestors 'self'; "
            . "base-uri 'self'; "
            . "form-action 'self'; "
            . "object-src 'none'"
        );

        $response->headers->remove('X-Powered-By');

        return $response;
    }
}
