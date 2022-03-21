@extends('backend.Admin.layouts.app')
@section('title','Show Ledger Statement')
@section('content')

<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Show Ledger Statement </h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.reports.index', ['type' => 'ledgerstatement']) }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Back To List
                </a>
            </div>
        </div>
        <div class="panel-body table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <tr>
                    <th>Amount</th>
                    <td>{{ $ledgerstatement->amount }}</td>
                </tr>
                <tr>
                    <th>Debit</th>
                    <td>{{ $ledgerstatement->debit }}</td>
                </tr>
                <tr>
                    <th>Credit</th>
                    <td>{{ $ledgerstatement->credit }}</td>
                </tr>
                <tr>
                    <th>Remarks</th>
                    <td>{{ $ledgerstatement->remarks }}</td>
                </tr>
                <tr>
                    <th>Reference</th>
                    <td>{{ $ledgerstatement->reference }}</td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>{{ $ledgerstatement->mobile }}</td>
                </tr>
                <tr>
                    <th>Payment mode</th>
                    <td>{{ $ledgerstatement->payment_mode }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ Carbon\Carbon::parse($ledgerstatement->created_at)->format('d M y - h:i A') }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection