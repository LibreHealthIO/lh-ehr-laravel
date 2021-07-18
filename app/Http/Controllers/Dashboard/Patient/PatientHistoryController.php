<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;
use App\Models\Facilities\Facility;
use App\Models\Patients\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientHistoryController extends Controller
{
    public function index(Request $request, $id)
    {
        $patient = Patient::find($id);
        $history = $patient->history();
        return Inertia::render('Patient/History', [
            'facilities' => Facility::all()
                ->transform(function ($facility) {
                    return [
                        'id' => $facility->id,
                        'name' => $facility->name,
                        'created_at' => $facility->created_at,
                        'updated_at' => $facility->updated_at,
                    ];
                }),
        ]);
    }

}
