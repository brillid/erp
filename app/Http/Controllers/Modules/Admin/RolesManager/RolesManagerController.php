<?php

namespace App\Http\Controllers\Modules\Admin\RolesManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\MasterData\Users\Roles\Role;
use App\Models\Modules\Admin\Permissions\Permission;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class RolesManagerController
 *
 * This controller handles role and permission management within the admin module.
 */
class RolesManagerController extends Controller
{
    /**
     * Show all roles with their associated permissions.
     *
     * @return View
     */
    public function allRolesWithPermissions(): View
    {
        $roles = Role::with('permissions')->get();

        return view('modules.admin.rolesmanager.all-roles', compact('roles'));
    }

    /**
     * Show the form for managing permissions for a role.
     *
     * @param Role $role
     * @return View
     */
    public function managePermissions(Role $role): View
    {
        // Fetch all available permissions
        $permissions = Permission::all();

        return view('modules.admin.rolesmanager.manage-permissions', compact('role', 'permissions'));
    }

    /**
     * Update permissions for a role.
     *
     * @param Request $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function updatePermissions(Request $request, Role $role): RedirectResponse
    {
        // Validate and store the selected permissions for the role
        $validatedData = $request->validate([
            'permissions' => 'array',
        ]);

        $role->permissions()->sync($validatedData['permissions']);

        return redirect()->route('admin.roles-manager.manage-permissions', $role->id)
            ->with('success', 'Permissions updated successfully');
    }
}
