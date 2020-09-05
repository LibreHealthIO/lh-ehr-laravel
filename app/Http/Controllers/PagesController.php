<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function about()
    {
        smilify('success', 'About Page');
        return Inertia::render('About');
    }


    public function contact()
    {
        smilify('success', 'Contact Page!');
        return Inertia::render('Contact');
    }

    public function acknowledgeLicenseCert()
    {
        return view('pages.acknowledge_license_cert');
    }
}
