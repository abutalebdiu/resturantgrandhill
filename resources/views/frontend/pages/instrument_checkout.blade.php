@extends('frontend.layouts.app')
@section('title','Billing Information')
@section('content')
</section>

    <!--    BREADCRUMB-->
    <div class="breadcrumbe-section py-4">
        <div class="container">
            <a href="#">Home</a>
            <span>></span>
            <a href="#">ticket</a>
            <span>></span>
            <span>Buy Ticket</span>
        </div>
    </div>
    <!--    BREADCRUMB END-->

    <!--    TICKET CHECKOUT -->
    <div class="ticket-checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ticket-checkout-header">
                        <h5 class="text-white">Fill up the check out form</h5>
                    </div>
                </div>
                <div class="col-12 pt-4">
                    <form action="#">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="billing-infomation">
                                    <h5 class="after-border">Billing Information</h5>

                                    <div class="row">
                                        <div class="col-6 py-2">
                                            <label for="f-name">Frist Name</label>
                                            <input type="text" name="first_name" value="@if($countb) {{ $billing->first_name }} @endif" id="first_name">
                                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                        </div>
                                        <div class="col-6 py-2">
                                            <label for="l-name">Last Name</label>
                                            <input type="text" name="last_name" value="@if($countb) {{ $billing->last_name }} @endif" id="last_name">
                                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="company">Company Name (if any)</label>
                                            <input type="text" name="company_name" value="@if($countb) {{ $billing->company_name }} @endif" id="company_name">
                                            <div class="text-danger">{{ $errors->first('company_name') }}</div>
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="country">Country / Region</label>
                                            <select name="country_id" id="country_id">
                                                <option value="">Select</option>
                                                   @foreach($countries as $country)
                                                    <option
                                                        @if($countb) 
                                                         {{ $billing->country_id == $country->id ? 'selected' : '' }}
                                                         @endif
                                                     value="{{ $country->id }}">
                                                        @if (app()->getLocale() == 'en')
                                                            {{ $country->name }}
                                                        @else
                                                             {{ $country->name_ar }}
                                                        @endif
        
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="text-danger">{{ $errors->first('country_id') }}</div>
                                        <div class="col-12 py-2">
                                            <label for="address">Street Address</label>
                                            <input type="text" name="street_address" value="@if($countb) {{ $billing->street_address }} @endif" id="address" placeholder="Huse Number and Street Name">

                                        </div>
                                        <div class="col-12 py-2">
                                            <input type="text" name="apartment_address" value="@if($countb) {{ $billing->apartment_address }} @endif" id="address" placeholder="Apartment, Unit, Suite etc.">
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="Town">Town</label>
                                            <input type="text" name="town" value="@if($countb) {{ $billing->town }} @endif" id="Town">
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="City">City</label>
                                            <input type="text" name="city" value="@if($countb) {{ $billing->city }} @endif" id="City">
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="zip">Zip code</label>
                                            <input type="text" name="zip_code" value="@if($countb) {{ $billing->zip_code }} @endif" id="zip">
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="contact">Contact Number</label>
                                            <input type="text" name="contact_number" value="@if($countb) {{ $billing->contact_number }} @endif" id="contact">
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" value="@if($countb) {{ $billing->email }} @endif" id="email">
                                        </div>
                                        <div class="col-12 py-2">
                                            <label for="note">Note:</label>
                                            <textarea name="notes" id="note" placeholder="Type you massage what do you think?">@if($countb) {{ $billing->notes }} @endif</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="order">
                                    <h5 class="after-border">Your Order</h5>
                                    <div class="order-box pt-5">
                                        <h6 class="after-border d-flex justify-content-between pb-2">
                                            <span>Product Name</span>
                                            <span>Sub Total</span>
                                        </h6>


                                        @foreach(Cart::content() as $data)
                                        <h6 class="d-flex justify-content-between py-2">
                                            <span> <b class="pr-5">{{ $loop->iteration }}</b> {{ $data->name }}</span>
                                            <span>{{ $data->subtotal() }}</span>

                                        </h6>

                                        @endforeach
                                       

                                        <div class="py-2">
                                            <input type="radio" name="payment" value="1" id="bank-trans">
                                            <label for="bank-trans" class="bank-trans-label">Bank Transper</label>
                                        </div>
                                        <p>
                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                        </p>

                                         
                                        <div class="d-flex justify-content-between mt-4 mb-2">
                                            <span>
                                                <input type="radio" name="payment" value="2" id="cradit-cart">
                                                <label for="cradit-cart" class="bank-trans-label">Cradit Card</label>
                                            </span>
                                            <span>
                                                <a href="#">
                                                    <img src="{{ asset('frontend') }}/{{ asset('frontend') }}/images/icons/card-1.png" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend') }}/{{ asset('frontend') }}/images/icons/card-2.png" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend') }}/{{ asset('frontend') }}/images/icons/card-3.png" alt="">
                                                </a>

                                            </span>
                                        </div>
                                        <p>
                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                        </p>

                                        <div class="py-2">
                                            <input type="radio" name="payment" value="1" id="bank-trans">
                                            <label for="bank-trans" class="bank-trans-label">Cash on Delivery</label>
                                        </div>
                                       

                                        <div>
                                            <input type="checkbox" id="trams-condition">
                                            <label for="trams-condition" class="bank-trans-label">I agree with all term & and Condition.</label>
                                        </div>
                                        <div class="order-btn mt-5">
                                            <button type="submit">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <!--    TICKET CHECKOUT -->


    @include('frontend.includes.subscribe')



@endsection('content')