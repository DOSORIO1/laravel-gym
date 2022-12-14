<?php

namespace App\Http\Controllers;

use App\Models\sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sales_list = DB::select(

        'SELECT users.name, products.name AS product, COUNT(users.id) AS cantidad_ventas, sales.local_sale, sales.reference,
          sales.date,detail_invoices.unit_value * detail_invoices.amount AS total, 
          detail_invoices.unit_value,detail_invoices.amount
          FROM roles, users, companies,categories, products, sales, detail_invoices
          WHERE roles.id = users.roles_id
          AND users.id = sales.users_id
          AND users.companies_id = companies.id
          AND sales.id = detail_invoices.sales_id
          AND products.id = detail_invoices.products_id
          AND roles.id = 3
          AND companies.id = 2
          GROUP BY users.name;'
        );

        return response([
            'sales_list' => $sales_list,
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
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(sales $sales)
    {
        //
    }
}
