<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth','verified']);

Route::controller(AddressController::class)->group(function () {
    Route::get('addresses', 'index')->name('address.index');
    Route::get('addresses/create', 'create')->name('address.create');
    Route::post('addresses/store', 'store')->name('address.store');
    Route::get('addresses/{address}', 'show')->name('address.show');
    Route::get('addresses/{address}/edit', 'edit')->name('address.edit');
    Route::put('addresses/{address}', 'update')->name('address.update');
    Route::delete('addresses/{address}', 'destroy')->name('address.destroy');
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('payments', 'index')->name('payment.index');
    Route::get('payments/create', 'create')->name('payment.create');
    Route::post('payments/store', 'store')->name('payment.store');
    Route::get('payments/{payment}', 'show')->name('payment.show');
    Route::get('payments/{payment}/edit', 'edit')->name('payment.edit');
    Route::put('payments/{payment}', 'update')->name('payment.update');
    Route::delete('payments/{payment}', 'destroy')->name('payment.destroy');
});