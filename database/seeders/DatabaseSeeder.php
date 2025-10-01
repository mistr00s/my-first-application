<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\JobListing;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //  Create some tags
        $remote = Tag::create(['name' => 'Remote']);
        $fullTime = Tag::create(['name' => 'Full-Time']);
        $php = Tag::create(['name' => 'PHP']);

        //  Generate 10 employers, each with 5 job listings
        Employer::factory(10)
            ->has(JobListing::factory(5), 'jobs')
            ->create()
            ->each(function ($employer) use ($remote, $fullTime, $php) {
                // Attach random tags to each job
                $employer->jobs->each(function ($job) use ($remote, $fullTime, $php) {
                    $job->tags()->attach(
                        collect([$remote->id, $fullTime->id, $php->id])->random(rand(1, 3))
                    );
                });
            });
    }
}
