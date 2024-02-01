<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Reclamation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiReclamationController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamations = User::all();

        return response()->json(['reclamations' => $reclamations], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();

        return response()->json(['clubs' => $clubs], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CorpReclamation' => 'required',
            'title' => 'required',
            'club_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $reclamation = new Reclamation();
        $reclamation->CorpReclamation = $request->input('CorpReclamation');
        $reclamation->title = $request->input('title');
        $reclamation->club_id = $request->input('club_id');
        $reclamation->adherant_id = 1; // Replace this with the actual user ID
        $reclamation->save();

        return response()->json(['message' => 'Reclamation created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $reclamation = Reclamation::find($id);

        if (!$reclamation) {
            return response()->json(['error' => 'Reclamation not found'], 404);
        }

        return response()->json(['reclamation' => $reclamation], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $NumReclamation)
    {
        $reclamation = Reclamation::find($NumReclamation);

        if (!$reclamation) {
            return response()->json(['error' => 'Reclamation not found'], 404);
        }

        return response()->json(['reclamation' => $reclamation], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $reclamation)
    {
        $reclamationModel = Reclamation::find($reclamation);
    
        if (!$reclamationModel) {
            return response()->json(['error' => 'Reclamation not found'], 404);
        }
    
        // $reclamationModel->CorpReclamation = $request->input('CorpReclamation');
        $reclamationModel->CorpReclamation =  $request->input('CorpReclamation');

        $reclamationModel->save();  // Use save() instead of update()
    
        return response()->json(['message' => 'Reclamation updated successfully'], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $reclamation = Reclamation::find($id);

        if (!$reclamation) {
            return response()->json(['error' => 'Reclamation not found'], 404);
        }

        $reclamation->delete();

        return response()->json(['message' => 'Reclamation deleted successfully'], 200);
    }
}
