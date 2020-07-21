<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index()
    {
        return DB::table('clients')->join('cars', 'clients.id', '=', 'cars.client_id')->distinct()->orderBy('cars.updated_at')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $car = array();
        $car['parked'] = $request->parked;
        $car['updated_at'] = now();
        (new Car)->updateCar($car, $id);
    }
}
