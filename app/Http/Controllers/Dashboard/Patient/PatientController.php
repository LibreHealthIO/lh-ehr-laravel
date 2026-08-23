<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataTableCollectionResource;
use App\Http\Resources\PatientResource;
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
                        'pid' => $patient->pid,
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
     * @param $pid
     * @return RedirectResponse
     */
    public function selectPatient($pid): RedirectResponse
    {
        $patient = Patient::where('pid', $pid)->firstOrFail();
        // we set the patient as cookie and redirect to patient details
        Cookie::queue(Cookie::make(
            'ehr_patient',
            encrypt($patient->pid),
            60,
            config('session.path', '/'),
            config('session.domain'),
            config('session.secure', false),
            true,
            false,
            config('session.same_site', 'lax')
        ));
        return Redirect::route('dashboard.patients.show', $patient->pid);
    }

    /**
     * Display the specified resource.
     *
     * @param int $pid
     * @return RedirectResponse|Response
     */
    public function show(int $pid): Response|RedirectResponse
    {
        $patient = Patient::where('pid', $pid)->first();
        if (!$patient) {
            return redirect()->back()->with('error', __('general.no_such_patient'));
        } else {
            Cookie::queue(Cookie::make(
            'ehr_patient',
            encrypt($patient->pid),
            60,
            config('session.path', '/'),
            config('session.domain'),
            config('session.secure', false),
            true,
            false,
            config('session.same_site', 'lax')
        ));
            Inertia::share('ehr_patient', function () use ($patient) {
                return [
                    'patient' => $patient ? [
                        'id' => $patient->id,
                        'pid' => $patient->pid,
                        'title' => $patient->title,
                        'first_name' => $patient->faceSheet->first_name,
                        'last_name' => $patient->faceSheet->last_name,
                        'middle_name' => $patient->faceSheet->middle_name,
                        'date_of_birth' => $patient->faceSheet->dob,
                        'age' => $patient->faceSheet->age,
                        'sex' => $patient->faceSheet->sex,
                        'created_at' => $patient->deleted_at,
                    ] : null,
                ];
            });
            return Inertia::render('Patient/Profile', [
                'patient' => [
                    'id' => $patient->id,
                    'pid' => $patient->pid,
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

    /**
     * Selects patient and stores in cookie the redirect to patient details
     *
     * @param Request $request
     * @param $pid
     * @return RedirectResponse|string|void
     */
    public function clearPatient(Request $request, $pid)
    {
        $patient = Patient::where('pid', $pid)->first();
        if (!$patient) {
            return Redirect::back()->with('error', 'No such Patient');
        } else {
            Cookie::queue(Cookie::forget('ehr_patient'));
            // case when you are on the patients screen -> takes you to select other patients
            if (back()->getTargetUrl() == route('dashboard.patients.show', $pid)) {
                return redirect()->route('dashboard.patients.index');
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

    /**
     * Gets all patients data
     * @param Request $request
     * @return DataTableCollectionResource
     */
    public function getPatientData(Request $request): DataTableCollectionResource
    {
        $length = $request->input('length', 40);
        $sortBy = $request->input('column', 'id');
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        $sex = $request->input('sex');

        $query = Patient::with('faceSheet')
            ->when($sex, function ($query) use ($sex) {
                $query->whereHas('faceSheet', function ($query) use ($sex) {
                    $query->where('sex', $sex);
                });
            })
            ->when($searchValue, function ($query) use ($searchValue) {
                $this->applyPatientSearch($query, $searchValue);
            });

        $query = $this->applyPatientSort($query, $sortBy, $orderBy);

        $data = $query->paginate($length)->through(function ($patient) {
            return new PatientResource($patient);
        });

        return new DataTableCollectionResource($data);
    }

    /**
     * Apply a global search across patient and face sheet fields.
     */
    private function applyPatientSearch($query, string $searchValue): void
    {
        $like = '%' . $searchValue . '%';

        $query->where(function ($query) use ($like) {
            $query->where('patients.pid', 'like', $like)
                ->orWhere('patients.occupation', 'like', $like)
                ->orWhere('patients.industry', 'like', $like)
                ->orWhereHas('faceSheet', function ($query) use ($like) {
                    $query->where('first_name', 'like', $like)
                        ->orWhere('last_name', 'like', $like)
                        ->orWhere('email', 'like', $like)
                        ->orWhere('sex', 'like', $like);
                });
        });
    }

    /**
     * Apply sorting for local patient columns and face sheet relation columns.
     */
    private function applyPatientSort($query, string $sortBy, string $orderBy)
    {
        $orderBy = strtolower($orderBy) === 'desc' ? 'desc' : 'asc';
        $faceSheetColumns = [
            'first_name',
            'last_name',
            'middle_name',
            'date_of_birth',
            'marital_status',
            'license_id',
            'email',
            'sex',
            'billing_note',
        ];

        if (in_array($sortBy, $faceSheetColumns, true)) {
            // date_of_birth is stored as dob in the face sheet table
            $column = $sortBy === 'date_of_birth' ? 'dob' : $sortBy;

            return $query->leftJoin('patient_face_sheets as pfs', 'patients.id', '=', 'pfs.patient_id')
                ->select('patients.*')
                ->orderBy("pfs.{$column}", $orderBy);
        }

        $allowedColumns = array_keys((new Patient())->getDataTableColumns());
        $sortBy = in_array($sortBy, $allowedColumns, true) ? $sortBy : 'id';

        return $query->orderBy("patients.{$sortBy}", $orderBy);
    }

    /**
     * Redirect to the patient's profile page.
     *
     * @param int $pid
     * @return RedirectResponse
     */
    public function patientDocuments(int $pid): RedirectResponse
    {
        return redirect()->route('dashboard.patients.show', $pid);
    }

    /**
     * Redirect to the patient's profile page.
     *
     * @param int $pid
     * @return RedirectResponse
     */
    public function patientReports(int $pid): RedirectResponse
    {
        return redirect()->route('dashboard.patients.show', $pid);
    }

    /**
     * Redirect to the patient's profile page.
     *
     * @param int $pid
     * @return RedirectResponse
     */
    public function patientTransactions(int $pid): RedirectResponse
    {
        return redirect()->route('dashboard.patients.show', $pid);
    }

    /**
     * Redirect to the patient's profile page.
     *
     * @param int $pid
     * @return RedirectResponse
     */
    public function patientLedger(int $pid): RedirectResponse
    {
        return redirect()->route('dashboard.patients.show', $pid);
    }

    /**
     * Redirect to the patient's profile page or patients index.
     *
     * @param int|null $pid
     * @return RedirectResponse
     */
    public function chartLabel(int $pid = null): RedirectResponse
    {
        if ($pid) {
            return redirect()->route('dashboard.patients.show', $pid);
        }
        return redirect()->route('dashboard.patients.index');
    }
}
