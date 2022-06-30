<?php

namespace Database\Seeders;

use App\Enums\UserLevel;
use App\Models\User;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'level' => UserLevel::Admin,
        ]);

        User::factory()->create([
            'name' => 'Branch Manager',
            'email' => 'branch_manager@mail.com',
            'password' => bcrypt('password'),
            'level' => UserLevel::BranchManager,
        ]);

        User::factory()->create([
            'name' => 'Region Manager',
            'email' => 'region_manager@mail.com',
            'password' => bcrypt('password'),
            'level' => UserLevel::RegionManager,
        ]);
    }
}
