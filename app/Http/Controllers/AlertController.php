<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    // Display all alerts
    public function index()
    {
        $alerts = Alert::all();
        return view('admin.pages.alerts', compact('alerts'));
    }

    // Store a new alert
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'alert_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'status' => 'required|in:active,inactive,pending,suspended',
        ]);

        // Create a new alert
        Alert::create([
            'alert_name' => $request->alert_name,
            'location' => $request->location,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.pages.alerts')->with('success', 'Alert added successfully!');
    }

    // Update an alert
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'alert_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
            'status' => 'required|in:active,inactive,pending,suspended',
        ]);

        // Find the alert and update it
        $alert = Alert::findOrFail($id);
        $alert->update([
            'alert_name' => $request->alert_name,
            'location' => $request->location,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'status' => $request->status,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.pages.alerts')->with('success', 'Alert updated successfully!');
    }

    // Delete an alert
    public function destroy($id)
    {
        // Find the alert and delete it
        $alert = Alert::findOrFail($id);
        $alert->delete();

        // Redirect back with a success message
        return redirect()->route('admin.pages.alerts')->with('success', 'Alert deleted successfully!');
    }
}
