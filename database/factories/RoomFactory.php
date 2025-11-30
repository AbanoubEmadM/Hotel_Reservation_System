<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageKeywords = ['hotel-room', 'bedroom', 'resort-room', 'room-interior'];

        return [
            'number' => $this->faker->unique()->numberBetween(1, 100),
            'room_type_id' => RoomType::inRandomOrder()->first()->id,
            'price' => $this->faker->numberBetween(100, 1000),
            'status' => $this->faker->randomElement(['available',
                'occupied',
                'cleaning',
                'maintenance',
                'reserved'
            ]),
            'description' => $this->faker->text(),
            'capacity' => $this->faker->numberBetween(1, 10),
            'beds' => $this->faker->numberBetween(1, 3),
            'baths' => $this->faker->numberBetween(1, 2),
            'image' => 'https://loremflickr.com/640/480/' . $this->faker->randomElement([
                'hotel,room',
                'bedroom,interior',
                'resort,hotel'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
