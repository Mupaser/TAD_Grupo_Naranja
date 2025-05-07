<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Piece;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pieces = Piece::paginate(10);
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        return view('pieces.index', compact('pieces', 'cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pieces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $piece = new Piece();
        $piece->name = $request->name;
        $piece->price = $request->price;
        $piece->state = $request->state;
        $piece->offer = $request->offer;
        $piece->description = $request->description;
        $piece->image = $request->image;
        $piece->save();
        return redirect()->route('pieces.show', $piece);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        return view('pieces.show', compact('piece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Piece $piece)
    {
        return view('pieces.edit', compact('piece'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piece $piece)
    {
        $piece->name = $request->name;
        $piece->price = $request->price;
        $piece->state = $request->state;
        $piece->offer = $request->offer;
        $piece->description = $request->description;
        $piece->image = $request->image;
        $piece->save();
        return redirect()->route('pieces.show', $piece);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piece $piece)
    {
        $piece->delete();
        return redirect()->route('pieces.index');
    }
}
