<?php

namespace App\Http\Controllers;

use App\Client;
use App\Car;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Client;
        $clients = $model->getClients();
        $cars = (new Car)->getClientOfCar(3);
//        $cars = $model->cars(3);
        return view('client.index', compact('clients', 'cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $client = $request->except(['_token', 'submit']);
        $client = array();
        $client['name'] = $request->input('name');
        $client['gender'] = (isset($_POST['gender']) == '1' ? '1' : '0');
        $client['phone'] = $request->input('phone');
        $client['address'] = $request->input('address');
        $client['created_at'] = now();
        $client['updated_at'] = now();
       (new Client)->storeClient($client);
       return redirect('client')->with('success','Client created successfully.');
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
     * @param $client_id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id)
    {
        $client = (new Client)->getClientById($client_id);
        return view('client.edit',compact('client','client_id'));
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
        $client = array();
        $client['id'] = $id;
        $client['name'] = $request->input('name');
        $client['gender'] = (isset($_POST['gender']) == '1' ? '1' : '0');
        $client['phone'] = $request->input('phone');
        $client['address'] = $request->input('address');
        $client['updated_at'] = now();
        dd($client)
       (new Client)->updateClient($client, $id);
              return redirect('client')->with('success','Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new Client)->deleteClient($id);
        return redirect('client')->with('success','Client & his cars delete successfully.');
    }
}
