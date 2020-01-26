<?php

namespace App\Http\Controllers;

use App\Distribution;
use Illuminate\Http\Request;


class DistributionController extends Controller
{
    public function showAllDistributions()
    {
        return response()->json(Distribution::all());
    }

    public function showOneDistribution($id)
    {
        return response()->json(Distribution::find($id));
    }

    public function createDistribution(Request $request)
    {
        $distribution = Distribution::create($request->all());

        return response()->json($distribution, 201);
    }

    public function updateDistribution($id, Request $request)
    {
        $distribution = Distribution::findOrFail($id);
        $distribution->update($request->all());

        return response()->json($distribution, 200);
    }

    public function deleteDistribution($id)
    {
        Distribution::findOrFail($id)->delete();
        return response('Distribution deleted', 200);
    }
}
