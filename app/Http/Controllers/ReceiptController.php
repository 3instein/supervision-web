<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index(){
        $order = (Order::withTrashed()->where('customer_id', auth()->guard('customer')->user()->id)->get()->last());

        return view('receipt', [
            'transaction' => $order->transaction,
        ]);
    }
}
