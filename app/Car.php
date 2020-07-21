<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    public function getCars()
    {
        return DB::table('cars')->join('clients', 'cars.client_id', '=', 'clients.id')->paginate(5);
    }

    public function storeCar($data)
    {
        DB::table('cars')->insert([$data]);
    }

    public function updateCar($data, $id)
    {
        DB::table("cars")
                ->where('id', '=', $id)->update($data);
    }

    public function deleteCar($client_id)
    {
        DB::table('cars')->where('id', $client_id)->delete();
    }

    public function getCarById($id)
    {
                return DB::table('cars')
            ->where('id', '=', $id)->first();
    }
    public function getClientOfCar($client_id)
    {
        return DB::table('clients')->where('id', $client_id)->first();
    }
}

