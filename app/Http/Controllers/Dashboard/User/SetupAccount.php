<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\Facilities\Facility;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SetupAccount extends Controller
{

    public function index()
    {
        $facilities = Facility::pluck('name', 'id');

        return Inertia::render('AddUsers', ['facilities' => $facilities]);
    }
}
