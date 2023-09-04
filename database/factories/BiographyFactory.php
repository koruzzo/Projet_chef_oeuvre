<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biography>
 */
class BiographyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(4, true),
            'secret' => $this->faker->paragraphs(2, true),
            'picture' => 'http://via.placeholder.com/400x400',
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
