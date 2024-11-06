<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    // list of all states with their countries and cities
    public function states()
    {
        $states = State::with('country', 'cities')->get();
        return response()->json($states);
    }

    // create a new State
    public function create(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name' => 'required|string|max:255'
        ]);

        $state = State::create($request->all());
        return response()->json($state, 201);
    }

    // State according to id
    public function state($id)
    {
        $state = State::with('country', 'cities')->findOrFail($id);
        return response()->json($state);
    }

    // update a State
    public function update(Request $request, $id)
    {
        $state = State::findOrFail($id);

        $request->validate([
            'country_id' => 'sometimes|exists:countries,id',
            'name' => 'sometimes|string|max:255'
        ]);

        $state->update($request->all());
        return response()->json($state);
    }

    // delete a State
    public function delete($id)
    {
        $state = State::findOrFail($id);
        $state->delete();
        return response()->json(['message' => 'State deleted successfully']);
    }
}
