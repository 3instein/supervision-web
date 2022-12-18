<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userOrder = Order::where('customer_id', 1)->with('menus')->first();

        return view('layouts.cart' , [
            'userOrder' => $userOrder,
        ]);
    }
}
