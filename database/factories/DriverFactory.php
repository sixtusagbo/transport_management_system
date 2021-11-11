<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstNameMale(),
            'last_name' => $this->faker->lastName(),
            'dob' => $this->faker->date(),
            'address' => $this->faker->streetAddress(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'state' => $this->faker->city(),
            'lga' => 'Example LGA',
            'experience' => $this->faker->randomDigitNotZero(),
        ];
    }
}
