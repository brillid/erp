<?php

namespace App\Http\Controllers\Modules\MasterData\Users\User;

use App\Http\Controllers\Controller;
use App\Models\Modules\MasterData\Users\Roles\Role;
use Illuminate\Http\Request;
use App\Models\Modules\MasterData\Users\User\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

/**
 * Class UserController
 *
 * This controller handles CRUD operations for users in the Master Data module.
 */
class UserController extends Controller
{
    /**
     * Display a listing of users.
     *
     * @return View
     */
    public function index(): View
    {
        $users = User::all();
        return view('modules.masterdata.users.user.index', compact('users'));
    }

    /**
     * Show the user's details.
     *
     * @param int $id
     * @return View
     */
    public function show($id): View
    {
        $user = User::findOrFail($id);
        return view('modules.masterdata.users.user.show', compact('user'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create(): View
    {
        if (!auth()->user()->hasRoleWithPermission('create-user')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::all();
        return view('modules.masterdata.users.user.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->route('masterdata.users.user.create')
                ->withErrors($validator)
                ->withInput();
        }

        User::create($request->all());

        return redirect()->route('masterdata.users.user.index')->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     * @return View
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);

        if (!$user->hasRoleWithPermission('edit-user')) {
            abort(403, 'Unauthorized action.');
        }

        $roles = Role::all();
        return view('modules.masterdata.users.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->route('masterdata.users.user.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        $user->update($request->except('roles'));

        if ($request->has('roles')) {
            $user->roles()->sync($request->input('roles')); // Sync selected roles
        }

        return redirect()->route('masterdata.users.user.index')->with('success', 'User updated successfully');
    }
}
