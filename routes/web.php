<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => \App\Models\JobListing::with(['employer', 'tags'])->paginate(5)
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => JobListing::with(['employer', 'tags'])->findOrFail($id)
    ]);
});

