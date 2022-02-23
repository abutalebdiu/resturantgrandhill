<?php

namespace App\Http\Controllers\Admin;

use App\Models\Billing;
use App\Models\Booking;
use App\Models\Expense;
use App\Models\FundWithdraw;
use Illuminate\Http\Request;
use App\Models\LedgerStatement;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'clientlist') {
                $data = Billing::latest()->where('mobile', 'LIKE', "%{$request->number}%")->orWhere('alternative_mobile', 'LIKE', "%{$request->number}%")->get();
                return response($data);
            } elseif ($request->type == 'booking') {

                $number = $request->number;
                $data = Booking::when('billinginfo', function ($query) use($number) {
                                return $query->whereHas('billinginfo', function ($q) use($number) {
                                    return $q->where('mobile', 'LIKE', "%{$number}%");
                                });
                            }
                        )
                        ->get();
                return response($data);
<<<<<<< HEAD
            } elseif ($request->type == 'expenses') {
                $data = Expense::latest()->where('reference', 'LIKE', "%{$request->search}%")->get();
                return response($data);
            } elseif ($request->type == 'ledgerstatement') {
                $data = LedgerStatement::latest()->where('remarks', 'LIKE', "%{$request->search}%")->get();
                return response($data);
            } elseif ($request->type == 'fundwithdrawal') {
                $data = FundWithdraw::latest()->where('remarks', 'LIKE', "%{$request->search}%")->get();
                return response($data);
=======
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
            }
        }

        if ($request->type == 'booking') {
            if ($request->from_date && $request->to_date) {
                $data['bookings'] = Booking::latest()->whereBetween('created_at', [$request->from_date, $request->to_date])->get();
            } else {
                $data['bookings'] = Booking::latest()->get();
            }
            return view('backend.Admin.reports.booking', $data);

        } elseif ($request->type == 'expenses') {
<<<<<<< HEAD
            if ($request->from_date && $request->to_date) {
                $data['expenses'] = Expense::latest()->whereBetween('date', [$request->from_date, $request->to_date])->get();
            } else {
                $data['expenses'] = Expense::latest()->get();
            }

            return view('backend.Admin.reports.expenses', $data);

        } elseif ($request->type == 'fundwithdrawal') {
            if ($request->from_date && $request->to_date) {
                $data['funds'] = FundWithdraw::latest()->whereBetween('created_at', [$request->from_date, $request->to_date])->get();
            } else {
                $data['funds'] = FundWithdraw::latest()->get();
            }
=======
            $data['expenses'] = Expense::latest()->get();
            return view('backend.Admin.reports.expenses', $data);

        } elseif ($request->type == 'fundwithdrawal') {
            $data['funds'] = FundWithdraw::latest()->get();
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
            return view('backend.Admin.reports.withdrawal', $data);

        } elseif ($request->type == 'clientlist') {
            if ($request->from_date && $request->to_date) {
                $data['billings'] = Billing::latest()->whereBetween('created_at', [$request->from_date, $request->to_date])->get();
            } else {
                $data['billings'] = Billing::latest()->get();
            }
            return view('backend.Admin.reports.clientlist', $data);

        } elseif ($request->type == 'ledgerstatement') {
<<<<<<< HEAD
            if ($request->from_date && $request->to_date) {
                $data['ledgerstatements'] = LedgerStatement::latest()->whereBetween('created_at', [$request->from_date, $request->to_date])->get();
            } else {
                $data['ledgerstatements'] = LedgerStatement::with('bookings')->latest()->get();
            }
            return view('backend.Admin.reports.ledgerstatement', $data);
        } else {
            return back();
=======
            $data['ledgerstatements'] = LedgerStatement::latest()->get();
            return view('backend.Admin.reports.ledgerstatement', $data);
        } else {
            return "None";
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ledgerstatement = LedgerStatement::find($id);
        return view('backend.Admin.reports.ledgerstatementshow', compact('ledgerstatement'));
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
        //
    }
}
