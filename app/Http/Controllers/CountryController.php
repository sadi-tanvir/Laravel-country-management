<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // list of all countries with their states
    public function countries()
    {
        $countries = Country::with('states')->get();
        return response()->json($countries);
    }

    // create a new country
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country = Country::create($request->only('name'));
        return response()->json(['success' => true, 'country' => $country]);
    }

    // country according to id
    public function Country($id)
    {
        $country = Country::with('states')->findOrFail($id);
        return response()->json($country);
    }

    // update a country
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->only('name'));
        return response()->json(['success' => true, 'country' => $country]);
    }

    // delete a country
    public function delete($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(['success' => true]);
    }
}
