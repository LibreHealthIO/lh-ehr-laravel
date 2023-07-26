<?php

namespace App\Http\Controllers;

use App\Invite;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class UserInvitationController extends Controller
{

    public function sendInvite(Request $request)
    {
        $userData=[
            'username' => $request->username,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'federal_tax_id' => $request->tax_id,
            'federal_drug_id' => $request->dea_number,
            'npi' => $request->npi,
            'suffix' => $request->suffix,
            'taxonomy' => $request->taxonomy,
            'info' => $request->job_description,
            'access_control' => $request->role,
            'warehouse' => $request->default_warehouse,
            'facility'=> $request->default_facility,
            'provider_type' => $request->provider_type,
            'license' => $request->license_number,
            'additional_details' => $request->additional_details,
        ];



        Invite::send($userData, $request->email);
        return Inertia::location(route('dashboard.users.index'));
    }

    public function acceptInvite(Request $request)
    {
        $code = $request->code;
        $password = bcrypt($request->password);
        $success=Invite::accept($code, $password);
        if($success){
            return Inertia::location(route('login'));
        }else{
            return Redirect::back()->with(['error' => 'Something went wrong']);
        }

    }

    public function rejectInvite(Request $request)
    {
        $code = $request->code;
        $success=Invite::reject($code);
        if($success){
            return response()->json(['status' => 'success']);
        }else{
            return Redirect::back()->with(['error' => 'Something went wrong']);
        }

    }

    public function invitationStatus(Request $request)
    {
        $code = $request->code;
        $status = Invite::status($code);
        return response()->json(['status' => $status]);

    }

}
