<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamations = Reclamation::all();

        return response()->json(['reclamations' => $reclamations], 200);
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
    public function store(Request $request, int $reclamationId)
    {
        $validator = Validator::make($request->all(), [
            'response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $feedback = new Feedback();
        $feedback->response = $request->input('response');
        $feedback->admin_id = Auth::user()->id; // Assuming authentication is required
        $feedback->reclamation_id = $reclamationId;
        $feedback->save();

        return response()->json(['message' => 'Feedback created successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $reclamationId)
    {
        $reclamation = Reclamation::findOrfail($reclamationId);
        $feedbacks = $reclamation->feedbacks;

        return response()->json(['reclamation' => $reclamation, 'feedbacks' => $feedbacks], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $feedback)
    {
        return response()->json(['message' => 'This endpoint is not supported for API'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $feedback)
    {
        $validator = Validator::make($request->all(), [
            'response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $updateFeedback = Feedback::findOrfail($feedback);
        $updateFeedback->response = $request->input('response');
        $updateFeedback->update();

        return response()->json(['message' => 'Feedback updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $feedback)
    {
        $feedbackModel = Feedback::findOrfail($feedback);
        $feedbackModel->delete();

        return response()->json(['message' => 'Feedback deleted successfully'], 200);
    }
}
