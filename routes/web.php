<?php

use App\Http\Controllers\OrderLineController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/home', function () {
    return view('auth.dashboard');
    })->middleware(['auth','verified']);

Route::controller(UserController::class)->group(function () {
    Route::get('users','index')->name('users.index');
    Route::get('users/create', 'create')->name('users.create');
    Route::post('users', 'store')->name('users.store');
    Route::delete('users/{user}','destroy')->name('users.destroy');
    Route::get('users/{user}', 'show')->name('users.show');
    Route::get('users/{user}/editar', 'edit')->name('users.edit');
    Route::put('users/{user}', 'update')->name('users.update');
});

Route::controller(RolController::class)->group(function () {
    Route::get('rols','index')->name('rols.index');
    Route::get('rols/crear', 'create')->name('rols.create');
    Route::post('rols', 'store')->name('rols.store');
    Route::delete('rols/{rol}','destroy')->name('rols.destroy');
    Route::get('rols/{rol}', 'show')->name('rols.show');
    Route::get('rols/{rol}/editar', 'edit')->name('rols.edit');
    Route::put('rols/{rol}', 'update')->name('rols.update');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('orders','index')->name('orders.index');
    Route::get('orders/crear', 'create')->name('orders.create');
    Route::post('orders', 'store')->name('orders.store');
    Route::delete('orders/{user}','destroy')->name('orders.destroy');
    Route::get('orders/{order}', 'show')->name('orders.show');
    Route::get('orders/{order}/editar', 'edit')->name('orders.edit');
    Route::put('orders/{order}', 'update')->name('orders.update');
});

Route::controller(AddressController::class)->group(function () {
    Route::get('addresses', 'index')->name('addresses.index');
    Route::get('addresses/create', 'create')->name('addresses.create');
    Route::post('addresses/store', 'store')->name('addresses.store');
    Route::get('addresses/{address}', 'show')->name('addresses.show');
    Route::get('addresses/{address}/edit', 'edit')->name('addresses.edit');
    Route::put('addresses/{address}', 'update')->name('addresses.update');
    Route::delete('addresses/{address}', 'destroy')->name('addresses.destroy');
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('payments', 'index')->name('payments.index');
    Route::get('payments/create', 'create')->name('payments.create');
    Route::post('payments/store', 'store')->name('payments.store');
    Route::get('payments/{payment}', 'show')->name('payments.show');
    Route::get('payments/{payment}/edit', 'edit')->name('payments.edit');
    Route::put('payments/{payment}', 'update')->name('payments.update');
    Route::delete('payments/{payment}', 'destroy')->name('payments.destroy');
});

Route::controller(PieceController::class)->group(function () {
    Route::get('pieces','index')->name('pieces.index');
    Route::get('pieces/crear', 'create')->name('pieces.create');
    Route::post('pieces', 'store')->name('pieces.store');
    Route::delete('pieces/{piece}','destroy')->name('pieces.destroy');
    Route::get('pieces/{piece}', 'show')->name('pieces.show');
    Route::get('pieces/{piece}/editar', 'edit')->name('pieces.edit');
    Route::put('pieces/{piece}', 'update')->name('pieces.update');
});

Route::controller(OrderLineController::class)->group(function () {
    Route::get('orderLines','index')->name('orderLines.index');
    Route::get('orderLines/crear', 'create')->name('orderLines.create');
    Route::post('orderLines', 'store')->name('orderLines.store');
    Route::delete('orderLines/{orderLine}','destroy')->name('orderLines.destroy');
    Route::get('orderLines/{orderLine}', 'show')->name('orderLines.show');
    Route::get('orderLines/{orderLine}/editar', 'edit')->name('orderLines.edit');
    Route::put('orderLines/{orderLine}', 'update')->name('orderLines.update');
});
