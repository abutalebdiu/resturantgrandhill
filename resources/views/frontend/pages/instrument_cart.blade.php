@extends('frontend.layouts.app')
@section('title','Shopping Cart Information')
@section('content')
</section>

    <!--    BREADCRUMB-->
    <div class="breadcrumbe-section py-5">
        <div class="container">
            <a href="#">Home</a>
            <span>></span>
            <a href="#">Instruments </a>
            <span>></span>
            <span>Buy Instrument</span>
        </div>
    </div>
    <!--    BREADCRUMB END-->

    <!--    TICKET CHECKOUT -->
    <div class="ticket-checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ticket-checkout-header">
                        <h5>Shopping Cart Information</h5>
                    </div>
                </div>
                <div class="col-12">


                    <div class="ticket-table product py-4 table-responsive">


                        <table>
                            <tr class="py-4">
                                <td>S.N</td>
                                <td>Images</td>
                                <td>Instruments</td>
                                <td width="13%">Price</td>
                                <td width="12%">Quantity</td>
                                <td width="17%">Sub Total</td>

                            </tr>
                            @foreach(Cart::Content() as $data)
                             <tr>
                                <td>01</td>
                                <td>
                                    <div class="ticket-checkout-image">
                                        <img src="{{ asset($data->options['image']) }}" alt="">
                                    </div>
                                </td>
                                <td>
                                   {{ $data->name }}
                                </td>
                                <td>
                                    <span>SAR {{ $data->price }}  </span>
                                </td>
                                <td class="quentity-product">
                                   <button><i class="fa fa-plus"></i></button>
                                    <span> {{ $data->qty }} </span>
                                    <button><i class="fa fa-minus"></i></button>

                                </td>
                                <td>
                                    <span class="disre">SAR {{ $data->subtotal() }} </span>
                                    <button class="disre"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            @endforeach



                        </table>
                    </div>
                </div>
                <div class="col-12 py-2">
                    <div class="row">
                        <div class="col-6">

                              {{--   <div class="apply-cuppon">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Coupon Code">
                                        <span class="input-group-text">
                                            <button type="submit">Apply Coupon</button>
                                        </span>
                                    </div>
                                </div> --}}

                        </div>
                        <div class="col-6">
                            <div class="ticket-checkout-update">
                                <a href="#">Update Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-4">
                    <div class="finish-checkout">
                        <div class="total-price-box">
                            <h6 class="after-border">Total Price</h6>
                            <div class="d-flex justify-content-between">
                                <span>Vat & Tax</span>
                                <span>SAR 10</span>
                            </div>
                            <p><span>Cutomer : </span>Sadi Khan</p>
                            <h6 class="total d-flex justify-content-between">
                                <span>Total</span>
                                <span>SAR 610</span>
                            </h6>
                        </div>
                        <div class="process-btn pt-5">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#">Back To Home</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('instrument.billing') }}">Process To Check Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    TICKET CHECKOUT -->


    @include('frontend.includes.subscribe')



@endsection('content')
