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
            'SELECT products.name,products.image, products.code,products.amount,products.price, categories.description
            FROM products,categories,companies
            WHERE products.categories_id = categories.id
            AND categories.companies_id = companies.id
            AND companies.id = ' . $request->companies_id . '
            GROUP BY products.name          
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
    public function update(Request $request, $id)
    {

        $product = categories::find($id);
        $description = products::where('categories_id', $id)->first();

        $validated = $request->validate([
            //user
            'name' => 'required',
            'price' => 'required',
            'description'=>'required',

            
            
          
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



        $product->fill([
            'name' => $request->name,
            'amount' => $request->amount,
            'price' => $request->price,
        ]);
        $product->save();

        $description->fill([
            'description' => $request->description,
           
        ]);
        $description->save();

     //$clients->fill($request->all())->save();
        return response([
            'message' => 'product actualizado exitósamente.',
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
