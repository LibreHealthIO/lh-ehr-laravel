<?php

namespace App\Http\Controllers\Dashboard\Calendar;

use App\Http\Controllers\Controller;
use App\Models\Facilities\Facility;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class CalendarController extends Controller
{
    /**
     * Get User Calendar and its related encounters
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Calendar/Index', [
            'facilities' => Facility::take(4)->get()->transform(function (Facility $facility) {
                return [
                    'id' => $facility->id,
                    'name' => $facility->name,
                    'created_at' => $facility->created_at,
                    'updated_at' => $facility->updated_at,
                ];
            }),
            'calendar_users' => User::where('in_calendar', 1)->take(30)->get()->transform(function (User $user) {
                return [
                    'id' => $user->id,
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ];
            }),
        ]);
    }
}
