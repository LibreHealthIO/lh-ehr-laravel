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
            'facilities' => Facility::all()->take(4) // TODO just to limit output ~ proper query soon
            ->transform(function ($facility) {
                return [
                    'id' => $facility->id,
                    'name' => $facility->name,
                    'created_at' => $facility->created_at,
                    'updated_at' => $facility->update_at,
                ];
            }),
            'calendar_users' => User::where('in_calendar', 1)->get()->take(30)
                ->transform(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->first_name ." ".$user->last_name,
                        'created_at' => $user->created_at,
                        'updated_at' => $user->update_at,
                    ];
                }),
        ]);
    }
}
