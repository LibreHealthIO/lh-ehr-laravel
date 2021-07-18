<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;
use App\Models\Facilities\Facility;
use App\Models\Patients\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
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
     * Show the form for creating a new patient.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Patient/Create', [
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
     * Selects patient and stores in cookie the redirect to patient details
     *
     * @param $id
     * @return RedirectResponse|void
     */
    public function selectPatient($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return Redirect::back()->with('error', 'No such Patient');
        } else {
            // we set the patient as cookie and redirect to patient details
            Cookie::queue(Cookie::make('ehr_patient', encrypt($patient->id), 60));
            return Redirect::route('patients.show', $patient->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return redirect()->back()->with('error', __('general.no_such_patient'));
        } else {
            if (!Cookie::get('ehr_patient')) {
                return Redirect::route('patients.select', $patient->id);
            } else {
                return Inertia::render('Patient/Profile', [
                    'patient' => [
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

                        'created_at' => $patient->deleted_at,
                        'updated_at' => $patient->created_at,
                    ],
                ]);
            }
        }
    }

    /**
     * Selects patient and stores in cookie the redirect to patient details
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse|string|void
     */
    public function clearPatient(Request $request, $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return Redirect::back()->with('error', 'No such Patient');
        } else {
            Cookie::queue(Cookie::forget('ehr_patient'));
            // case when you are on the patients screen -> takes you to select other patients
            if (back()->getTargetUrl() == route('patients.show', $id)) {
                return redirect()->route('patients.index');
            }
            return Redirect::back();
        }
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
