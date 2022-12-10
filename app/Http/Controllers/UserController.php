<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients_list = DB::select(
            '
           
            
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
        
    }
    // public function newClient(Request $request) {

    //     $request->validate([
    //         'name' => 'required|string',
    //         'age' => 'required|integer',
    //         'weight' => 'required|integer',
    //         'nivel' => 'required|string',
    //         // 'tarifas_id' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'roles_id' => 'required',
    //         'users_id' => 'required',
    //         'companies_id' => 'required',
    //         'password' => 'required',

    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'age' => $request->edad,
    //         'weight' => $request->peso,
    //         'nivel' => $request->nivel,
    //         // 'tarifas_id' => $request->tarifas_id, //id tarifa
    //         'email' => $request->email,
    //         'roles_id' => $request->roles_id, //id rol
    //         'campanies_id' => $request->campanies_id,
    //         'password' => $request->password,
    //     ]);

    //     // $new_user = User::create($request->all());
    //     // $new_user->save();

    //     return response([
    //         'user' => $user,
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id) {

        $client = User::find($user_id);
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $client->id,
        ]);

        //Guardar nueva imagen
        if ($request->updated) {

            $request->validate([
                'image' => 'nullable|image'
            ]);

            //Eliminar la imagen anterior
            if (File::exists(public_path($client->image)))
                File::delete(public_path($client->image));

            $client->image = $this->validate_image($request);
        }

        $client->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $request->roles_id,
            'companies_id' => $request->companies_id,
        ]);
        $client->save();

        return response([
            'message' => 'Cliente actualizado exitósamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
    public function validate_image($request) {

        if ($request->hasfile('image')) {
            $name = uniqid() . time() . '.' . $request->file('image')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('image')->storeAs('public', $name);
            return '/storage' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return null;
        }
    }
}
