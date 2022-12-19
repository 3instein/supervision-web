<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'Orders retrieved',
            'orders' => Order::
                        join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->join('order_menus', 'orders.id', '=', 'order_menus.order_id')
                        ->join('menus', 'order_menus.menu_id', '=', 'menus.id')
                        ->join('tables', 'orders.table_id', '=', 'tables.id')
                        ->select(
                            'orders.id as order_id',
                            'customers.email as customer_email',
                            'tables.number as table_number',
                        )
                        ->selectRaw('(SELECT SUM(menus.price * order_menus.quantity) FROM order_menus WHERE order_menus.order_id = orders.id) as total_price')
                        ->get(),
            'status_code' => 200,
        ]);
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order)
    {
        return response()->json([
            'message' => 'Order found',
            'order' => $order,
            'status_code' => 200,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
