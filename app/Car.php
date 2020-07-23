<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    /**
     * Получение всех автомобилей
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCars()
    {
        return DB::table('cars')->join('clients', 'cars.client_id', '=', 'clients.id')->paginate(5);
    }

    /**
     * Получение автомобиля
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getCarById($id)
    {
                return DB::table('cars')
            ->where('id', '=', $id)->first();
    }

    /**
     * Добавление автомобиля
     * @param $data
     */
    public function storeCar($data)
    {
        DB::table('cars')->insert([$data]);
    }

    /**
     * Обновление данных автомобиля
     * @param $data
     * @param $id
     */
    public function updateCar($data, $id)
    {
        DB::table("cars")
                ->where('id', '=', $id)->update($data);
    }

    /**
     * Удаление автомобиля
     * @param $client_id
     */
    public function deleteCar($client_id)
    {
        DB::table('cars')->where('id', $client_id)->delete();
    }
}

