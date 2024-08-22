<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedbackService;
use Illuminate\Support\Facades\Validator;

class FeedbackServiceController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = FeedbackService::all();
        return response()->json(['data' => $feedbacks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'    => 'required|integer',
            'service_id' => 'required|integer',
            'content'    => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $feedback = FeedbackService::create($request->all());

        return response()->json(['message' => 'Feedback created successfully', 'data' => $feedback], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

