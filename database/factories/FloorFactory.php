<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Floor>
 */
class FloorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => Room::inRandomOrder()->first()->id,
            'name' => $this->faker->randomElement(['First Floor', 'Second Floor', 'Third Floor', 'Fourth Floor', 'Fifth Floor', 'Ground Floor', 'Penthouse Floor']),
            'number' => $this->faker->unique()->numberBetween(1, 20),
        ];
    }
}
