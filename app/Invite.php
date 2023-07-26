<?php
namespace App;

use App\Mail\InvitationMail;
use App\Mail\UserInvitationMail;
use App\Models\Role;
use App\Models\User;
use App\Models\UsersInvited;
use App\Models\UserInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Redirect;
use URL;

class Invite
{
    public static function send($userData, $email,)
    {


        // Save the invitation data in the users_invited table
        $userInvited = UsersInvited::create($userData);
        // Generate a unique code for the invitation
        $code = Str::random(10);

        // Save the invitation data in the user_invitations table
        $invitation=UserInvitation::create([
            'for_user' => $userInvited->id,
            'email' => $email,
            'code' => $code,
            'status' => 'pending',
            'valid_till' => now()->addDays(7), // Invitation valid for 7 days
        ]);

        // Send the invitation email
        $url = URL::temporarySignedRoute(
            'users.confirm',
            now()->addDays(7),
            ['username' => $userData['username'],'code'=>$code]
        );
        $mailData = [
            'title' => 'User Invitation Mail',
            'url'=> $url,
            'facility' => $userData['facility'],
            'role'=> $userData['access_control'],
            'username' => $userData['username'],

        ];
        Mail::to($userData['email'])->send(new InvitationMail($mailData));
        if($invitation->save()){
            return Inertia::location(route('dashboard.users.index'));
        }else{
            return Redirect::back()->with(['error' => 'Something went wrong']);
        }
    }

    public static function accept($code, $password)
    {
        // Find the invitation by code
        $invitation = UserInvitation::where('code', $code)->first();

        if (!$invitation || $invitation->valid_till < now() || $invitation->status != 'pending') {
            return false; // Invalid invitation code or invitation expired or invitation already accepted/rejected
        }

        // Create the new user in the real users table
        $invitedUser=UsersInvited::find($invitation->for_user);

        $user = User::create([
            'username' => $invitedUser->username,
            'email' => $invitedUser->email,
            'password' =>$password,
            'first_name' => $invitedUser->first_name,
            'middle_name' => $invitedUser->middle_name,
            'last_name' => $invitedUser->last_name,
            'federal_tax_id' => $invitedUser->federal_tax_id,
            'federal_drug_id' => $invitedUser->federal_drug_id,
            'npi' => $invitedUser->npi,
            'suffix' => $invitedUser->suffix,
            'taxonomy' => $invitedUser->taxonomy,
            'info' => $invitedUser->info,
            'access_control' => $invitedUser->access_control,
            'warehouse' => $invitedUser->warehouse,
            'facility'=> $invitedUser->facility,
            'provider_type' => $invitedUser->provider_type,
            'license' => $invitedUser->license,
        ]);
        $role = Role::where('name', '=', $invitedUser->access_control)->first();
        $permissions=$role->permissions;
        $user->attachRole($role);
        foreach ($permissions as $permission) {
            $user->attachPermission($permission);
        }
        $invitation->update([
            'status' => 'accepted',
        ]);
        $invitation->save();
        if($user->save()){
            return true;
        }

        return false; //if any error occurs
    }

    public static function reject($code)
    {
        // Find the invitation by code
        $invitation = UserInvitation::where('code', $code)->first();

        if (!$invitation) {
            return false; // Invalid invitation code
        }

        // Update the invitation status
        $invitation->update([
            'status' => 'rejected',
        ]);

        $invitation->save();
        return true; // Invitation rejected successfully
    }

    public static function isExpired($code)
    {
        // Find the invitation by code
        $invitation = UserInvitation::where('code', $code)->first();
        if($invitation->valid_till < now()){
            $invitation->update([
                'status' => 'expired',
            ]);
            $invitation->save();
            return true;
        }
        return false;
    }

    public static function status($code)
    {
        // Find the invitation by code
        $invitation = UserInvitation::where('code', $code)->first();

        if (!$invitation) {
            return 'invalid'; // Invalid invitation code
        }

        return $invitation->status;
    }
}
