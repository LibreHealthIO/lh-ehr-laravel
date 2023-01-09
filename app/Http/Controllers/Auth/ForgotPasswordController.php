<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Inertia\Inertia;
use Inertia\Response;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the reset password form
     * @return Response
     */
    public function showLinkRequestForm(): Response
    {
        return Inertia::render('Auth/RequestPasswordForm');
    }

    /**
     * Send email reset link
     * @param Request $request
     * @return RedirectResponse
     */
    public function sendResetLinkEmail(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);
        // todo get correct password broker
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT || Password::INVALID_USER
            ? back()->with('success', __('auth.verification_link_sent', ['email' => $request->email]))
            : back()->withErrors(['email' => __($status)]);
    }

}
