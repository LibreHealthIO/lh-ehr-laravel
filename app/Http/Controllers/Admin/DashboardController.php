<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Encounter;
use App\Models\Facilities\Facility;
use App\Models\Patients\Patient;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', [
            'users_count' => User::count(),
            'patients_count' => Patient::count(),
            'facilities_count' => Facility::count(),
            'encounters_count' => Encounter::count(),
        ]);
    }
}
