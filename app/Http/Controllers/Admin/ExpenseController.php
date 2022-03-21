<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\LedgerStatement;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::latest()->take(10)->get();
        return view('backend.Admin.expenses.index', compact('expenses'));
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
            'date' => 'required',
            'reference' => 'required',
            'purpose' => 'required',
            'remarks' => 'required',
            'amount' => 'required|numeric',
        ]);

        Expense::create($request->all() + [
            'entry_by' => auth()->user()->name
        ]);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $available_amount = $ledgerstatement->amount ?? 0;

        LedgerStatement::create([
            'remarks' => $request->remarks,
            'credit' => 0,
            'debit' => $request->amount,
            'amount' => $ledgerstatement->amount - $request->amount,
        ]);

        $notification = array(
            'message' => 'Expense has been created.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('backend.Admin.expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'date' => 'required',
            'reference' => 'required',
            'purpose' => 'required',
            'remarks' => 'required',
            'amount' => 'required|numeric',
        ]);

        $ledgerstatement = LedgerStatement::latest()->first('amount');
        $ledgerstatement->amount = $ledgerstatement->amount + $expense->amount;
        $ledgerstatement->amount = $ledgerstatement->amount - $request->amount;
        $ledgerstatement->save();

        $expense->update($request->all() + [
            'update_by' => auth()->user()->name
        ]);
        $notification = array(
            'message' => 'Expense has been updated.',
            'alert-type' => 'success'
        );
        return redirect(route('admin.expenses.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        $notification = array(
            'message' => 'Expense has been deleted.',
            'alert-type' => 'success'
        );
        return redirect(route('admin.expenses.index'))->with($notification);
    }
}
