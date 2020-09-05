<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;

class FlowBoardController extends Controller
{
    public function index()
    {
        return Inertia::render('FlowBoard/Index', [
            'users' => User::all()
                ->transform(function ($user) {
                    return [
                        'id' => $user->id,
                        'fname' => $user->fname,
                        'lname' => $user->lname,
                        'access_control' => $user->access_control,
                        'created_at' => $user->created_at,
                    ];
                }),
        ]);
    }
}
