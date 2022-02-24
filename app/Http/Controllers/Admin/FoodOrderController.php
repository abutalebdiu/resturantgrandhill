<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\FoodOrder;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Models\FoodOrderItem;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class FoodOrderController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.foodorder.index', [
            'orders' => FoodOrder::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Admin.foodorder.create', [
            'foods' => Food::all(),
            'categories' => FoodCategory::all(),
        ]);
    }
    public function addCart(Request $request)
    {
        $food = Food::find($request->foodid);
        Cart::add($request->foodid, $food->name, intval($request->qty), $food->price, 0);
    }
    public function delCart($id)
    {
        Cart::remove($id);
        return back();
    }
    public function incrementCart($id)
    {
        $cart = Cart::get($id);
        Cart::update($id, $cart->qty + 1);
        return back();
    }
    public function decrementCart($id)
    {
        $cart = Cart::get($id);
        Cart::update($id, $cart->qty - 1);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = FoodOrder::create([
            'customer_name' => $request->get('customer_name'),
            'mobile' => $request->get('mobile'),
            'address' => $request->get('address'),
            'table_no' => $request->get('table_no'),
            'sub_total' => Cart::subTotal(),
            'service_charge' => $request->get('service_charge'),
            'vat' => Cart::tax(),
            'total' => $request->get('service_charge') + Cart::Total(),
        ]);
        foreach (Cart::content() as $item) {
            FoodOrderItem::create([
                'order_id' => $order->id,
                'food_id' => intval($item->id),
                'price' => $item->price,
                'quantity' => $item->qty,
                'total_price' => $item->total(),
            ]);
        }
        Cart::destroy();
        return redirect()->route('admin.foodorder.index');
        $notification = array(
            'message' => 'Food Order Added Successfully!',
            'alert-type' => 'success'
        );
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
        return view('backend.Admin.foodorder.edit', [
            'foods' => Food::all(),
            'categories' => FoodCategory::all(),
            'order' => FoodOrder::find($id),
        ]);
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
        FoodOrder::find($id)->delete();
        return redirect()->route('admin.foodorder.index');
        $notification = array(
            'message' => 'Food Order Added Successfully!',
            'alert-type' => 'success'
        );
    }
}
