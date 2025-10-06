<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with('employer')->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.index')->with('message', 'Job created successfully!');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $job->update($validated);

        return redirect()->route('jobs.index')->with('message', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('message', 'Job deleted successfully!');
    }
}
