<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\MeetingScheduled;
class MeetingController extends Controller
{

    // Display the list of meetings
    public function index()
    {
        $meetings = Meeting::all(); // Fetch all meetings
        return view('admin.pages.meeting', compact('meetings'));
    }


    // Store a new meeting
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'agenda' => 'required|string',
            'description' => 'nullable|string',
            'attendees' => 'nullable|array',
            'status' => 'required|string|in:scheduled,ongoing,completed,canceled',
        ]);

        // Create the meeting
        $meeting = Meeting::create($validated);

        // Send notifications to attendees
        $users = User::whereIn('id', $validated['attendees'] ?? [])->get();
        Notification::send($users, new MeetingScheduled($meeting));

        // Redirect with success message
        return redirect()->route('admin.pages.meeting')->with('success', 'Meeting created successfully!');
    }

    // Update a meeting
    public function update(Request $request, Meeting $meeting)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'location' => 'required|string|max:255',
            'agenda' => 'required|string',
            'description' => 'nullable|string',
            'attendees' => 'nullable|array',
            'status' => 'required|string|in:scheduled,ongoing,completed,canceled',
        ]);

        $meeting->update($validated);

        // Redirect with success message
        return redirect()->route('admin.pages.meeting')->with('success', 'Meeting updated successfully!');
    }

    // Delete a meeting
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        // Redirect with success message
        return redirect()->route('admin.pages.meeting')->with('success', 'Meeting deleted successfully!');
    }


}
