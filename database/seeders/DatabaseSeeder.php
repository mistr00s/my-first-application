<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\JobListing;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an employer
        $employer = Employer::create([
            'name' => 'Tech Corp'
        ]);

        // Create job listings for that employer
        $job1 = JobListing::create([
            'title' => 'Software Engineer',
            'salary' => '$80,000',
            'employer_id' => $employer->id
        ]);

        $job2 = JobListing::create([
            'title' => 'Project Manager',
            'salary' => '$95,000',
            'employer_id' => $employer->id
        ]);

        // 🔹 Create some tags
        $remote = Tag::create(['name' => 'Remote']);
        $fullTime = Tag::create(['name' => 'Full-Time']);
        $php = Tag::create(['name' => 'PHP']);

        // 🔹 Attach tags to jobs
        $job1->tags()->attach([$remote->id, $php->id]);
        $job2->tags()->attach([$fullTime->id]);
    }
}
