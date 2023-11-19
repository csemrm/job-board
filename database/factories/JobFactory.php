<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=> fake()->jobTitle,
            "description"=> fake()->paragraphs(5, true),
            "salary"=>fake()->numberBetween(5_0000,150_0000),
            "location"=>fake()->city,
            "category"=>fake()->randomElement(Job::$category),
            "experience"=>fake()->randomElement(Job::$experience)
        ];
    }
}
