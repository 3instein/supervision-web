<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
            'orders' => Order::with('customer:id,name')
                ->with('menus')
                ->withTrashed()
                ->where('customer_id', 1)
                ->whereHas('transaction', function ($query) {
                    $query->where('status', 'Unpaid');
                })
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
    public function show(Order $order, Request $request) {
        // $order = Order::withTrashed()->find($id);
        $order_response = [
            'order_id' => $order->id,
            'order_date' => $order->created_at,
            'table_number' => $order->table->number,
            'customer_name' => $order->customer->name,
            'menus' => $order->menus->map(function ($menu) {
                return [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'image' => $menu->image,
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
                return $menu->pivot->quantity * $menu->price + $menu->pivot->quantity * $menu->price * 0.11;
            }) - ($order->transaction->voucher->discount ?? 0),
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
        if ($request->type == 'update') {
            $order->menus()->updateExistingPivot($request->menu_id, ['quantity' => $request->quantity]);
            $message = 'Menu berhasil diubah!';
        } else if ($request->type == 'add') {
            $order->menus()->attach($request->menu_id, ['quantity' => $request->quantity]);
            $message = 'Menu berhasil ditambahkan!';
        } else if ($request->type == 'remove') {
            $order->menus()->detach($request->menu_id);
            $message = 'Menu berhasil dihapus!';
        } else {
            $message = 'Menu tidak ditemukan!';
        }

        return response()->json([
            'message' => $message,
            'status_code' => 200,
        ]);
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

    public function confirm(Order $order) {
        $order->transaction->update([
            'confirmed_by' => Auth::id(),
            'status' => 'Paid',
        ]);

        $order->delete();
        return response()->json([
            'message' => 'Order confirmed',
            'status_code' => 200,
        ]);
    }

    public function cancel(Order $order) {
        $order->transaction->update([
            'status' => 'Cancelled',
        ]);

        $order->forceDelete();
        return response()->json([
            'message' => 'Order cancelled',
            'status_code' => 200,
        ]);
    }
}
