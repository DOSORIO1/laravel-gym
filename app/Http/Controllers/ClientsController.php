<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    public function index()
    {
        // $client_list = clients::all();
        // return  $client_list;

        $clients_list = DB::select(
            '
            SELECT clients.*, users.name,users.email, payments.start_date, payments.finish_date, rates.name AS tarifa, rates.price, users.roles_id, clients.companies_id
            FROM clients, users, payments, rates, roles, companies
            WHERE clients.users_id = users.id
            AND  clients.id = payments.clients_id
            AND rates.id = payments.rates_id
            AND companies.id = clients.companies_id
            AND users.roles_id = roles.id
            AND roles.code = "C"  
            ORDER BY `clients`.`users_id` ASC
            
            '
            //    SELECT clients.age, clients.weight, clients.nivel, clients.injures, users.name,users.email,payments.start_date, payments.finish_date,rates.name AS tarifa ,rates.price,users.roles_id
            //     FROM clients, users,payments,rates, roles
            //     WHERE clients.users_id = users.id
            //     AND  clients.id = payments.clients_id
            //     AND rates.id = payments.rates_id
            //     AND users.roles_id = 4
        );

        return response([
            'clients_list' => $clients_list,
        ]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|digits_between:1,2',
            'weight' =>  'required|numeric|digits_between:1,3',
            'nivel' => 'required',
            'email' => 'required',
            'injures' => 'required'

        ]);

        $new_clients = clients::create($request->all());
        $new_clients->save();


        return response(['message' => 'ok'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(clients $clients)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $clients)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric|digits_between:1,2',
            'weight' =>  'required|numeric|digits_between:1,3',
            'nivel' => 'required',
            'email' => 'required',
            'injures' => 'required'

        ]);

        $clients = clients::find($clients);
        $clients->fill($request->all())->save();
        return response()->json([
            'clients' => $clients
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new_clients = clients::find($id);
        $new_clients->delete();

        //
    }
}
