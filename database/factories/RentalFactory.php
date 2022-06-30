<?php

namespace Database\Factories;

use App\Enums\RentalStatus;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_id' => Vehicle::get()->random()->id,
            'driver_id' => Driver::get()->random()->id,
            'petrol_usage' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(RentalStatus::asArray()),
        ];
    }
}
