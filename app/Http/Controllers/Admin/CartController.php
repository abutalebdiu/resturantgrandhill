<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cart::where('cartId', Cookie::get('cartId'))->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|numeric',
            'price' => 'required|numeric',
            'person' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'payable_amount' => 'required|numeric',
        ]);

        if (Cookie::get('cartId')) {
    		$cartId = Cookie::get('cartId');
    	} else {
    		$cartId = Str::random(5).rand(1,1000);
    		Cookie::queue('cartId', $cartId, 8760);
    	}

        $check = Cart::where('cartId', $cartId)->where('room_id', $request->room_id);
    	if ($check->exists()) {
            return "Already added.";
    	} else {
            Cart::create([
                'cartId' => $cartId,
				'room_id' => $request->room_id,
				'price' => $request->price,
				'person' => $request->person,
				'discount_price' => $request->discount_price,
				'payable_amount' => $request->payable_amount,
	    	]);

            return response("Add to cart successfully.");
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return response(200);
    }
}
