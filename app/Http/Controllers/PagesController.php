<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function about(Request $request)
    {
        if ($request->header('X-Inertia') || auth()->check()) {
            return Inertia::render('About');
        } else {
            return view('about');
        }
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
