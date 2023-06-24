<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    //
    public function getPermissions()
    {

    $permissions = Permission::all();

     return response()->json($permissions);
    }
}
