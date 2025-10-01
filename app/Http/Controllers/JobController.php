<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index', [
            'jobs' => JobListing::with(['employer', 'tags'])->paginate(10)
        ]);
    }

    public function show(JobListing $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|min:3|max:255',
            'salary'      => 'required',
            'employer_id' => 'required|exists:employers,id',
            'tags'        => 'array',
            'tags.*'      => 'exists:tags,id',
        ]);

        $job = JobListing::create([
            'title'       => $validated['title'],
            'salary'      => $validated['salary'],
            'employer_id' => $validated['employer_id'],
        ]);

        if (!empty($validated['tags'])) {
            $job->tags()->attach($validated['tags']);
        }

        return redirect('/jobs')->with('success', 'Job created successfully!');
    }

    public function edit(JobListing $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'title'       => 'required|min:3|max:255',
            'salary'      => 'required',
            'employer_id' => 'required|exists:employers,id',
        ]);

        $job->update($validated);

        return redirect('/jobs/' . $job->id)->with('success', 'Job updated successfully!');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();

        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    }
}
