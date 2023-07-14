<?php

namespace Database\Factories;

use App\Models\Referral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZoomDate>
 */
class ZoomDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'referral_id' => Referral::factory(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'join_url' => $this->faker->url(),
            'password' => $this->faker->password(),
            'participants' => $this->faker->numberBetween(0, 100),
            'active' => false,
        ];
    }
}
