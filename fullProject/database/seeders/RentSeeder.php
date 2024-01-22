<?php

namespace Database\Seeders;

use App\Models\CLient;
use App\Models\Inventory;
use App\Models\Rent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $numberOfRecords = 20;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            Rent::create([
                'first_date' => $faker->dateTimeBetween('-1 month', '+1 month'),
                'last_date' => $faker->dateTimeBetween('+1 day', '+3 months'),
                'client_id' => Client::inRandomOrder()->first()->id,
                'inventory_id' => Inventory::inRandomOrder()->first()->id,
                'rent_cost' => $faker->randomFloat(2, 100, 1000),
            ]);
        }
    }
}
