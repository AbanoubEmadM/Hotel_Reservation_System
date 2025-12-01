<?php

namespace App\Http\Controllers;

use App\Models\fs;
use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Room;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $floors = Floor::all();
        return view('admin.floors.index', compact('floors'));
    }

    public function create() {
        $rooms = Room::all();

        return view('admin.floors.create', compact('rooms'));
    }

    public function edit($id) {
        $floor = Floor::findOrFail($id);
        $rooms = Room::where('id', $floor->room_id)->get();
        return view('admin.floors.edit', compact(['floor','rooms']));
    }

    public function store(StoreUserRequest $request) {

        $floor = Floor::create($request->all());
        return redirect()->route('admin.floors.index')->with('success', 'Floor created successfully.');
    }

    public function update(UpdateUserRequest $request, $id) {
        $floor = Floor::findOrFail($id);

        $floor->update($request->all());

        return redirect()->route('admin.floors.index')->with('success', 'Floor updated successfully.');
    }

    public function destroy($id) {
        $floor = Floor::findOrFail($id);
        $floor->delete();
        return redirect()->route('admin.floors.index')->with('success', 'Floor deleted successfully.');
    }

}
