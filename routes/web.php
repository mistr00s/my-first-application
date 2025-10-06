<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('home');
});
// Resource
Route::resource('jobs', JobController::class);

// All Jobs
Route::get('/jobs', [JobController::class, 'index']);

// Show Create Job Form
Route::get('/jobs/create', [JobController::class, 'create']);

// Store New Job
Route::post('/jobs', [JobController::class, 'store']);

// Single Job (Route Model Binding)
Route::get('/jobs/{job}', [JobController::class, 'show']);

// Show Edit Job Form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// Update Job
Route::put('/jobs/{job}', [JobController::class, 'update']);

// Delete Job
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
