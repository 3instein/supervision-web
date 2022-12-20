<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'Transactions retrieved',
            'transactions' => Transaction::with('order:id,table_id,customer_id')
                ->with('order.customer:id,name')
                ->with('order.table:id,number')
                ->with('order.menus')
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
