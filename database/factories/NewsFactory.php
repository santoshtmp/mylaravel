<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
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
            'subject' => fake()->company(),
            'description' => $this->faker->paragraph(5),
            'location' => $this->faker->city(),
            'tags' => implode(',', $this->faker->words(2)) . ',laravel,api',
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'is_publish' => rand(0, 1),
        ];
    }
}
