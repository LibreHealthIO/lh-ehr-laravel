<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Invite;
use App\Mail\InvitationMail;
use App\Models\Facilities\Facility;
use App\Models\Invitation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Mail;
use Redirect;
use Str;
use URL;

class UserController extends Controller
{

    public function index()
    {
        /**
         * Shows the Users/Invitations page
         * @return Response
         */
        $facilities = Facility::pluck('name', 'id');

        return Inertia::render('Users/Index', ['facilities' => $facilities]);
    }

    //URL for datatable for users
    public function getUsers(Request $request)
    {
        $length = $request->input('length', 10);
        $sortBy = $request->input('column');
        $orderBy = $request->input('dir');
        $facility = $request->input('facility');


        //get User
        $query = User::query();

        $query->orderBy($sortBy, $orderBy);

        if ($facility != null) {
            $query->where('facility', $facility);
        }

        $data = $query->paginate($length);

        return new DataTableCollectionResource($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
        $facilities = Facility::pluck('name', 'id');

        return Inertia::render('Users/Add', ['facilities' => $facilities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $temporaryPassword = Str::random(10);
        $userData = [
            'username' => $request->username,
            'password' => bcrypt($temporaryPassword),
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
            'facility' => $request->default_facility,
            'provider_type' => $request->provider_type,
            'license' => $request->license_number,
            'additional_details' => $request->additional_details,
        ];



        Invite::send($userData, $request->email);
        return Inertia::location(route('dashboard.invitations.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($userId): Response
    {
        /**
         * Shows the user profile page
         * @return Response
         */
        $user = User::where('id', $userId)->first();
        $invitation_details = Invitation::where('email', $user->email)->first();
        $user->invitation_details = $invitation_details;

        return Inertia::render('Users/Profile', ['userData' => $user]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($userId): Response
    {
        /**
         * Shows the user edit page
         * @return Response
         */
        $user = User::where('id', $userId)->first();
        $facilities = Facility::pluck('name', 'id');

        return Inertia::render('Users/Edit', ['userData' => $user, 'facilities' => $facilities]);
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
        return Inertia::location(route('dashboard.users.edit', ['user' => $user->id]));
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
