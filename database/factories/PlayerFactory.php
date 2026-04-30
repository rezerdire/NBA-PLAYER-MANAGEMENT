<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'position' => $this->faker->randomElement([
                'Shooting_Guard',
                'Point_Guard',
                'Power_Forward',
                'Center',
                'Small_Forward'
            ]),
            'team' => $this->faker->company(),
            'status' => $this->faker->randomElement(['active', 'injured', 'suspended', 'retired']),
        ];
    }
}
