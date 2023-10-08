<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleRequest $request)
    {
        // Validate and store role data
        $role = Role::create($request->all());

        // Attach selected permissions to the role
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        // Validate and update the role
        $role->update($request->all());

        // Attach selected permissions to the role
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        // Check if any users have this role
        if ($role->users->isEmpty()) {
            // No users have this role, so it can be deleted
            $role->delete();
            return redirect()->route('roles.index')->with('successs', 'Role deleted successfully.');
        } else {
            // Users have this role, prevetn deletion
            return redirect()->route('roles.index')->with('error', 'Role cannot be deleted as it is assigned to users.');
        }
    }

}
