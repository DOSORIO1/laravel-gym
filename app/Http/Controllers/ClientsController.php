<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\payments;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller {
    public function index() {
        // $client_list = clients::all();
        // return  $client_list;

        $clients_list = DB::select(
            '
            SELECT clients.*, users.name,users.email,users.password, payments.start_date, payments.finish_date, rates.name AS rates , rates.price, users.roles_id, clients.companies_id
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
    public function create() {
        return View('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validated = $request->validate([
            //user
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            //clients
            'age' => 'required|numeric|digits_between:1,2',
            'weight' =>  'required|numeric|digits_between:1,3',
            'injures' => 'required',
            'nivel' => 'required',
            //payments
            // 'total' => 'required|numeric',
            'start_date' => 'required',
        ]);

        $new_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roles_id' => 4, //Rol cliente
            'companies_id' => $request->companies_id,
        ]);
        $new_user->save();

        $new_clients = clients::create([
            'users_id' => $new_user->id, //id user
            'age' => $request->age,
            'weight' => $request->weight,
            'nivel' => $request->nivel,
            'injures' => $request->injures,
            'companies_id' => $request->companies_id,
        ]);
        $new_clients->save();

        $new_payment = payments::create([
            'rates_id' => $request->rates_id,
            'clients_id' => $new_clients->id, //id client
            'total' => $request->total,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ]);
        $new_payment->save();

        return response(['message' => 'ok'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(clients $clients) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(clients $clients) {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $payment_id) {

        $payment = payments::find($payment_id);
        $client = clients::find($payment->clients_id);
        $user = User::find($client->users_id);

        $validated = $request->validate([
            //user
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            //clients
            'age' => 'required|numeric|digits_between:1,2',
            'weight' =>  'required|numeric|digits_between:1,3',
            'injures' => 'required',
            'nivel' => 'required',
            //payments
            // 'total' => 'required|numeric',
            'start_date' => 'required',
        ]);

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => 4, //Rol cliente
            'companies_id' => $request->companies_id,
        ]);
        $user->save();

        $client->fill([
            'age' => $request->age,
            'weight' => $request->weight,
            'nivel' => $request->nivel,
            'injures' => $request->injures,
        ]);
        $client->save();

        $payment = payments::create([
            'rates_id' => $request->rates_id,
            'total' => $request->total,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ]);
        $payment->save();

        //$clients->fill($request->all())->save();
        return response(['message' => 'ok'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $new_clients = clients::find($id);
        $new_clients->delete();

        //
    }
}
