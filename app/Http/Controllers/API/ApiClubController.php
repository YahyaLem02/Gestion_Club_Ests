<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();

        return response()->json(['clubs' => $clubs], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(['message' => 'This endpoint is not supported for API'], 404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $club = new Club();
        $club->name = $request->input('club_name');
        $club->description = $request->input('description');
        $club->image = $request->input('image');
        $club->admin_id = Auth::user()->id;
        $club->save();

        return response()->json(['message' => 'Club created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $club = Club::find($id);

        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        // Retrieve reclamations of the club
        $reclamations = $club->reclamations;

        return response()->json(['club' => $club, 'reclamations' => $reclamations], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return response()->json(['message' => 'This endpoint is not supported for API'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        return response()->json(['message' => 'This endpoint is not supported for API'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $club = Club::find($id);

        if (!$club) {
            return response()->json(['error' => 'Club not found'], 404);
        }

        $club->delete();

        return response()->json(['message' => 'Club deleted successfully'], 200);
    }
}
