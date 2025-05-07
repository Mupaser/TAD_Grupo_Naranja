<?php

namespace App\Http\Controllers;

use App\Models\CartLine;
use App\Http\Controllers\Piece;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartLines = CartLine::paginate(10);
        return view('cartLines.index', compact('cartLines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return new CartLine();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartLine = CartLine::where('cart_id', $request->cart_id)->where('piece_id', $request->piece_id)->first();

        if ($cartLine) {
            $cartLine->number += $request->number;
            $cartLine->totalPrice += $cartLine->piece->price * $request->number;
        } else {
            $cartLine = new CartLine();
            $cartLine->piece_id = $request->piece_id;
            $cartLine->number = $request->number;
            $cartLine->cart_id = $request->cart_id;
            $cartLine->totalPrice = $cartLine->piece->price * $cartLine->number;
        }
        
        $cartLine->save();
        
        return redirect()->route('cartLines.show', $cartLine->cart_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cart_id)
    {
        $cartLines = CartLine::where('cart_id', $cart_id)->get();
        return view('cartLines.show', compact('cartLines'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CartLine $cartLine)
    {
        return view('cartLines.edit', compact('cartLine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartLine $cartLine)
    {
        $cartLine->number = $request->number;
        $cartLine->totalPrice = $cartLine->piece->price * $cartLine->number;
        $cartLine->save();
        return redirect()->route('cartLines.show', $cartLine->cart_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartLine $cartLine)
    {
        $cartLine->delete();
        return redirect()->route('cartLines.show', $cartLine->cart_id);
    }

    public static function countPiecesInCart($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->first();
        $cartLine = CartLine::where('cart_id', $cart->id)->get();
        if ($cartLine) {
            return $cartLine->count();
        }
        return 0;
    }

    public static function getCartIdByUser($user_id)
    {
        $cart = Cart::where('user_id', $user_id)->first();
        if (!$cart) {
            return redirect()->back();
        }
        
        return $cart->id;
    }
}
