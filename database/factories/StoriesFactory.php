<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 10),
            'title' => fake()->sentence(),
            'subject' => fake()->sentence(),
            'description' => fake()->paragraph() . ' = ' . fake()->title(),
            'is_publish' => rand(0, 1)
        ];
    }
}
