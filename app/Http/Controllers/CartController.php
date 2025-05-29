<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Discount;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::paginate(10);
        return view('carts.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->user_id = $request->user_id;
        
        $cart->save();
        return redirect()->route('carts.show', $cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        if (!session('discount_success')) {
            session()->forget(['cart_discount_percentage', 'cart_discount_code']);
        }

        $totalAmount = 0;
        foreach($cart->cartLines as $cartLine)
            $totalAmount += $cartLine->totalPrice;

        $discount = session('cart_discount_percentage', 0);
        $discount_code = session('cart_discount_code', null);
        $discountAmount = $totalAmount * ($discount / 100);
        $finalAmount = $totalAmount - $discountAmount;

        return view('carts.show', compact('cart', 'totalAmount', 'discount', 'discountAmount', 'finalAmount', 'discount_code'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->user_id = $request->user_id;
        
        $cart->save();
        return redirect()->route('carts.show', $cart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index');
    }

    public function applyDiscount(Request $request, Cart $cart)
    {
        $discountCode = $request->input('discount_code');
        $discount = Discount::where('code', $discountCode)->where('valid', true)->first();

        if (!$discount) {
            session()->forget(['cart_discount_percentage', 'cart_discount_code']);
            return redirect()->route('carts.show', $cart)->withErrors(['discount_code' => 'Invalid or inactive discount code']);
        }

        session([
            'cart_discount_percentage' => $discount->percentage,
            'cart_discount_code' => $discount->code
        ]);

        return redirect()->route('carts.show', $cart)->with('discount_success', 'Discount applied: ' . $discount->percentage . '%');
    }
}
