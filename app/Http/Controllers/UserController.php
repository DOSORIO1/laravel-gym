<?php

namespace App\Http\Controllers;

use App\Models\user;
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
        // $users_list = user::all();
        // return  $users_list;
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
    public function update(Request $request, user $user)
    {
        //
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
}
