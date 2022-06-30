<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Rental;
use App\Models\Vehicle;
use App\Models\VehicleOwnership;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleOwnership::factory()->count(10)->create();
        Vehicle::factory()->count(10)->create();
        Driver::factory()->count(10)->create();
        Rental::factory()->count(10)->create();
    }
}
