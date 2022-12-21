<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderAPIController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json([
            'message' => 'Orders retrieved',
            'orders' => $orders = Order::with('customer:id,name')
            ->with('menus')
            ->where('customer_id', 1)
            ->get()
            ->each(function ($order) {
                $order->total = $order->menus->sum(function ($menu) {
                    return $menu->pivot->quantity * $menu->price;
                });
            })
            ->each(function ($order) {
                $order->name = $order->customer->name;
            })
            ->map(function ($order) {
                return [
                    'order_id' => $order->id,
                    'table_number' => $order->table->number,
                    'customer_name' => $order->name,
                    'total' => $order->total,
                ];
            }),
            'status_code' => 200,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Order $order) {
        $order_response = [
            'order_id' => $order->id,
            'order_date' => $order->created_at,
            'table_number' => $order->table->number,
            'customer_name' => $order->customer->name,
            'menus' => $order->menus->map(function ($menu) {
                return [
                    'name' => $menu->name,
                    'price' => $menu->price * $menu->pivot->quantity,
                    'quantity' => $menu->pivot->quantity,
                ];
            }),
            'subtotal' => $order->menus->sum(function ($menu) {
                return $menu->pivot->quantity * $menu->price;
            }),
            'discount' => $order->transaction->voucher->discount ?? 0,
            'tax' => $order->menus->sum(function ($menu) {
                return $menu->pivot->quantity * $menu->price * 0.11;
            }),
            'total' => $order->menus->sum(function ($menu) {
                return $menu->pivot->quantity * $menu->price + $menu->pivot->quantity * $menu->price * 0.11 ;
            }) - $order->transaction->voucher->discount ?? 0,
            'payment_method' => $order->transaction->payment_method,
        ];
        return response()->json([
            'message' => 'Order found',
            'order' => $order_response,
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
    public function update(Request $request, Order $order) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order) {
        return response()->json([
            'message' => 'Order deleted',
            'status_code' => 200,
        ]);
    }

    public function confirm(Order $order){
        $order->transaction->update([
            'status' => 'Paid',
        ]);

        $order->delete();
        return response()->json([
            'message' => 'Order confirmed',
            'status_code' => 200,
        ]);
    }
    
    public function cancel(Order $order){
        $order->transaction->update([
            'status' => 'Cancelled',
        ]);
        return response()->json([
            'message' => 'Order cancelled',
            'status_code' => 200,
        ]);
    }
}
