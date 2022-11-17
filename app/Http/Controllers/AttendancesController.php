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
        // $attendance_list = attendances::all();
        // return  $attendance_list;
    
        $attendances_list = DB::select(
            '
            SELECT users.name, users.image, users.id, attendances.time, attendances.date, COUNT(attendances.clients_id) AS asiste
            FROM roles, users, clients, attendances
            WHERE attendances.date BETWEEN "2020-10-01" AND "2022-10-08"
            AND roles.id = users.roles_id
            AND users.id = clients.users_id
            AND clients.id = attendances.clients_id 
            AND roles.id = 4
            group by users.id
            order by users.name ASC
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
