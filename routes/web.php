<?php

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/signin', function () {
    return view('signin');
});

Route::post('/signin', function (Request $request) {
if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => 
    $request->password])) {
        return redirect()->intended(route('cart'));
    }
});

//Route to Checkout Page (For testing)
Route::get('/receipt', function () {
    return view('receipt', [
        'transaction' => Transaction::find(1)->first()
    ]);
});

Route::resource('transactions', TransactionController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
