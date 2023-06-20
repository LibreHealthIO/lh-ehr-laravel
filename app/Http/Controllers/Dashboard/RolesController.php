<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
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
    public function store(CreateRoleRequest $request)
    {

        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        return response()->json($role, 201);
    }
    public function getRoles()
    {

    $roles = Role::with('permissions')->get();

     return response()->json($roles);
    }
}
