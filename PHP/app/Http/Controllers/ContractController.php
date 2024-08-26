<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContractController
{
    /**
     * Display a listing of the contracts.
     */
    public function index()
    {
        $contracts = Contract::all();
        return response()->json(['data' => $contracts]);
    }

    /**
     * Store a newly created contract in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'nullable|integer',
            'company_id'  => 'nullable|integer',
            'address_id'  => 'nullable|integer',
            'status'      => 'nullable|string|max:20',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
            'price'       => 'nullable|numeric',
            'rating'      => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contract = Contract::create($request->all());

        return response()->json(['message' => 'Contract created successfully', 'data' => $contract], 201);
    }

    /**
     * Display the specified contract.
     */
    public function show($id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Contract not found'], 404);
        }

        return response()->json(['data' => $contract]);
    }

    /**
     * Update the specified contract in storage.
     */
    public function update(Request $request, $id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Contract not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'customer_id' => 'nullable|integer',
            'company_id'  => 'nullable|integer',
            'address_id'  => 'nullable|integer',
            'status'      => 'nullable|string|max:20',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date',
            'price'       => 'nullable|numeric',
            'rating'      => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contract->update($request->all());

        return response()->json(['message' => 'Contract updated successfully', 'data' => $contract]);
    }

    /**
     * Remove the specified contract from storage.
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Contract not found'], 404);
        }

        $contract->delete();

        return response()->json(['message' => 'Contract deleted successfully']);
    }
}
