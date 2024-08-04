<?php

namespace App\Http\Controllers;

use App\Models\cartitems;
use App\Models\orderdetails;
use App\Models\orders;
use App\Http\Requests\StoreordersRequest;
use App\Http\Requests\UpdateordersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = orders::all();
        return response()->json($orders);
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
     * @param  \App\Http\Requests\StoreordersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = orders::create([
            'customer_name' => $request->name,
            'customer_phone' => $request->phoneNumber,
            'customer_address' => $request->address,
            'status' => 0,
            'payment_id' => $request->payment_id,
            'order_note' => $request->order_note,
            'customer_id' => $request->customer_id,
            'total_price' => $request->totalPrice
        ]);

        // Tạo orderdetails
        foreach ($request->cartitems as $cartitem) {
            orderdetails::create([
                'amount' => $cartitem['amount'],
                'unitprice' => $cartitem['book']['price'] * $cartitem['amount'],
                'book_id' => $cartitem['book_id'],
                'order_id' => $order->id
            ]);
        }

        cartitems::truncate();
        return response()->json(['success' => $request->cartitems]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateordersRequest  $request
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateordersRequest $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(orders $orders)
    {
        //
    }
}
