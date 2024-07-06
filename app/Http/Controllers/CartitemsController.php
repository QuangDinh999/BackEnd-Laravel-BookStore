<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartitems;
use App\Http\Requests\StorecartitemsRequest;
use App\Http\Requests\UpdatecartitemsRequest;

class CartitemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = 3;
        $cart_id = cart::where('customer_id', $user_id)->value('id');
        $cartitems = cartitems::with('cart', 'book')->where('cart_id', $cart_id)->get();
        return response()->json($cartitems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecartitemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecartitemsRequest $request)
    {
        $user_id = $request->userID;
        $cart_id = cart::where('customer_id', $user_id)->value('id');
        cartitems::create([
            'amount' => $request->amount,
            'book_id' => $request->bookID,
            'cart_id' => $cart_id,
        ]);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cartitems  $cartitems
     * @return \Illuminate\Http\Response
     */
    public function show(cartitems $cartitems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cartitems  $cartitems
     * @return \Illuminate\Http\Response
     */
    public function edit(cartitems $cartitems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecartitemsRequest  $request
     * @param  \App\Models\cartitems  $cartitems
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecartitemsRequest $request, cartitems $cartitems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cartitems  $cartitems
     * @return \Illuminate\Http\Response
     */
    public function destroy(cartitems $cartitems)
    {
        //
    }
}
