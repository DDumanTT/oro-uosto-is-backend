<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'flight_code' => $this->faker->numerify("F-####"),
            'departure_location' => $this->faker->country(),
            'arrival_location' => $this->faker->country(),
            'status' => $this->faker->numberBetween(0, 3),
            'gate' => $this->faker->bothify("?##"),
            'boarding_time' => now(),
            'duration' => $this->faker->time(),
            'ticket_price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
