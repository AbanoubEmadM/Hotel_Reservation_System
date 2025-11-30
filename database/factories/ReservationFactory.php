<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'room_id' => Room::inRandomOrder()->first()->id,
            'check_in' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'check_out' => $this->faker->dateTimeBetween('+1 week', '+2 week'),
            'paid_price' => $this->faker->numberBetween(100, 1000),
            'is_approved' => $this->faker->randomElement(['pending', 'approved', 'declined']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
