<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderAPIController;
use App\Http\Controllers\TransactionAPIController;
use App\Http\Controllers\AuthenticationAPIController;
use App\Http\Controllers\MenuAPIController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    
    Route::resource('orders', OrderAPIController::class)->withTrashed();
    Route::get('/orders/{order}/confirm', [OrderAPIController::class, 'confirm'])->withTrashed();
    Route::get('/orders/{order}/cancel', [OrderAPIController::class, 'cancel'])->withTrashed();

    Route::resource('menus-api', MenuAPIController::class);
    Route::resource('transactions', TransactionAPIController::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/logout', [AuthenticationAPIController::class, 'logout']);
});
