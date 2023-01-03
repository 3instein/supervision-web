<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller {
    public function create() {
        return view('layouts.sign-in');
    }

    public function login(Request $request) {
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('scan.create');
        } else {
            return "failed";
        }
    }
}
