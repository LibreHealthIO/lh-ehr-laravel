<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
use App\Models\Facilities\Facility;
use App\Models\Invitation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use Mail;
use Redirect;
use Str;
use URL;

class UserController extends Controller
{

    public function index()
    {
        /**
         * Shows the role page
         * @return Response
         */
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    public function profile($userId): Response
    {
        /**
         * Shows the user profile page
         * @return Response
         */
        $user = User::where('id', $userId)->first();
        $invitation_details = Invitation::where('email', $user->email)->first();
        $user->invitation_details = $invitation_details;

        return Inertia::render('Users/UserProfile', ['userData' => $user]);
    }

    public function showEditPage($userId): Response
    {
        /**
         * Shows the user edit page
         * @return Response
         */
        $user = User::where('id', $userId)->first();
        $facilities = Facility::pluck('name', 'id');

        return Inertia::render('Users/EditUser', ['userData' => $user, 'facilities' => $facilities]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $userId)
    {
        //


        //
        // Get the existing user data
        $user = User::findOrFail($userId);

        // Update user data
        $user->username = $request->username;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->federal_tax_id = $request->tax_id;
        $user->federal_drug_id = $request->dea_number;
        $user->npi = $request->npi;
        $user->suffix = $request->suffix;
        $user->taxonomy = $request->taxonomy;
        $user->info = $request->job_description;
        $user->warehouse = $request->default_warehouse;
        $user->facility = $request->default_facility;
        $user->provider_type = $request->provider_type;
        $user->license = $request->license_number;
        $user->additional_details = $request->additional_details;

        $user->save();
        //update the roles if role is changed
        if ($user->access_control != $request->role) {
            $user->roles()->detach();
            $user->permissions()->detach();
            $user->access_control = $request->role;
            $role = Role::where('name', '=', $request->role)->first();
            $permissions = $role->permissions;
            $user->attachRole($role);
            foreach ($permissions as $permission) {
                $user->attachPermission($permission);
            }
        }
        $user->save();
        return Inertia::location(route('dashboard.users.edit', ['userId' => $user->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
