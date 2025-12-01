<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\StoreUserRequest;

class UserController extends Controller
{
    public function index() {
        $users = User::role('client')->get();
        return view('admin.users.index', compact('users'));
    }
    public function create() {
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request) {
        $request->password = bcrypt($request->password);
        $user = User::create($request->all());
        $user->assignRole('client');
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(UpdateUserRequest $request, $id) {
        $user = User::findOrFail($id);

        if (!empty($request->password)) {
            $request->password = bcrypt($request->password);
        } else {
            unset($request->password);
        }

        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
