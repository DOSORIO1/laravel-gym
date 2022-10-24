<?php

namespace App\Http\Controllers;

use App\Models\rates;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response([
        'rates_list' => rates::all()
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
     * @param  \App\Models\rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function show(rates $rates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function edit(rates $rates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rates $rates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(rates $rates)
    {
        //
    }
}
