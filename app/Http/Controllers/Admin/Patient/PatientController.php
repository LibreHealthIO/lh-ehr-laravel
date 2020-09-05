<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use App\Models\Patients\Patient;
use App\Models\Patients\PatientFaceSheet;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Patient/Index', [
            'patients' => Patient::all()
                ->transform(function ($patient) {
                    return [
                        // main info
                        'id' => $patient->id,
                        'title' => $patient->title,
                        'occupation' => $patient->occupation,
                        'industry' => $patient->industry,

                        // patient face sheets

                        'first_name' => $patient->faceSheet->first_name,
                        'last_name' => $patient->faceSheet->last_name,
                        'middle_name' => $patient->faceSheet->middle_name,
                        'date_of_birth' => $patient->faceSheet->dob,
                        'marital_status' => $patient->faceSheet->marital_status,
                        'license_id' => $patient->faceSheet->license_id,
                        'email' => $patient->faceSheet->email,
                        'sex' => $patient->faceSheet->sex,
                        'billing_note' => $patient->faceSheet->billing_note,

                        // timestamps
                        'created_at' => $patient->created_at,
                    ];
                }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
