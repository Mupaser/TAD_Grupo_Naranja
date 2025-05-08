<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::paginate(8);
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->country = $request->country;
        $address->city = $request->city;
        $address->zipCode = $request->zipCode;
        $address->street = $request->street;
        $address->user_id = $request->user_id;
        
        $address->save();
        return redirect()->route('addresses.show', $address);     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->country = $request->country;
        $address->city = $request->city;
        $address->zipCode = $request->zipCode;
        $address->street = $request->street;
        $address->user_id = $request->user_id;
        
        $addresses->save();
        return redirect()->route('addresses.show', $address); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('addresses.index');
    }
}
