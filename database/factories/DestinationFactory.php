<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->city() . ' to ' . $this->faker->city(),
            "amount" => $this->faker->numberBetween(4000, 17000)
        ];
    }
}
