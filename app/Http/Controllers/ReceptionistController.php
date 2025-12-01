<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReceptionistController extends Controller
{
    public function index() {
        $receptionists = User::role('receptionist')->get();
        // dd($receptionists);
        return view('admin.receptionists.index', compact('receptionists'));
    }
    public function create() {
        return view('admin.receptionists.create');
    }
    public function edit($id) {
        $receptionist = User::findOrFail($id);
        return view('admin.receptionists.edit', compact('receptionist'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $receptionist = User::create($validated);
        $receptionist->created_by = Auth::user()->id;
        $receptionist->assignRole('receptionist');
        return redirect()->route('admin.receptionists.index')->with('success', 'Receptionist created successfully.');
    }
    public function update(Request $request, $id) {
        $receptionist = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $receptionist->update($validated);
        return redirect()->route('admin.receptionists.index')->with('success', 'Receptionist updated successfully.');
    }
    public function destroy($id) {
        $receptionist = User::findOrFail($id);
        $receptionist->delete();
        return redirect()->route('admin.receptionists.index')->with('success', 'Receptionist deleted successfully.');
    }
    public function activate($id) {
        $receptionist = User::findOrFail($id);
        $receptionist->status = 'active';
        $receptionist->save();
        return redirect()->route('admin.receptionists.index')->with('success', 'Receptionist activated successfully.');
    }
    public function deactivate($id) {
        $receptionist = User::findOrFail($id);
        $receptionist->status = 'inactive';
        $receptionist->save();
        return redirect()->route('admin.receptionists.index')->with('success', 'Receptionist deactivated successfully.');
    }
}
