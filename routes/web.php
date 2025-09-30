<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => JobListing::with(['employer', 'tags'])->get()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => JobListing::with(['employer', 'tags'])->findOrFail($id)
    ]);
});

