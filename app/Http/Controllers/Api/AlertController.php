<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alert;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Get all alerts
    public function index()
    {
        return Alert::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    // Create a new alert
    public function store(Request $request)
    {
        $alert = Alert::create($request->all());
        return response()->json($alert, 201);
    }

    /**
     * Display the specified resource.
     */
    // Get a specific alert
    public function show($id)
    {
        return Alert::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    // Update an alert
    public function update(Request $request, $id)
    {
        $alert = Alert::findOrFail($id);
        $alert->update($request->all());
        return response()->json($alert, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    // Delete an alert
    public function destroy($id)
    {
        Alert::destroy($id);
        return response()->json(null, 204);
    }
}
