<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Referral;
use App\Models\ZoomDate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register>
 */
class RegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $referral = Referral::inRandomOrder()->first();

        return [
            'zoom_date_id' => ZoomDate::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique(true)->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'referral_id' => $referral->id,
        ];
    }
}
