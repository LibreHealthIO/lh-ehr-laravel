<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PagesController extends Controller
{
    /**
     * Shows the labs homepage
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return Redirect::route('login');
    }

    /**
     * Gets the about page
     * @return Response
     */
    public function about(): Response
    {
        return Inertia::render('About');
    }


    /**
     * Gets the contact page
     * @return Response
     */
    public function contact(): Response
    {
        return Inertia::render('Contact');
    }

    /**
     * Gets the Acknowledgement & License page
     * @return Response
     */
    public function acknowledgeLicenseCert(): Response
    {
        return Inertia::render('Acknowledgement_License');
    }
}
