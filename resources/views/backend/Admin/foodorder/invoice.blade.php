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
                <div class="print m-2" style="padding:100px; border:2px solid #000">

                    <div class="row">
                        <div class="col-8">
                            <div class="logo text-center">
                                <img src="{{asset('/images/logo.jpg')}}" width="150px" alt="Grand HIll">
                            </div>
                            <div class="details">
                                <h2 class="text-center">{{$websetting->site_name}}</h2>
                                <p>{{$websetting->address}}</p>
                                <p><span><strong>Mobile: </strong>{{$websetting->phone}}</span><span><strong>Email:</strong>{{$websetting->email}}</span></p>
                                <p><span><strong>Websie:</strong>thegrandhilltaj.com</span> <span><strong>Facebook:</strong>The Grand Hill Taj</span></p>
                            </div>
                        </div>
                        <div class="col-4" style="margin-top:60px">
                            <h1 class="text-right mb-4">INVOICE</h1>
                            <p class=""><strong>Invoice:</strong>{{$order->id}}</p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-striped">
                                <thead class="">
                                    <tr>
                                        <th colspan="2" class="bg-dark text-white">Bill To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Name# : {{$order->customer_name}}</td>
                                        <td>Date# :{{\Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile# : {{$order->mobile}}</td>
                                        <td>Table# : Table {{$order->table_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>Room# :</td>
                                        <td>Sarver# :</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered table-striped">
                                <thead class="">
                                    <tr>
                                        <th class="bg-dark text-white">Description</th>
                                        <th class="bg-dark text-white">Quantity</th>
                                        <th class="bg-dark text-white">Unit Price</th>
                                        <th class="bg-dark text-white">Amount(BDT)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>{{$item->food->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>{{$item->total_price}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-none text-right">Service Charge</td>
                                        <td>{{$order->service_charge}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-none text-right">Vat</td>
                                        <td>{{$order->vat}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-none text-right">Total</td>
                                        <td>{{$order->total}}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="ne">
                                <p>Note:</p>
                                <div class="w-50 mb-5" style="padding:50px; border:2px dashed #ddd"></div>
                            </div>
                            <div class="signature">
                                <div class="row">
                                    <div class="col-4">
                                        <span class="border-top pb-5">Signature Of The Guest</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="border-top pb-5">Signature Of The Admin Officer</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="border-top pb-5">Signature Of The Resturant Manager</span>
                                    </div>
                                </div>
                                <p class="bg-light p-5 text-center mt-4">Thanks For Our Business</p>
                            </div>
                        </div>
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