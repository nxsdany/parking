<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    /**
     * Получение всех клиентов
     */
    public function getAllClients()
    {
        return DB::table('clients')->get();
    }

    /**
     * Получение связанных клиентов и автомобилей
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getClients()
    {
        return DB::table('clients')->leftJoin('cars', 'clients.id', '=', 'cars.client_id')->paginate(5);
    }

    /**
     * Получение клиента по уникальному номеру
     * @param $client_id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getClientById($client_id)
    {
        return DB::table('clients')
            ->where('id', '=', $client_id)->first();
    }

    /**
     * Создание клиента
     * @param $data
     */
    public function storeClient($data)
    {
        DB::table('clients')->insert([$data]);
    }

    /**
     * Обновление данных о клиенте
     * @param $data
     * @param $client_id
     */
    public function updateClient($data, $client_id)
    {
        DB::table("clients")
                ->where('id', '=', $client_id)->update($data);
    }

    /**
     * Удаление клиента с каскадным удалением его машин(ограничение внешнего ключа)
     * @param $client_id
     */
    public function deleteClient($client_id)
    {
        DB::table('clients')->where('id', $client_id)->delete();
    }
}
