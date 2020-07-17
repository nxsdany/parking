<?php

namespace App\Http\Controllers;

use App\Car;
use App\Client;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = (new Car)->getCars();
//        $client = (new Car)->getClientOfCar();
        return view('car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = (new Client)->getAllClients();
        return view('car.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = array();
        $car['brand'] = $request->input('brand');
        $car['model'] = $request->input('model');
        $car['color'] = $request->input('color');
        $car['number'] = $request->input('number');
        $car['client_id'] = $request->input('client_id');
        $car['parked'] = (isset($_POST['parked']) == '1' ? '1' : '0');
        $car['created_at'] = now();
        $car['updated_at'] = now();
       (new Car)->storeCar($car);
       return redirect('car')->with('success','Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = (new Car)->getCarById($id);
        $clients = (new Client)->getAllClients();
        return view('car.edit',compact('car','clients', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = array();
        $car['id'] = $id;
        $car['brand'] = $request->input('brand');
        $car['model'] = $request->input('model');
        $car['color'] = $request->input('color');
        $car['number'] = $request->input('number');
        $car['client_id'] = $request->input('client_id');
        $car['parked'] = (isset($_POST['parked']) == '1' ? '1' : '0');
        $car['updated_at'] = now();
        (new Car)->updateCar($car, $id);
              return redirect('client')->with('success','Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Car)->deleteCar($id);
        return redirect('car')->with('success','Car delete successfully.');
    }
}
