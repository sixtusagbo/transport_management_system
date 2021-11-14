<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Nissan',
            'model' => 'Urvan',
            'plate_number' => 'EBS1011',
            'no_of_seats' => random_int(14, 25),
            'driver_id' => '1',
            'status' => '0',
        ];
    }
}
