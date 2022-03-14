<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\User;
use App\Models\FoodOrder;
use Illuminate\Support\Str;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Models\FoodOrderItem;
use App\Models\LedgerStatement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Gloudemans\Shoppingcart\Facades\Cart;

class FoodOrderController extends Controller
{
    public function payfoodbill($id)
    {
        return view('backend.admin.foodorder.payfoodbill', [
            'order' => FoodOrder::find($id),
        ]);
    }
    public function foodbillstore(Request $request, $id)
    {
        $order = FoodOrder::find($id);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $amount = $ledgerstatement->amount + $order->total;
        $credit = $order->total;
        $remarks = "food";
        $mobile = $request->get('mobile');
        $payment_mode = $request->get('payment_method');
        LedgerStatement::create([
            'amount' => $amount,
            'credit' => $credit,
            'remarks' => $remarks,
            'mobile' => $mobile,
            'payment_mode' => $payment_mode,
        ]);
        $order->update([
            'payment_status' => 'paid',
        ]);
        $notification = array(
            'message' => 'Payment Done!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.foodorder.index')->with($notification);
    }
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
    public function addUser(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'username' => Str::lower($request['name']),
            'email' => $request['email'],
            'password' => Hash::make(12345678),
            'role_id' => 5,
        ]);
        return back();
    }
    public function create()
    {
        return view('backend.Admin.foodorder.create', [
            'foods' => Food::all(),
            'categories' => FoodCategory::all(),
            'users' => User::where('role_id', 5)->get(),
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
    public function invoive($id)
    {
        return view('backend.Admin.foodorder.invoice', [
            'foods' => Food::all(),
            'categories' => FoodCategory::all(),
            'order' => FoodOrder::find($id),
        ]);
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
            'user_id' => $request->get('user_id'),
            // 'customer_name' => $request->get('customer_name'),
            // 'mobile' => $request->get('mobile'),
            // 'address' => $request->get('address'),
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
        return redirect()->route('admin.payfoodbill', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.Admin.foodorder.show', [
            'foods' => Food::all(),
            'categories' => FoodCategory::all(),
            'order' => FoodOrder::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $notification = array(
            'message' => 'Food Order Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.foodorder.index')->with($notification);
    }
}
