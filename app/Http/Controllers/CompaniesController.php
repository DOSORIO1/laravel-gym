<?php

namespace App\Http\Controllers;

use App\Models\companies;
use App\Models\rates;
use Facade\FlareClient\Stacktrace\File;
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
            'logo' =>  'nullable|image',
            'address' => 'required',       
            // 'phone_number' => 'required',
        ]);

   //Save image in server and get its url
        $url_image = $this->validate_image($request);
       

        $new_companie = companies::create([
            'name' => $request->name,
            'logo' =>$url_image,
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
    public function update(Request $request, $id)
    {
        $companie = companies::find($id);

        $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required',
            'address' => 'required'

        ]);

         //Guardar nueva imagen
        if ($request->updated) {

            $request->validate([
                'image' => 'nullable|image'
            ]);

            //Eliminar la imagen anterior
            if (File::exists(public_path( $companie->image)))
                File::delete(public_path( $companie->image));

                $companie->image = $this->validate_image($request);
        }

        $companie->name = $request->name;
        $companie->phone_number = $request->phone_number;
        $companie->address = $request->address;

        $companie->save();

        return response([
            'message' => 'Cliente actualizado exitósamente.',
        ]);



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

    public function validate_image($request) {

        if ($request->hasfile('logo')) {
            $name = uniqid() . time() . '.' . $request->file('logo')->getClientOriginalExtension(); //46464611435281365.jpg
            $request->file('logo')->storeAs('public', $name);
            return '/storage' . '/' . $name; //uploads/46464611435281365.jpg

        } else {

            return null;
        }
    }

    
}
