<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('users/crear', 'create')->name('users.create');
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