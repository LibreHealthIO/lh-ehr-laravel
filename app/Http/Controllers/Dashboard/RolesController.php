<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;
class RolesController extends Controller
{
    public function index(): Response
    {
         /**
     * Shows the role page
     * @return Response
     */

        return Inertia::render('Roles',
            [
                'roles' => []
            ]
        );
    }
    public function store(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'display_name' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Create a new Role object and save it to the database
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        // Return a success response with the new role object
        return response()->json($role, 201);
    }
    public function getRoles()
    {
     // Get all roles from the database
    //  $roles = Role::all();
    $roles = Role::with('permissions')->get();
     // Get the permissions associated with each role


     // Embed the permissions into the roles

//    foreach ($roles as $role) {
//          $role->permissions = $role->permissions;
//      }


     // Return all roles as a JSON response
     return response()->json($roles);
    }
}
