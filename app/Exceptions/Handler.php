<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return JsonResponse|RedirectResponse|\Illuminate\Http\Response|object|Response
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        $response = parent::render($request, $exception);
        if ($request->is("api/v*")) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => $this->getApiMessage($response),
                    'code' => $response->getStatusCode(),
                    'dev_message' => !app()->environment(['production']) ? $exception->getMessage() : null,
                    'stack_trace' => !app()->environment(['production']) ? $exception->getTrace() : null,
                ], $response->getStatusCode());
            }
        } else {
            $response = parent::render($request, $exception);
            if (!app()->environment(['local', 'testing']) &&
                in_array($response->getStatusCode(), [500, 503, 404, 403, 401])) {
                return Inertia::render('Errors/Index', ['status' => $response->getStatusCode()]);
            } else if ($response->getStatusCode() === 419) {
                return $this->redirectExpiredPage();
            } else if ($response->getStatusCode() === 429) {
                return back()->with([
                    'error' => __('auth.many_request'),
                ]);
            }
        }
        return !app()->environment(['production']) ? $response :
            Inertia::render('Errors/Index', ['status' => 404]);
    }


    /**
     * Redirect to appropriate auth page when page is expired
     * @return Response
     */
    private function redirectExpiredPage(): Response
    {
        return Inertia::location(route('guest.index'));
    }

    private function getApiMessage(Response $response): string
    {
        return match ($response->getStatusCode()) {
            Response::HTTP_UNAUTHORIZED => 'Unauthorized',
            Response::HTTP_FORBIDDEN => 'Forbidden',
            Response::HTTP_NOT_FOUND => 'Not Found',
            Response::HTTP_INTERNAL_SERVER_ERROR => 'Internal Server Error',
            Response::HTTP_BAD_REQUEST => 'Bad Request',
            Response::HTTP_SERVICE_UNAVAILABLE => 'Service Unavailable',
            default => 'Unknown Error',
        };
    }
}
