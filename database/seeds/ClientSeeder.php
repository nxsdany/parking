<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     * @throws Exception
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('clients')->insert([
                'name' => $faker->name,
                'gender' => random_int(0, 1),
                'phone' => '+' . random_int(79000000000, 79999999999),
                'address' => $faker->streetAddress,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
