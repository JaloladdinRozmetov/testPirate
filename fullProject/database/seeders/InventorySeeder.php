<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('inventories')->insert([
                'name' => $faker->word,
                'employee_id' => $faker->numberBetween(1, 10),
                'status' => $faker->randomElement(['opened', 'closed']),
            ]);
        }
    }
}
