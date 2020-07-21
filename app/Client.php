<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    public function getAllClients()
    {
        return DB::table('clients')->get();
    }

    public function getClients()
    {
        return DB::table('clients')->leftJoin('cars', 'clients.id', '=', 'cars.client_id')->paginate(5);
    }

    public function getClientById($client_id)
    {
        return DB::table('clients')
            ->where('id', '=', $client_id)->first();
    }

    public function storeClient($data)
    {
        DB::table('clients')->insert([$data]);
    }

    public function updateClient($data, $client_id)
    {
        DB::table("clients")
                ->where('id', '=', $client_id)->update($data);
    }

    public function deleteClient($client_id)
    {
        DB::table('clients')->where('id', $client_id)->delete();
    }
}
