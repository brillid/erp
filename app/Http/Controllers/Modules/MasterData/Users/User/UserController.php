<?php

namespace App\Http\Controllers\Modules\MasterData\Users\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules\MasterData\Users\User\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('modules.masterdata.users.user.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('modules.masterdata.users.user.show', compact('user'));
    }

    public function create()
    {
        if (!auth()->user()->can('create-user')) {
            abort(403, 'Unauthorized action.');
        }

        return view('modules.masterdata.users.user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')
                ->withErrors($validator)
                ->withInput();
        }

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        if (!auth()->user()->can('edit-user')) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);
        return view('modules.masterdata.users.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username,' . $id,
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            // Add more validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
