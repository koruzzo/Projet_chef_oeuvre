<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Point;
use App\Models\User;
use App\Models\Biography;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Biography>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Point::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'biography_id' => Biography::factory(),
        ];
    }
}
