<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Mail\InvitationMail;
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

    public function index():Response
    {
       /**
     * Shows the role page
     * @return Response
     */
    return Inertia::render('AddUsers');
    }
    public function AddPassword():Response
    {
       /**
     * Shows the role page
     * @return Response
     */
    return Inertia::render('AddPassword');

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
        //create user
        $token = Str::random(40);
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' =>bcrypt($token),
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
            'token' => $token,
            'token_expiry' => now()->addDays(7),
        ]);
        $role = Role::where('name', '=', $request->role)->first();
        $permissions=$role->permissions;
        $user->attachRole($role);
        foreach ($permissions as $permission) {
            $user->attachPermission($permission);
        }
        $user->save();
        $url = URL::temporarySignedRoute(
            'users.confirm',
            now()->addDays(7),
            ['username' => $user->username,'token'=>$token]
        );
        $mailData = [
            'title' => 'User Invitation Mail',
            'url'=> $url,
            'facility' => $request->default_facility,
            'role'=> $request->role,
            'username' => $request->username,

        ];
        Mail::to($request->email)->send(new InvitationMail($mailData));
        if($user->save()){
            return Inertia::location(route('dashboard.users.index'));
        }else{
            return Redirect::back()->with(['error' => 'Something went wrong']);
        }

    }

    public function verifyUser(Request $request)
    {
        $user = User::where('username', '=', $request->username)->first();
        if($user->token_expiry < now()){
            return Redirect::back()->with(['error' => 'Token Expired']);
        }
        if($user->token == $request->token){
            $user->password = bcrypt($request->password);
            $user->token = null;
            $user->save();
            return Inertia::location(route('login'));
        }else{

          return Redirect::back()->with(['error' => 'Token Mismatch']);
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
