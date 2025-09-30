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
        // 🔹 Create some tags
        $remote = Tag::create(['name' => 'Remote']);
        $fullTime = Tag::create(['name' => 'Full-Time']);
        $php = Tag::create(['name' => 'PHP']);
        $ai = Tag::create(['name' => 'AI']);

        // 🔹 Create a manual employer + jobs
        $openai = Employer::create([
            'name' => 'OpenAI'
        ]);

        $job1 = JobListing::create([
            'title' => 'AI Researcher',
            'salary' => '$150,000',
            'employer_id' => $openai->id
        ]);
        $job1->tags()->attach([$remote->id, $ai->id]);

        $job2 = JobListing::create([
            'title' => 'Prompt Engineer',
            'salary' => '$130,000',
            'employer_id' => $openai->id
        ]);
        $job2->tags()->attach([$fullTime->id, $php->id]);

        // 🔹 Generate 10 employers, each with 5 job listings
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
