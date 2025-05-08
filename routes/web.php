<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderLineController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartLineController;
use App\Http\Controllers\FavoritesListController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;



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
Route::get('/', 'home');
});
/*Route::get('/home', function () {
    return view('home');
})->middleware(['auth','verified']);*/
Route::controller(PieceController::class)->group(function () {
    Route::get('/home','home')->middleware(['auth','verified']);
});
Route::controller(UserController::class)->group(function () {
    Route::get('users','index')->name('users.index');
    Route::get('users/create', 'create')->name('users.create');
    Route::post('users', 'store')->name('users.store');
    Route::delete('users/{user}','destroy')->name('users.destroy');
    Route::get('users/{user}', 'show')->name('users.show');
    Route::get('users/{user}/edit', 'edit')->name('users.edit');
    Route::put('users/{user}', 'update')->name('users.update');
});

Route::controller(RolController::class)->group(function () {
    Route::get('rols','index')->name('rols.index');
    Route::get('rols/create', 'create')->name('rols.create');
    Route::post('rols', 'store')->name('rols.store');
    Route::delete('rols/{rol}','destroy')->name('rols.destroy');
    Route::get('rols/{rol}', 'show')->name('rols.show');
    Route::get('rols/{rol}/edit', 'edit')->name('rols.edit');
    Route::put('rols/{rol}', 'update')->name('rols.update');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('orders/{user?}','index')->name('orders.index');
    Route::post('orders/create', 'create')->name('orders.create');
    Route::post('orders/{cart}', 'store')->name('orders.store');
    Route::delete('orders/{user}','destroy')->name('orders.destroy');
    Route::get('orders/order/{order}', 'show')->name('orders.show');
    Route::get('orders/{order}/edit', 'edit')->name('orders.edit');
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

Route::controller(DiscountController::class)->group(function () {
    Route::get('discounts', 'index')->name('discounts.index');
    Route::get('discounts/create', 'create')->name('discounts.create');
    Route::post('discounts/store', 'store')->name('discounts.store');
    Route::get('discounts/{discount}', 'show')->name('discounts.show');
    Route::get('discounts/{discount}/edit', 'edit')->name('discounts.edit');
    Route::put('discounts/{discount}', 'update')->name('discounts.update');
    Route::delete('discounts/{discount}', 'destroy')->name('discounts.destroy');
});

Route::controller(CartController::class)->group(function () {
    Route::get('carts', 'index')->name('carts.index');
    Route::get('carts/create', 'create')->name('carts.create');
    Route::post('carts/store', 'store')->name('carts.store');
    Route::get('carts/{cart}', 'show')->name('carts.show');
    Route::get('carts/{cart}/edit', 'edit')->name('carts.edit');
    Route::put('carts/{cart}', 'update')->name('carts.update');
    Route::delete('carts/{cart}', 'destroy')->name('carts.destroy');
});

Route::controller(PieceController::class)->group(function () {
    Route::get('/home','home');
    Route::get('pieces','index')->name('pieces.index');
    Route::get('pieces/create', 'create')->name('pieces.create');
    Route::post('pieces', 'store')->name('pieces.store');
    Route::delete('pieces/{piece}','destroy')->name('pieces.destroy');
    Route::get('pieces/{piece}/piece', 'show')->name('pieces.show');
    Route::get('pieces/{piece}/edit', 'edit')->name('pieces.edit');
    Route::put('pieces/{piece}', 'update')->name('pieces.update');
    Route::get('pieces/sortByFavorites', 'sortByFavorites')->name('pieces.sortByFavorites');
    Route::get('pieces/filter', 'filterByCategory')->name('pieces.filterByCategory');
});

Route::controller(OrderLineController::class)->group(function () {
    Route::get('orderLines','index')->name('orderLines.index');
    Route::get('orderLines/create', 'create')->name('orderLines.create');
    Route::post('orderLines', 'store')->name('orderLines.store');
    Route::delete('orderLines/{orderLine}','destroy')->name('orderLines.destroy');
    Route::get('orderLines/{orderLine}', 'show')->name('orderLines.show');
    Route::get('orderLines/{orderLine}/edit', 'edit')->name('orderLines.edit');
    Route::put('orderLines/{orderLine}', 'update')->name('orderLines.update');
});

Route::controller(CartLineController::class)->group(function () {
    Route::get('cartLines','index')->name('cartLines.index');
    Route::get('cartLines/create', 'create')->name('cartLines.create');
    Route::post('cartLines/{cart}', 'store')->name('cartLines.store');
    Route::delete('cartLines/{cartLine}/{cart}','destroy')->name('cartLines.destroy');
    Route::get('cartLines/{cartLine}', 'show')->name('cartLines.show');
    Route::get('cartLines/{cartLine}/edit', 'edit')->name('cartLines.edit');
    Route::put('cartLines/{cartLine}', 'update')->name('cartLines.update');
    Route::get('cartLines/{cart_id}/count', 'countPiecesInCart')->name('carts.countPieces');
    Route::get('cartLines/{cart_id}', 'getCartIdByUser')->name('cartLines.getCartIdByUser');
});

Route::controller(FavoritesListController::class)->group(function () {
    Route::get('favoritesLists','index')->name('favoritesLists.index');
    Route::get('favoritesLists/create', 'create')->name('favoritesLists.create');
    Route::post('favoritesLists', 'store')->name('favoritesLists.store');
    Route::delete('favoritesLists/{favoritesList}','destroy')->name('favoritesLists.destroy');
    Route::get('favoritesLists/{favoritesList}', 'show')->name('favoritesLists.show');
    Route::get('favoritesLists/{favoritesList}/edit', 'edit')->name('favoritesLists.edit');
    Route::put('favoritesLists/{favoritesList}', 'update')->name('favoritesLists.update');
    Route::post('favoritesLists/{favoritesList}/{piece}', 'addPieceToFavoritesList')->name('favoritesLists.addPieceToFavoritesList');
    Route::delete('favoritesLists/{favoritesList}/{piece}', 'removePieceFromFavoritesList')->name('favoritesLists.removePieceFromFavoritesList');
    Route::get('favoritesLists/{user_id}/count', 'countPiecesInFavoritesList')->name('favoritesLists.countPieces');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories','index')->name('categories.index');
    Route::get('categories/create', 'create')->name('categories.create');
    Route::post('categories', 'store')->name('categories.store');
    Route::delete('categories/{category}','destroy')->name('categories.destroy');
    Route::get('categories/{category}', 'show')->name('categories.show');
    Route::get('categories/{category}/edit', 'edit')->name('categories.edit');
    Route::put('categories/{category}', 'update')->name('categories.update');
});
