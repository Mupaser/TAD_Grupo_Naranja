<?php

namespace App\Http\Controllers;

use App\Models\CartLine;
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
        return view('cartLines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartLine = new CartLine();
        $cartLine->piece_id = $request->piece_id;
        $cartLine->number = $request->number;
        $cartLine->cart_id = $request->cart_id;
        $cartLine->totalPrice = $cartLine->piece->price * $cartLine->number;
        $cartLine->save();
        return redirect()->route('cartLines.show',$cartLine);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CartLine $cartLine)
    {
        return view('cartLines.show', compact('cartLine'));
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
        $cartLine->piece_id = $request->piece_id;
        $cartLine->number = $request->number;
        $cartLine->cart_id = $request->cart_id;
        $cartLine->totalPrice = $cartLine->piece->price * $cartLine->number;
        $cartLine->save();
        return redirect()->route('cartLines.show',$cartLine);
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
        return redirect()->route('cartLines.index');
    }
}
