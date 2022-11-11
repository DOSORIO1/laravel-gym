<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $companies_list = DB::select(
            '
            SELECT companies.name, companies.name,companies.logo,companies.phone_number AS numero ,companies.address
            FROM companies;
            
            '
           
        );

        return response([
            'companies_list' => $companies_list,
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
        $validated = $request->validate([
            
            'name' => 'required',
            'logo' => 'required',
            'address' => 'required',       
            'phone_number' => 'required',
        ]);
       

        $new_companie = companies::create([
            'name' => $request->name,
            'logo' => $request->logo,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            
        ]);
        $new_companie->save();
        return response(['message' => 'Successfully created company'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(companies $companies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companies $companies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(companies $companies)
    {
        //
    }
    public function rates($companies_id)
    {
        $companies = companies::find($companies_id);
        $rates_list = $companies->rates;
        return response([
            'rates_list' => $rates_list
        ]);
    }

    
}
