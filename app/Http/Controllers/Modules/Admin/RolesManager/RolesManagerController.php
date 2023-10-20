<?php

namespace App\Http\Controllers\Modules\Admin\RolesManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\MasterData\Users\Roles\Role;
use App\Models\Modules\Admin\Permissions\Permission;

class RolesManagerController extends Controller
{
    /**
     * Show the form for managing permissions for a role.
     *
     * @param Role $role
     * @return \Illuminate\View\View
     */
    public function managePermissions(Role $role)
    {
        // Fetch all available permissions
        $permissions = Permission::all();

        return view('roles-manager.manage-permissions', compact('role', 'permissions'));
    }

    /**
     * Update permissions for a role.
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePermissions(Request $request, Role $role)
    {
        // Validate and store the selected permissions for the role
        $validatedData = $request->validate([
            'permissions' => 'array',
        ]);

        $role->permissions()->sync($validatedData['permissions']);

        return redirect()->route('roles-manager.manage-permissions', $role->id)
            ->with('success', 'Permissions updated successfully');
    }
}
