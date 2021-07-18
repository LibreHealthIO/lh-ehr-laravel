<?php

namespace App\Http\Controllers\Dashboard\Facility;

use App\Http\Controllers\Controller;
use App\Models\Facilities\Facility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class FacilityController extends Controller
{
    /**
     * Displays all facilities in the system
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('Facility/Index', [
            'facilities' => Facility::all()
                ->transform(function ($facility) {
                    return [
                        'id' => $facility->id,
                        'name' => $facility->name,
                        'federal_ein' => $facility->federal_ein,
                        'phone' => $facility->phone,
                        'fax' => $facility->fax,
                        'website' => $facility->website,
                        'email' => $facility->email,
                        'service_location' => $facility->service_location,
                        'billing_location' => $facility->billing_location,
                        'accept_assignment' => $facility->accept_assignment,
                        'pos_code' => $facility->pos_code,
                        'attn' => $facility->attn,
                        'domain_identifier' => $facility->domain_identifier,
                        'facility_npi' => $facility->facility_npi,
                        'tax_id_type' => $facility->tax_id_type,
                        'color' => $facility->color,
                        'primary_business_entity' => $facility->primary_business_entity,
                        'created_at' => $facility->created_at,
                        'updated_at' => $facility->updated_at,
                        'address' => $facility->address,
                    ];
                }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
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
     * Show Facility data
     *
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function show($id)
    {
        $facility = Facility::find($id);
        if (!$facility) {
            return Redirect::back()->with('error', 'No such Facility');
        } else {
            return Inertia::render('Facility/Show', [
                'facility' => [
                    'id' => $facility->id,
                    'name' => $facility->name,
                    'federal_ein' => $facility->federal_ein,
                    'phone' => $facility->phone,
                    'fax' => $facility->fax,
                    'website' => $facility->website,
                    'email' => $facility->email,
                    'service_location' => $facility->service_location,
                    'billing_location' => $facility->billing_location,
                    'accept_assignment' => $facility->accept_assignment,
                    'pos_code' => $facility->pos_code,
                    'attn' => $facility->attn,
                    'domain_identifier' => $facility->domain_identifier,
                    'facility_npi' => $facility->facility_npi,
                    'tax_id_type' => $facility->tax_id_type,
                    'color' => $facility->color,
                    'primary_business_entity' => $facility->primary_business_entity,
                    'created_at' => $facility->created_at,
                    'updated_at' => $facility->updated_at,
                    'address' => $facility->address,
                ],
            ]);
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
