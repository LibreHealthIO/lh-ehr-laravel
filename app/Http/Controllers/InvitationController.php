<?php

namespace App\Http\Controllers;

use App\Invite;
use App\Models\Facilities\Facility;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;
use Inertia\Response;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Str;

class InvitationController extends Controller
{

    public function show()
    {
        /**
         * Shows the Users/Invitations page
         * @return Response
         */
        $facilities = Facility::pluck('name', 'id');

        return Inertia::render('Users/Invitations', ['facilities' => $facilities]);
    }
    //URL for datatable for invitations
    public function getInvitations(Request $request)
    {
        $length = $request->input('length', 10);
        $sortBy = $request->input('column');
        $orderBy = $request->input('dir');
        $facility = $request->input('facility');


        $query = Invitation::with('user');

        $query->orderBy($sortBy, $orderBy);

        if ($facility != null) {
            $query->where('facility', $facility);
        }

        $data = $query->paginate($length);

        return new DataTableCollectionResource($data);
    }

    public function index($token): Response
    {
        /**
         * Shows the role page
         * @return Response
         */
        $invite = Invitation::where('token', $token)->first();

        //send a invalid token message if the invite is not found in the database.
        if (!$invite) {
            return Inertia::render('Users/AddPassword', ['status' => 'invalid']);
        }

        //masking the username part of the email.
        $email = $invite->email;
        [$username, $domain] = explode('@', $email);
        $emailLength = strlen($email);
        $usernameLength = strlen($username);
        $maskedEmail = Str::mask($email, '*', - ($emailLength - $usernameLength / 2), $usernameLength / 2);

        return Inertia::render('Users/AddPassword', ['status' => $invite->status, 'email' => $maskedEmail]);
    }


    //single controller for both accept and reject based on reject parameter
    public function acceptOrRejectInvite(Request $request)
    {
        $token = $request->token;

        $reject = $request->reject;
        if ($reject) {
            $success = Invite::reject($token);
            if ($success) {
                return Inertia::location(route('login'));
            } else {
                return Redirect::back()->with(['error' => 'Something went wrong']);
            }
        } else {
            $password = bcrypt($request->password);
            $success = Invite::accept($token, $password);
            if ($success) {
                return Inertia::location(route('login'));
            } else {
                return Redirect::back()->with(['error' => 'Something went wrong']);
            }
        }
    }
}
