<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class ReceptionistController extends Controller
{
    public function index() {

        $receptionists = Auth::user()->hasRole('admin') ? User::role('receptionist')->get() : User::role('receptionist')->where('created_by', Auth::user()->id)->get();

        return view('admin.receptionists.index', compact('receptionists'));
    }

    public function create() {
        return view('admin.receptionists.create');
    }

    public function edit($id) {
        $receptionist = User::findOrFail($id);
        return view('admin.receptionists.edit', compact('receptionist'));
    }

    public function store(StoreUserRequest $request) {
        $request->password = bcrypt($request->password);
        $request['created_by'] = Auth::user()->id;

        $receptionist = User::create($request->all());
        $receptionist->assignRole('receptionist');
        return redirect()->route('admin.receptionists.index')->with('success', 'Receptionist created successfully.');
    }

    public function update(UpdateUserRequest $request, $id) {
        $receptionist = User::findOrFail($id);

        if (!empty($request->password)) {
            $request->password = bcrypt($request->password);
        } else {
            unset($request->password);
        }
        $receptionist->update($request->all());

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
