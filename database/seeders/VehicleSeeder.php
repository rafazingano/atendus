<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::factory()->count(150)->create([
            'account_id' => Account::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ]);
    }
}
