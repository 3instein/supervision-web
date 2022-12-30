<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionAPIController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return response()->json([
            'message' => 'Transactions retrieved',
            'transactions' => Transaction::with('order:id,table_id,customer_id')
                ->with('order.customer:id,name')
                ->with('order.table:id,number')
                ->with('order.menus')
                ->whereNotNull('confirmed_by')
                ->get()
                ->each(function ($transaction) {
                    $transaction->total = $transaction->order->menus->sum(function ($menu) {
                        return $menu->pivot->quantity * $menu->price;
                    });
                })
                ->each(function ($transaction) {
                    $transaction->name = $transaction->order->customer->name;
                })
                ->map(function ($transaction) {
                    return [
                        'transaction_id' => $transaction->id,
                        'table_number' => $transaction->order->table->number,
                        'customer_name' => $transaction->name,
                        'total' => $transaction->total,
                        'status' => $transaction->status,
                    ];
                }),
            'status_code' => 200
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction) {
        $transaction_response = [
            'transaction_id' => $transaction->id,
            'order_date' => $transaction->created_at,
            'table_number' => $transaction->order->table->number,
            'customer_name' => $transaction->order->customer->name,
            'menus' => $transaction->order->menus->map(function ($menu) {
                return [
                    'name' => $menu->name,
                    'price' => $menu->price * $menu->pivot->quantity,
                    'quantity' => $menu->pivot->quantity,
                ];
            }),
            'subtotal' => $transaction->order->menus->sum(function ($menu) {
                return $menu->pivot->quantity * $menu->price;
            }),
            'discount' => $transaction->order->transaction->voucher->discount ?? 0,
            'tax' => $transaction->order->menus->sum(function ($menu) {
                return $menu->pivot->quantity * $menu->price * 0.11;
            }),
            'total' => $transaction->order->menus->sum(function ($menu) {
                return $menu->pivot->quantity * $menu->price + $menu->pivot->quantity * $menu->price * 0.11;
            }) - ($transaction->order->transaction->voucher->discount ?? 0),
            'payment_method' => $transaction->order->transaction->payment_method,
        ];

        return response()->json([
            'message' => 'Order found',
            'transaction' => $transaction_response,
            'status_code' => 200,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction) {
        //
    }
}
