<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Shows the insurance login form
     * @param Request $request
     * @return \Inertia\Response
     */
    public function showLoginForm(Request $request): \Inertia\Response
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Create a new controller instance.
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function login(Request $request): Response
    {
        $this->validate($request, ['account'    => 'required', 'password' => 'required']);

        $login_type = filter_var($request->input('account'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([$login_type => $request->input('account')]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return Inertia::location($this->redirectPath());
        } else {
            return Redirect::back()->with(['error' => __('auth.failed')]);
        }
    }

    /**
     * Log the user out of the application.
     * @param Request $request
     * @return Response
     */
    public function logout(Request $request): Response
    {
        Cookie::queue(Cookie::forget('ehr_patient'));
        $this->guard()->logout();
        session()->flush();
        $request->session()->invalidate();
        return Inertia::location(route('index'));
    }

    /**
     * Check if user is authenticated
     * @param Request $request
     * @return RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function authenticated(Request $request): RedirectResponse
    {
        $request->user()->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
        if ($intendetUrl = session()->get('url.intended')) {
            return redirect($intendetUrl);
        }

        return redirect(RouteServiceProvider::HOME);
    }


    public function redirectTo(): string
    {
        if (session()->has('url.intended')) {
            return session()->get('url.intended');
        }
        return route('dashboard.index');
    }
}
