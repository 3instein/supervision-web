<?php

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/scan', function () {
    return view('scan');
});

Route::post('/scan', [TableController::class, 'scan'])->name('scan');

Route::resource('tables', TableController::class);

// Route to Order Page (For testing)
Route::get('/order', function () {
    return view('layouts.order');
});

Route::get('/offers', function () {
    return view('layouts.offers');
});

Route::resource('vouchers', VoucherController::class);

// Route to Order Page (For testing)
Route::get('/signin', function () {
    return view('layouts.sign-in');
});

Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt');

Route::post('/signin', [CustomerController::class, 'login'])->name('customer.login');

Route::resource('menus', MenuController::class)->except(['index', 'show']);
Route::get('/menus/{table}', [MenuController::class, 'index'])->name('menus.index');

// Route::resource('transactions', TransactionController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
