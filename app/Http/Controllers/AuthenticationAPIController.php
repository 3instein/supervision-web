<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationAPIController extends Controller
{
    public function authenticate(Request $request){
        
        $credentials = $request->only('username', 'password');

        $validator = Validator::make($credentials, [
            'username' => ['required', 'exists:users,username', 'max:255'],
            'password' => ['required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status_code' => 422,
            ]);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Incorrect Credentials',
                'status_code' => 401,
            ]);
        }

        $user = Auth::user();

        return response()->json([
            'message' => 'Authenticated',
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken,
            'status_code' => 200,
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out',
            'status_code' => 200,
        ]);
    }
}
