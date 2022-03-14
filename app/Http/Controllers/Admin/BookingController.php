<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Billing;
use App\Models\Booking;
use Carbon\CarbonPeriod;
use App\Models\FoodOrder;
use App\Models\RoomFloor;
use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Models\PaymentHistory;
use Illuminate\Support\Carbon;
use App\Models\LedgerStatement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function finalInvoice($id)
    {
        $booking = Booking::where('user_id', $id)->first();
        $foodorder = FoodOrder::where('user_id', $id)->first();
        $totalammount = $booking->after_discount + $foodorder->total;
        $paid_amount = $totalammount - $booking->paid_amount;
        $due_amount = $totalammount - $paid_amount;

        return view('backend.Admin.booking.invoice', compact('booking', 'totalammount', 'paid_amount', 'foodorder', 'due_amount'));
    }
    public function index(Request $request)
    {

        if ($request->checkin && $request->checkout) {

            if ($request->checkin > $request->checkout) {
                $notification = array(
                    'message' => 'Check out date should be larger than check in date!',
                    'alert-type' => 'error'
                );
                return back()->with($notification);
            }

            $checkin = Carbon::create(request()->checkin);
            $checkout = Carbon::create(request()->checkout);
            $gen_dates = CarbonPeriod::create($checkin, $checkout);
            $gen_dates = collect($gen_dates)->map(function ($date) {
                return $date->format('Y-m-d');
            })->toArray();

            $dates = array_pop($gen_dates);

            $data['roomfloors'] = RoomFloor::with('rooms.bookings')->get()->map(function ($floor) use ($dates) {
                // Check every rooms if that available for booking
                $floor->rooms->map(function ($room) use ($dates) {

                    // check this room if available
                    $count1 = $room->bookings
                        ->whereIn('checkin', $dates)
                        ->count();
                    $count2 = $room->bookings
                        ->whereIn('checkout', $dates)
                        ->count();

                    $room->not_available = (bool) ($count1 + $count2);

                    // Check booking type rent or not
                    $is_rent =  $room->bookings->where('booking_type', 'rent')->count();
                    $room->is_rent = $is_rent;

                    return $room;
                });
                return $floor;
            });
        } else {
            $data['roomfloors'] = RoomFloor::all();
        }

        $data['bookings'] = Booking::where('status', 'pending')->where('checkout', '>=', Carbon::today()->format('Y-m-d'))->latest()->get();

        return view('backend.Admin.booking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->ajax()) {
            $q = Cart::where('cartId', Cookie::get('cartId'));
            $total_price = $q->sum('price');
            $payable_amount = $q->sum('payable_amount');
            $discount_price = $q->sum('discount_price');
            return response([
                'total_price' => $total_price,
                'discount_price' => $discount_price,
                'payable_amount' => $payable_amount,
            ]);
        }
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
            'checkin' => 'required',
            'checkout' => 'required',
            'total_price' => 'required',
            'after_discount' => 'required',
            'original_amount' => 'required',
            'booking_type' => 'required',
            'paid_amount' => 'required',
            'still_dues' => 'required',
            'payment_method' => 'required',
            'name' => 'required',
            'email' => 'nullable',
            'mobile' => 'required',
            'alternative_mobile' => 'nullable',
            'nid' => 'nullable',
            'addreas' => 'nullable',
            'notes' => 'nullable',
        ]);

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'vat' => $request->vat,
            'payment_method' => $request->payment_method,
            'total_price' => $request->total_price,
            'after_discount' => $request->after_discount,
            'original_amount' => $request->original_amount,
            'booking_type' => $request->booking_type,
            'paid_amount' => $request->paid_amount,
            'still_dues' => $request->still_dues,
        ]);

        PaymentHistory::create([
            'user_id' => auth()->id(),
            'booking_id' => $booking->id,
            'amount' => $request->paid_amount,
        ]);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $available_amount = $ledgerstatement->amount ?? 0;

        LedgerStatement::create([
            'remarks' => "Booking",
            'booking_id' => $booking->id,
            'credit' => $request->paid_amount,
            'debit' => 0,
            'mobile' => $request->mobile,
            'payment_mode' => $request->payment_method,
            'amount' => $available_amount + $request->paid_amount,
        ]);

        $carts = Cart::where('cartId', Cookie::get('cartId'))->get();
        foreach ($carts as $cart) {
            BookingDetail::create([
                'booking_id' => $booking->id,
                'room_id' => $cart->room_id,
                'person' => $cart->person,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
                'booking_type' => $request->booking_type,
            ]);

            $cart->delete();
        }

        Billing::create([
            'user_id' => auth()->id(),
            'booking_id' => $booking->id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'alternative_mobile' => $request->alternative_mobile,
            'nid' => $request->nid,
            'addreas' => $request->addreas,
            'notes' => $request->notes,
        ]);

        $notification = array(
            'message' => 'Booking successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.booking.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('backend.Admin.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $booking = Booking::find($id)->only('total_price', 'after_discount', 'original_amount', 'paid_amount', 'still_dues');
            return response($booking);
        }
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
        $request->validate([
            'total_price' => 'required',
            'after_discount' => 'required',
            'original_amount' => 'required',
            'booking_type' => 'required',
            'paid_amount' => 'required',
            'still_dues' => 'required',
            'payment_method' => 'required',
        ]);

        $booking = Booking::find($id);

        $booking->vat = $booking->vat + $request->vat;
        $booking->payment_method = $request->payment_method;
        $booking->total_price = $booking->total_price + $request->total_price;
        $booking->after_discount = $booking->after_discount + $request->after_discount;
        $booking->original_amount = $booking->original_amount + $request->original_amount;
        $booking->booking_type = $request->booking_type;
        $booking->paid_amount = $booking->paid_amount + $request->paid_amount;
        $booking->still_dues = $booking->still_dues + $request->still_dues;

        $booking->save();

        PaymentHistory::create([
            'user_id' => auth()->id(),
            'booking_id' => $id,
            'amount' => $request->amount,
        ]);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $available_amount = $ledgerstatement->amount ?? 0;

        LedgerStatement::create([
            'remarks' => "Booking",
            'credit' => $request->paid_amount,
            'debit' => 0,
            'payment_mode' => $request->payment_method,
            'amount' => $available_amount + $request->paid_amount,
        ]);

        $carts = Cart::where('cartId', Cookie::get('cartId'))->get();
        foreach ($carts as $cart) {
            BookingDetail::create([
                'booking_id' => $id,
                'room_id' => $cart->room_id,
                'person' => $cart->person,
                'checkin' => $booking->checkin,
                'checkout' => $booking->checkout,
                'booking_type' => $request->booking_type,
            ]);

            $cart->delete();
        }

        $notification = array(
            'message' => 'Booking successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.booking.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();
        $bookingdetails = BookingDetail::where('booking_id', $id)->get();
        foreach ($bookingdetails as $bookingdetail) {
            $bookingdetail->delete();
        }
        $notification = array(
            'message' => 'Booking has been deleted.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Change type the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changetype($id)
    {
        $booking = Booking::find($id);
        $booking->booking_type = "rent";
        $booking->save();

        $notification = array(
            'message' => 'Rent successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function bookingcancle($id)
    {
        $booking = Booking::find($id);
        // $booking->status = "cancle";
        $booking->booking_type = "cancle";
        $booking->save();

        $notification = array(
            'message' => 'Booking has been cancled.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function addpayment(Request $request)
    {

        $booking = Booking::find($request->booking_id);
        $booking->paid_amount = $booking->paid_amount + $request->new_payment;
        $booking->still_dues = $booking->still_dues - $request->new_payment;
        $booking->save();

        PaymentHistory::create([
            'user_id' => auth()->id(),
            'booking_id' => $booking->id,
            'amount' => $request->new_payment,
        ]);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $available_amount = $ledgerstatement->amount ?? 0;

        LedgerStatement::create([
            'remarks' => "Booking",
            'booking_id' => $booking->id,
            'credit' => $request->new_payment,
            'debit' => 0,
            'payment_mode' => "Cash",
            'amount' => $available_amount + $request->new_payment,
        ]);

        return response('Payment has been added.');
    }
}
