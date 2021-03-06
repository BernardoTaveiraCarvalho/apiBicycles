<?php

namespace App\Http\Controllers;

use App\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Bicycle::with(['user'])->get(), 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function show(Bicycle $bicycle)
    {
        try {
            return response()->json($bicycle->load(['user']), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $bicycle = Bicycle::create($request->all());
            return response()->json($bicycle, 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function update(Request $request, Bicycle $bicycle)
    {
        try {
            $bicycle->update($request->all());
            return response()->json($bicycle, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function destroy(Bicycle $bicycle)
    {
        try {
            $bicycle->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }

}
