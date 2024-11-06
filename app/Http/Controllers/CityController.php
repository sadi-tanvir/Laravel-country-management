<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // list of all cities
    public function cities()
    {
        $cities = City::with('state')->get();
        return response()->json($cities);
    }

    // create a new city
    public function create(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'name' => 'required|string|max:255'
        ]);

        $city = City::create($request->all());
        return response()->json($city, 201);
    }

    // City according to id
    public function city($id)
    {
        $city = City::with('state')->findOrFail($id);
        return response()->json($city);
    }

    //  update a city
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $request->validate([
            'state_id' => 'sometimes|exists:states,id',
            'name' => 'sometimes|string|max:255'
        ]);

        $city->update($request->all());
        return response()->json($city);
    }

    // delete a city
    public function delete($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return response()->json(['message' => 'City deleted successfully']);
    }
}
