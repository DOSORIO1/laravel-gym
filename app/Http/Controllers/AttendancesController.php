<?php

namespace App\Http\Controllers;

use App\Models\attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance_list = attendances::all();
        return  $attendance_list;
    
        $attendances_list = DB::select(
            '
            SELECT clients.name, clients.id, attendances.time, COUNT(attendances.clients_id) AS asiste 
            FROM clients, attendances
            WHERE clients.id = attendances.clients_id
            
            GROUP BY clients.name
            
            '
            // SELECT roles.name, users.name
            // FROM roles, users
            // WHERE roles.id = users.roles_id
            // AND roles.code = "C"
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendances $attendance)
    {
        //
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
