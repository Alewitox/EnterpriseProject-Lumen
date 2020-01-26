<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function showAllReservations()
    {
        return response()->json(Reservation::all());
    }

    public function showOneReservation($id)
    {
        return response()->json(Reservation::find($id));
    }

    public function createReservation(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return response()->json($reservation, 201);
    }

    public function updateReservation($id, Request $request)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return response()->json($reservation, 200);
    }

    public function deleteReservation($id)
    {
        Reservation::findOrFail($id)->delete();
        return response('Reservation deleted', 200);
    }
}
