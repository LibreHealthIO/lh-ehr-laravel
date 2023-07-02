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
use Redirect;

class RolesController extends Controller
{
    public function index(): Response
    {
    /**
     * Shows the role page
     * @return Response
     */
        return Inertia::render('Roles',['roles' => []]
        );
    }
    public function details($roleId): Response
    {
         /**
     * Shows the role page
     * @return Response
     */
        $role = Role::with('permissions')->where('id', $roleId)->first();
        $users = $role->users()->get();
        $temp = [
            'id' => $role->id,
            'name' => $role->name,
            'display_name' => $role->display_name,
            'description' => $role->description,
            'permissions' => $role->permissions,
            'users' => $users,
        ];
        return Inertia::render('RolesDetails',['roleDetails' => $temp]
        );

    }
    public function store(CreateRoleRequest $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        foreach ($request->permissions as $permission) {
            $role->permissions()->attach([$permission['id']]);
        }
        $role->save();
        if($role->save()){
            return Inertia::location(route('dashboard.roles.index'));
        }else{
            return Redirect::back()->with(['error' => 'Something went wrong']);
        }
    }
    public function getRoles()
    {
        $result=[];
        $roles = Role::with('permissions')->get();
        foreach ($roles as $role) {
        $users = $role->users()->get();
        $temp = [
            'id' => $role->id,
            'name' => $role->name,
            'display_name' => $role->display_name,
            'description' => $role->description,
            'permissions' => $role->permissions,
            'users' => $users,
        ];
        array_push($result, $temp);
    }

     return response()->json($result, 200);
    }
}
