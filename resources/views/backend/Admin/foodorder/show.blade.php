@extends('backend.Admin.layouts.app')
@section('title','Create Food Order')
@section('content')
@push('css')
<style>
    table th {
        background: white !important;
        color: black !important;
    }
</style>
@endpush
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Food Order Invoice</h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.foodorder.index') }}" class="btn  btn-primary">
                    Back To Order List
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="print-wrapper">
                <div class="print-btn text-right"><i id="print" class="fa fa-print btn btn-success" aria-hidden="true"></i></div>
                <div class="print" style="padding:50px;">
                    <div class="row border-bottom pb-3 mb-3">
                        <div class="col-4">
                            <h1>{{$websetting->site_name}}</h1>
                            <p><span class="border border-success p-3">Billing Form</span></p>
                            <p>{{$websetting->site_name}}</p>
                            <p>{{$websetting->address}}</p>
                            <p><strong>Mobile:</strong>{{$websetting->phone}}</p>
                            <p><strong>Email:</strong>{{$websetting->email}}</p>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <h1>Invoice</h1>
                            <p><strong>Invoice No:</strong>{{$order->id}}</p>
                            <p><strong>Order Status:</strong>Compleated</p>
                            <p><strong>Billing Date:</strong>{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</p>
                            <p><span class="border border-success p-3">Billing To</span></p>
                            <p><strong>Name:</strong>{{$order->customer_name}}</p>
                            <p><strong>Address:</strong>{{$order->address}}</p>
                            <p><strong>Mobile:</strong>{{$order->mobile}}</p>
                        </div>
                    </div>
                    <div class="details">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Item</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->food->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right"> Sub Total Ammount</td>
                                    <td>{{$order->sub_total}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"> Service Charge</td>
                                    <td>{{$order->service_charge}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"> Vat</td>
                                    <td>{{$order->vat}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Grand Total</td>
                                    <td>{{$order->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
<script>
    $('#print').click(function() {
        $('.print').printThis();
    })
</script>
@endpush