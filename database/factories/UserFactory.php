<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstNameFemale(),
            'last_name' => $this->faker->lastName(),
            'middle_name' => $this->faker->firstNameFemale(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
            'dob' => $this->faker->date(),
            'gender' => 'Female',
            'address' => $this->faker->streetAddress(),
            'emergency' => $this->faker->phoneNumber(),
            'type' => 0,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
