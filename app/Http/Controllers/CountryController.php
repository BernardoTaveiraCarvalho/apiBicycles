<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Country::with(['users'])->get(), 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function show(Country $country)
    {
        try {
            return response()->json($country->load(['users']), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $country = Country::create($request->all());
            return response()->json($country, 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function update(Request $request, Country $country)
    {
        try {
            $country->update($request->all());
            return response()->json($country, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function destroy(Country $country)
    {
        try {
            $country->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }

}
