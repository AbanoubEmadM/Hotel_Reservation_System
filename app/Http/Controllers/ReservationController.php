<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;

class ReservationController extends Controller
{
    public function index($id) {
        $reservation = Reservation::findOrfail($id);
        return view('reservations.index', compact('reservation'));
    }
    public function store(Request $request) {
    }
}
