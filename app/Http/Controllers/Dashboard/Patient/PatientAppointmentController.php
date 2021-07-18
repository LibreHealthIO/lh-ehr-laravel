<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;
use App\Models\Facilities\Facility;
use App\Models\Patients\Patient;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PatientAppointmentController extends Controller
{
    /**
     * Gets all appointments of selected patient.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|Response
     */
    public function index(Request $request, $id)
    {
        $users = User::all();
        if ($request->ajax()) {
            $users = $users->pluck(['id', 'username']);
            dd($users);
            return response()->json([$users], 200);
        }
        dd($users);
        return Inertia::render('Patient/Appointment', [
            'users' => $users->transform(function ($user) {
                    return [
                        'id' => $user->id,
                        'username' => $user->username,
                        'created_at' => $user->created_at,
                        'updated_at' => $user->updated_at,
                    ];
            }),
        ]);
    }
}
