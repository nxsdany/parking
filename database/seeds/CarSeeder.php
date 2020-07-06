<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
          $clients = DB::table('clients')->get();
//        $colors = ['Красный', 'Синий', 'Зеленый', 'Баклажан', 'Мокрый асфальт'];
        $symbols = ['А', 'В', 'Е', 'К', 'М', 'Н', 'О', 'Р', 'С', 'Т', 'У', 'Х'];
        $brands = ['AUDI', 'BMW', 'ВАЗ', 'OPEL', 'RENO'];
        $models = ['2115', 'e34', 'A7', '99', 'B3'];
        $numOfClients = count($clients);
        $carNums = [];
        while (count($carNums) < $numOfClients) {
            $num = $symbols[array_rand($symbols, 1)] . rand(0, 999) . $symbols[array_rand($symbols, 1)] . $symbols[array_rand($symbols, 1)];
            if (in_array($num, $carNums)) {
                continue;
            }
            $carNums[] = $num;
        }

        foreach ($clients as $v) {
            DB::table('cars')->insert([
                'client_id' => $v->id,
                'brand' => $brands[array_rand($brands, 1)],
                'color' => $faker->colorName,
                'model' => $models[array_rand($models, 1)],
                'number' => array_pop($carNums),
                'parked' => rand(0, 10) % 2 == 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
