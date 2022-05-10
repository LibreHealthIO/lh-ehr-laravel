<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
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
     * Shows login form
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm(): \Illuminate\Http\Response
    {
        return Inertia::location(route('index'));
    }

    /**
     * Create a new controller instance.
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function login(Request $request): Response
    {
        $this->validate($request, [
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  Request $request
     *
     * @return string
     */
    public function logout(Request $request): string
    {
        // forget the patient cookie if any
        Cookie::queue(Cookie::forget('ehr_patient'));
        $this->guard()->logout();
        $request->session()->invalidate();
        return Inertia::location(route('index'));
    }

    public function redirectTo(): string
    {
        return route('index');
    }
}
