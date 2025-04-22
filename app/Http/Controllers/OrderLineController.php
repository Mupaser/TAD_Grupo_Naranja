<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderLines = OrderLine::paginate(10);
        return view('', compact('orderLines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderLine = new OrderLine();
        $orderLine->pieceName = $request->pieceName;
        $orderLine->number = $request->number;
        $orderLine->totalPrice = $request->totalPrice;
        $orderLine->order_id = $request->order_id;
        $orderLine->piece_id = $request->piece_id;
        $orderLine->save();
        return view('', compact('orderLine'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLine $orderLine)
    {
        return view('', compact('orderLine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLine $orderLine)
    {
        return view('', compact('orderLine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLine $orderLine)
    {
        $orderLine->pieceName = $request->pieceName;
        $orderLine->number = $request->number;
        $orderLine->totalPrice = $request->totalPrice;
        $orderLine->order_id = $request->order_id;
        $orderLine->piece_id = $request->piece_id;
        $orderLine->save();
        return view('', compact('orderLine'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLine $orderLine)
    {
        $orderLine->delete();
        return view();
    }
}
