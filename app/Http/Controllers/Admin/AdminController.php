<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    /**
     * Returns admin page
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Index');
    }
}
