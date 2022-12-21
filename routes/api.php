<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderAPIController;
use App\Http\Controllers\TransactionAPIController;
use App\Http\Controllers\AuthenticationAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/authenticate', [AuthenticationAPIController::class, 'authenticate']);

Route::get('/orders/{order}/cancel', [OrderAPIController::class, 'cancel']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('orders', OrderAPIController::class);
    Route::get('/orders/{order}/confirm', [OrderAPIController::class, 'confirm']);
    Route::resource('transactions', TransactionAPIController::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthenticationAPIController::class, 'logout']);
});
