<?php

namespace App\Http\Controllers\Admin;

use App\Models\FundWithdraw;
use Illuminate\Http\Request;
use App\Models\LedgerStatement;
use App\Http\Controllers\Controller;

class FundWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = LedgerStatement::get('amount')->last();
            return response($data);
        }
=======
    public function index()
    {
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
        $funds = FundWithdraw::latest()->take(10)->get();
        return view('backend.Admin.funds.index', compact('funds'));
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
            'available_amount' => 'required|numeric',
            'withdraw_amount' => 'required|numeric',
            'payment_mode' => 'required|string',
            'remarks' => 'required|max:500',
        ]);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
<<<<<<< HEAD
        $available_amount = $ledgerstatement->amount ?? 0;

        LedgerStatement::create([
            'remarks' => $request->remarks,
            'payment_mode' => $request->payment_mode,
            'credit' => 0,
            'debit' => $request->withdraw_amount,
            'amount' => $available_amount - $request->withdraw_amount,
=======

        LedgerStatement::create([
            'remarks' => $request->remarks,
            'credit' => 0,
            'debit' => $request->amount,
            'amount' => $ledgerstatement->amount - $request->amount,
>>>>>>> a0d1559a3a3587d3c7a9f6555c04751aa810f17c
        ]);

        FundWithdraw::create($request->all() + [
            'entry_by' => auth()->user()->name
        ]);
        $notification = array(
            'message' => 'Fund withdraw has been created.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundWithdraw  $fundWithdraw
     * @return \Illuminate\Http\Response
     */
    public function show(FundWithdraw $fundWithdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundWithdraw  $fundWithdraw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fundWithdraw = FundWithdraw::find($id);
        return view('backend.Admin.funds.edit', compact('fundWithdraw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundWithdraw  $fundWithdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'available_amount' => 'required|numeric',
            'withdraw_amount' => 'required|numeric',
            'payment_mode' => 'required|string',
            'remarks' => 'required|max:500',
        ]);

        $fundWithdraw = FundWithdraw::find($id);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $ledgerstatement->amount = $ledgerstatement->amount + $fundWithdraw->amount;
        $ledgerstatement->amount = $ledgerstatement->amount - $request->amount;
        $ledgerstatement->save();

        $fundWithdraw->update($request->all() + [
            'update_by' => auth()->user()->name
        ]);

        $notification = array(
            'message' => 'Fund withdraw has been updated.',
            'alert-type' => 'success'
        );
        return redirect(route('admin.funds_withdraws.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundWithdraw  $fundWithdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FundWithdraw::find($id)->delete();
        $notification = array(
            'message' => 'Fund withdraw has been updated.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
