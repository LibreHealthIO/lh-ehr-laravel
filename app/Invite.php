<?php
namespace App;

use App\Mail\InvitationMail;
use App\Models\Role;
use App\Models\User;
use App\Models\Invitation;
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
        $userInvited = User::create($userData);
        // Generate a unique token for the invitation
        $token = Str::random(10);

        // Save the invitation data in the user_invitations table
        $invitation=Invitation::create([
            'for_user' => $userInvited->id,
            'email' => $email,
            'token' => $token,
            'status' => 'pending',
            'valid_till' => now()->addDays(7), // Invitation valid for 7 days
        ]);

        // Send the invitation email
        $url = URL::temporarySignedRoute(
            'users.confirm',
            now()->addDays(7),
            ['username' => $userData['username'],'token'=>$token]
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

    public static function accept($token, $password)
    {
        // Find the invitation by token
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation || $invitation->valid_till < now() || $invitation->status != 'pending') {
            return false; // Invalid invitation token or invitation expired or invitation already accepted/rejected
        }

        // Create the new user in the real users table
        $invitedUser=User::find($invitation->for_user);
        $role = Role::where('name', '=', $invitedUser->access_control)->first();
        $permissions=$role->permissions;
        $invitedUser->attachRole($role);
        foreach ($permissions as $permission) {
            $invitedUser->attachPermission($permission);
        }
        $invitation->update([
            'status' => 'accepted',
        ]);
        $invitedUser->update([
            'password' => $password,
            'invitation' => 'accepted',
        ]);
        $invitation->save();
        if($invitedUser->save()){
            return true;
        }

        return false; //if any error occurs
    }

    public static function reject($token)
    {
        // Find the invitation by token
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return false; // Invalid invitation token
        }
        $invitedUser=User::where('id', $invitation->for_user)->first();

        if (!$invitedUser) {
            return false; // Invalid invitation token
        }
        $invitedUser->update([
            'invitation' => 'rejected',
        ]);
        $invitedUser->save();
        // Update the invitation status
        $invitation->update([
            'status' => 'rejected',
        ]);

        $invitation->save();

        return true; // Invitation rejected successfully
    }

    public static function isExpired($token)
    {
        // Find the invitation by token
        $invitation = Invitation::where('token', $token)->first();
        $invitedUser=User::find($invitation->for_user);
        if($invitation->valid_till < now()){
            $invitation->update([
                'status' => 'expired',
            ]);
            $invitedUser->update([
                'invitation' => 'expired',
            ]);
            $invitation->save();
            $invitedUser->save();
            return true;
        }
        return false;
    }

    public static function status($token)
    {
        // Find the invitation by token
        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return 'invalid'; // Invalid invitation token
        }

        return $invitation->status;
    }
}
