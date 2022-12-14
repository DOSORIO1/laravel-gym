<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products_list = DB::select(
            'SELECT products.*,categories.name
            FROM companies, categories,products
            WHERE companies.id = categories.companies_id
            AND categories.id = products.categories_id
            AND companies.id = 2
            ORDER BY products.id DESC          
            '
           
        );

        return response([
            'productos' => $products_list,
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
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $product = products::find($id);



        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
        ]);

        //Guardar nueva imagen
        if ($request->updated) {

            $request->validate([
                'image' => 'nullable|image'
            ]);

            //Eliminar la imagen anterior
            if (File::exists(public_path($product->image)))
                File::delete(public_path($product->image));

            $product->image = $this->validate_image($request);
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response([
            'message' => 'producto actualizado exitósamente.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
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
