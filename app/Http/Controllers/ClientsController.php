<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\payments;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ClientsController extends Controller
{
    public function index(Request $request)
    {
        // $client_list = clients::all();
        // return  $client_list;

        $clients_list = DB::select(
            'SELECT 
            clients.*, 
            clients.users_id AS id, 
            users.image, 
            users.name,
            users.email,
            users.password, 
            payments.start_date, 
            payments.finish_date, 
            rates.name AS rates, 
            rates.id AS rates_id, 
            rates.price, 
            users.roles_id, 
            users.companies_id AS companies_id, 
            MAX(payments.start_date) as fecha_inicio,
            MAX(payments.finish_date) as fecha_final

            FROM clients, users, payments, rates, roles, companies
            WHERE clients.users_id = users.id
            AND  clients.id = payments.clients_id
            AND rates.id = payments.rates_id
            AND companies.id = users.companies_id
            AND users.companies_id = ' . $request->companies_id . '
            AND users.roles_id = roles.id
            AND roles.code = "C"  
            AND users.deleted_at IS NULL  
            GROUP BY users.id   
			ORDER BY users.companies_id DESC'


        );
        $delete_list = DB::select(
            'SELECT users.*
            FROM users, roles, clients, companies
            WHERE roles.id = users.roles_id
            AND users.id = clients.users_id
            AND companies.id = users.companies_id
            AND companies.id = ' . $request->companies_id . '
            AND roles.code = "C"
            AND users.deleted_at IS NOT NULL'
        );

        $employed_list = DB::select(
            'SELECT users.*
            FROM users, roles, companies
            WHERE roles.id = users.roles_id
            AND companies.id = users.companies_id
            AND companies.id = ' . $request->companies_id . '
            AND roles.code = "E"'
        );



        return response([
            'clients_list' => $clients_list,
            'delete_list' => $delete_list,
            'employed_list' => $employed_list
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
            //user
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            //clients
            'age' => 'required|numeric|digits_between:1,2',
            'weight' =>  'required|numeric|digits_between:1,3',
            'injures' => 'required',
            'nivel' => 'required',
            'image' => 'nullable|image',
            //payments
            // 'total' => 'required|numeric',
            'start_date' => 'required',
        ]);

        $url_image = $this->validate_image($request);

        $new_user = User::create([
            'name' => $request->name,
            'image' => $url_image,
            'email' => $request->email,
            'password' => $request->password,
            'roles_id' => $request->roles_id,
            'companies_id' => $request->companies_id,
        ]);
        $new_user->save();

        $new_clients = clients::create([
            'users_id' => $new_user->id, //id user
            'age' => $request->age,
            'weight' => $request->weight,
            'nivel' => $request->nivel,
            'injures' => $request->injures,

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

// crear empleado

    public function employed(Request $request)
    {
        $validated = $request->validate([
            //user employed
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'image' => 'nullable|image',

        ]);

        $url_image = $this->validate_image($request);

        $new_user = User::create([
            'name' => $request->name,
            'image' => $url_image,
            'email' => $request->email,
            'password' => $request->password,
            'roles_id' => 3,
            'companies_id' => $request->companies_id,
        ]);
        $new_user->save();


        return response(['message' => 'nuevo empleado creado'], 200);
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
    public function update(Request $request, $user_id)
    {

        $user = User::find($user_id);
        $client = clients::where('users_id', $user_id)->first();
        $payment = $client->payments[0]; //0: Primer pago

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
        //Guardar nueva imagen
        if ($request->updated) {

            $request->validate([
                'image' => 'nullable|image'
            ]);

            //Eliminar la imagen anterior
            if (File::exists(public_path($user->image)))
                File::delete(public_path($user->image));

            $user->image = $this->validate_image($request);
        }



        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'roles_id' => $request->roles_id,
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

        $payment->fill([
            'rates_id' => $request->rates_id,
            'total' => $request->total,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
        ]);
        $payment->save();

        //$clients->fill($request->all())->save();
        return response([
            'message' => 'Cliente actualizado exitósamente.',
        ]);
    }
    public function updated(Request $request, $user_id)
    {

        $user = User::find($user_id);

        $validated = $request->validate([
            //user
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            
            
          
        ]);
        //Guardar nueva imagen
        if ($request->updated) {

            $request->validate([
                'image' => 'nullable|image'
            ]);

            //Eliminar la imagen anterior
            if (File::exists(public_path($user->image)))
                File::delete(public_path($user->image));

            $user->image = $this->validate_image($request);
        }



        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'roles_id' => $request->roles_id,
            'companies_id' => $request->companies_id,
        ]);
        $user->save();

     //$clients->fill($request->all())->save();
        return response([
            'message' => 'Cliente actualizado exitósamente.',
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
        $user = User::find($id);
        $user->delete();

        return response([]);
    }

    public function restore($id)
    {
        $user = user::withTrashed()->find($id);
        $user->restore();
        return response([
            'message' => 'cliente restablecido exitosamente..'
        ]);
    }
    public function validate_image($request)
    {

        if ($request->hasfile('image')) {
            $name = uniqid() . time() . '.' . $request->file('image')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('image')->storeAs('public', $name);
            return '/storage' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return null;
        }
    }
}
