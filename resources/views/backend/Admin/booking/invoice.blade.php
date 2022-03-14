@extends('backend.Admin.layouts.app')
@section('title','Final Invoice')
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
                            <p class=""><strong>Invoice:</strong>{{$booking->id}}</p>

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
                                        <td>Name# : {{$foodorder->user->name}}</td>
                                        <td>Date# :</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile# : {{$foodorder->user->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <td>Room# :{{$booking->bookingDetail[0]->room_no}}</td>
                                        <td>Sarver# :</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th class="bg-dark text-white">SI</th>
                                        <th class="bg-dark text-white">Name</th>
                                        <th class="bg-dark text-white">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Room Rent</td>
                                        <td>{{$booking->after_discount}}</td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>Food Price</td>
                                        <td>{{$foodorder->total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Total Amount</td>
                                        <td>{{$totalammount}}</td>

                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Paid Amount</td>
                                        <td>{{$paid_amount}}</td>


                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right">Due Ammount</td>
                                        <td>{{$due_amount}}</td>


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