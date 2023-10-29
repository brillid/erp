<?php

namespace App\Http\Controllers\Modules\MasterData\Users\Roles;

use App\Http\Controllers\Controller;
use App\Models\Modules\Admin\Permissions\Permission;
use App\Models\Modules\MasterData\Users\Roles\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class RoleController
 *
 * This controller handles CRUD operations for roles in the Master Data module.
 */
class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     *
     * @return View
     */
    public function index(): View
    {
        $roles = Role::all();
        return view('modules.masterdata.users.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return View
     */
    public function create(): View
    {
        $permissions = Permission::all();
        return view('modules.masterdata.users.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        Role::create($validatedData);

        return redirect()->route('masterdata.roles.roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param int $id
     * @return View
     */
    public function edit($id): View
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        if (!auth()->user()->hasRoleWithPermission('edit-role')) {
            abort(403, 'Unauthorized action.');
        }


        return view('modules.masterdata.users.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $role->update($validatedData);

        return redirect()->route('masterdata.roles.roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified role from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role): RedirectResponse
    {
        // Retrieve the role from the database
        $role = Role::find($role->id);

        if ($role) {
            // Check if any users have this role
            if ($role->users->isEmpty()) {
                // No users have this role, so it can be deleted
                $role->delete();
                return redirect()->route('masterdata.roles.roles.index')->with('success', 'Role deleted successfully.');
            } else {
                // Users have this role, prevent deletion
                return redirect()->route('masterdata.roles.roles.index')->with('error', 'Role cannot be deleted as it is assigned to users.');
            }
        } else {
            // Role not found in the database
            return redirect()->route('masterdata.roles.roles.index')->with('error', 'Role not found in the database.');
        }
    }
}
