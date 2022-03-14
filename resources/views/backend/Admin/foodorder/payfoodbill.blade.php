@extends('backend.Admin.layouts.app')
@section('title','Food Bill Payment')
@section('content')
@push('css')
<style>
    .list-group .active {
        background-color: #4A1D8C;
    }
</style>
@endpush
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Food Bill Payment </h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.foodorder.index') }}" class="btn  btn-primary">
                    Back To Order List
                </a>
            </div>
        </div>
        <div class="panel-body">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">Order Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>User Name</th>
                                <th>Table No</th>
                                <th>Sub Total</th>
                                <th>Service Charge</th>
                                <th>Vat</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->table_no}}</td>
                                <td>{{$order->sub_total}}</td>
                                <td>{{$order->service_charge}}</td>
                                <td>{{$order->vat}}</td>
                                <td>{{$order->total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header">
                    <h3 class="card-title text-center">Order Items</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SI</th>
                                <th>Order Id</th>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->order_id}}</td>
                                <td>{{$item->food->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->total_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-header">
                    <h3 class="card-title text-center">Billing Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.foodbillstore', $order->id)}}" method="post" class="w-50 m-auto p-5 border">
                        @csrf

                        <div class="form-group">
                            <label for="mobile"><strong>Mobile</strong></label>
                            <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_mode"><strong>Payment Mode</strong></label>
                            <select name="payment_mode" id="payment_mode" class="form-control" required>
                                <option value="Cash">Cash</option>
                                <option value="Check">Check</option>
                                <option value="DBBL">Check</option>
                                <option value="Bikash">Bikash</option>
                                <option value="Rocket">Rocket</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection