<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Calendar/Index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
