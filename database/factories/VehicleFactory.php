<?php

namespace Database\Factories;

use App\Models\Destination;
use App\Models\Driver;
use App\Models\Vehicle;
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
        $cars = ['Ford', 'Toyota', 'Suzuki', 'Nissan', 'Isuzu'];
        $models = ['Falcon', 'Hiace', 'Forenza', 'Urvan', 'Oasis'];
        // Ensures that this same car gets the right model
        $randomChoice = $this->faker->numberBetween(0, 4);

        return [
            "name" => $cars[$randomChoice],
            "model" => $models[$randomChoice],
            "plate_number" => $this->faker->regexify('[A-Z]{3}-[0-9]{3}[A-Z]{2}'),
            "no_of_seats" => $this->faker->numberBetween(14, 25),
            "driver_id" => Driver::where('vehicle_id', null)->get()->random()->id,
            "destination_id" => Destination::all()->random()->id,
            "depature_time" => $this->faker->time(),
        ];
    }
}
