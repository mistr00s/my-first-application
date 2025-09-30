<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => '$' . fake()->numberBetween(40, 120) . ',000',
            'employer_id' => Employer::factory(), // create employer if none exists
        ];
    }
}
