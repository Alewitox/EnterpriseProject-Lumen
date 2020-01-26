<?php

namespace App\Http\Controllers;

use App\Availability;
use Illuminate\Http\Request;


class AvailabilityController extends Controller
{
    public function showAllAvailabilities()
    {
        return response()->json(Availability::all());
    }

    public function showOneAvailability($id)
    {
        return response()->json(Availability::find($id));
    }

    public function createAvailability(Request $request)
    {
        $availability = Availability::create($request->all());

        return response()->json($availability, 201);
    }

    public function updateAvailability($id, Request $request)
    {
        $availability = Availability::findOrFail($id);
        $availability->update($request->all());

        return response()->json($availability, 200);
    }

    public function deleteAvailability($id)
    {
        Availability::findOrFail($id)->delete();
        return response('Availability deleted', 200);
    }
}
