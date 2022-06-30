<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleOwnershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->name,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,                    
        ];
    }
}
