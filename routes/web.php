<?php

use App\Http\Controllers\OrderLineController;
use App\Http\Controllers\PieceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('auth.dashboard');
    })->middleware(['auth','verified']);
