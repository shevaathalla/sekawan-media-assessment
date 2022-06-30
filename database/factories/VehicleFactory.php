<?php

namespace Database\Factories;

use App\Enums\VehicleStatus;
use App\Enums\VehicleType;
use App\Models\VehicleOwnership;
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
            'name' => $this->faker->name,
            'code' => "VHC-{$this->faker->unique()->numberBetween(1, 100)}",
            'current_petrol' => $this->faker->numberBetween(1, 100),
            'type' => $this->faker->randomElement(VehicleType::asArray()),
            'status' => $this->faker->randomElement(VehicleStatus::asArray()),
            'vehicle_ownership_id' => VehicleOwnership::get()->random()->id,        
        ];
    }
}
