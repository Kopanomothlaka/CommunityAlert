<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Display all job postings
    public function index()
    {
        $jobs = Job::all();
        return view('admin.pages.jobs', compact('jobs'));
    }

    // Store a new job posting
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'min_salary' => 'nullable|numeric',
            'max_salary' => 'nullable|numeric',
            'job_type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'description' => 'required|string',
            'status' => 'required|string|max:255',
        ]);

        Job::create($validatedData);

        return redirect()->route('admin.pages.jobs')->with('success', 'Job posted successfully!');
    }

    // Delete a job posting
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.pages.jobs')->with('success', 'Job deleted successfully!');
    }
}
