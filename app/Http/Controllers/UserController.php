<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            return response()->json(User::with(['bicycles', 'country' ])->get(), 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function show(User $user)
    {
        try {
            return response()->json($user->load(['bicycles', 'country']), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $user = User::create($request->all());
            return response()->json($user, 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all());
            return response()->json($user, 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }


    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'Deleted'], 205);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception], 500);
        }
    }

}
