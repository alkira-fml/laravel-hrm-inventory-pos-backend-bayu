<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return response([
            'message' => 'Roles list',
            'data' => $roles
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $role = new Role();
        $role->company_id = 1;
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        return response([
            'message' => 'Role created',
            'data' => $role
        ], 201);
    }

    public function show($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response([
                'message' => 'Role not found'
            ], 404);
        }

        return response([
            'message' => 'Role details',
            'data' => $role
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'permissionIds' => 'required|array',
        ]);

        $role = Role::find($id);
        if (!$role) {
            return response([
                'message' => 'Role not found'
            ], 404);
        }

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->sync($request->permissionIds);

        return response([
            'message' => 'Role updated',
            'data' => $role
        ], 200);
    }
}
