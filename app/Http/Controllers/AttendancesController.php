<?php

namespace App\Http\Controllers;

use App\Models\attendances;
use App\Models\clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        // $attendance_list = attendances::all();
        // return  $attendance_list;



        $attendances_list = DB::select(
            'SELECT users.name, users.image, users.id, clients.dni, attendances.time, attendances.date, COUNT(attendances.clients_id) AS asiste
             FROM roles, users, clients, attendances, companies
             WHERE attendances.date BETWEEN "' . $request->start_date . '" AND "' . $request->finish_date . '"
             AND roles.id = users.roles_id
             AND users.id = clients.users_id
             AND companies.id = users.companies_id
             AND clients.id = attendances.clients_id 
             AND users.companies_id = ' . $request->companies_id . '
             AND roles.id = 4
             GROUP BY users.id
             ORDER BY users.name ASC 
             '
        );



        return response([
            'attendances_list' => $attendances_list,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $request->validate([
            'dni' => 'required',
        ]);

        $client = clients::where('dni', $request->dni)->first();


        $new_asistencia = attendances::create([
            'clients_id' => $client->id,
            'time' => $request->time,
            'date' => $request->date,
        ]);
        $new_asistencia->save();

        return response(['message' => 'nuevo asistencia creada'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        $client = clients::where('dni', $dni)->first();
        $user = User::find($client->users_id);

        $client->name = $user->name;
        $client->image = $user->image;

        return response(['client' => $client], 200);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendances $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendances $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendances $attendance)
    {
        //
    }
}
