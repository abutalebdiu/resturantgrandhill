@extends('frontend.layouts.app')
@section('title','About')
@section('content')
</section>

    <!--    VENDOR HOME-->
    <section class="vendor-home clearfix py-3">
        <div class="container">
            <div class="vendor-home-bg">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="vendor-profile clearfix">
                            <div class="vendor-logo">
                                <a href="#">
                                    @if( $vendor_information->user->image )
                                    <img src="{{ asset( $vendor_information->user->image ) }}" alt="">
                                    @else
                                        <img src="{{  asset('backend/assets/img/user/user-13.jpg')}}" alt="" />
                                    @endif
                                </a>
                            </div>
                            <div class="vendor-details">
                                <h6>
                                    @if(app()->getLocale()=='en')
                                        {{ $vendor_information->user? $vendor_information->user->name : '' }}
                                    @else
                                        {{ $vendor_information->user? $vendor_information->user->name_ar : '' }}
                                    @endif
                                </h6>
                                <p>{{ $vendor_information->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 d-none d-md-block">
                        <div class="company-name row align-items-center">
                            <h6>
                                @if(app()->getLocale()=='en')
                                {{ $vendor_information->user? $vendor_information->user->name : '' }}
                                @else
                                {{ $vendor_information->user? $vendor_information->user->name_ar : '' }}
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    VENDOR HOME END-->
         <!--    INSTUMENT NOTIFICATION-->
         <section class="instument-notification mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-lg-3">
                        <div class="category">
                            <a href="#">
                                All Categories &gt;
                            </a>
                        </div>
                    </div>
                    <div class="col-8 col-lg-6">
                        <div class="instument-search">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-text" id="basic-addon2">
                                    <button type="submit">
                                        <img src="{{ asset('frontend') }}/images/icons/search.png" alt="">
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="cart-box">
                             <a href=""  class="notification-btn">
                               <img src="{{ asset('frontend') }}/images/icons/notification.png" alt="">
                                <span class="cart-overlay">02</span>
                            </a>
                            <a  href="" class="notification-btn">
                               <img src="{{ asset('frontend') }}/images/icons/love.png" alt="">
                                <span class="cart-overlay">02</span>
                            </a>
                            <a  href="" class="notification-btn">
                               <img src="{{ asset('frontend') }}/images/icons/card.png" alt="">
                                <span class="cart-overlay"> {{ Cart::count() }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    INSTUMENT NOTIFICATION END-->

    <!--    VENDOR MENU-->
    <section class="vendor-menu-section py-3">
        <div class="container">
            <div class="vendor-menu">
                <a href="{{ route('vendor.instrument',$vendor_information->user_id) }}" class="active">all product</a>
                <a href="{{ route('vendor.instrument.profile',$vendor_information->user_id) }}">profile</a>
            </div>
        </div>
    </section>
    <!--    VENDOR MENU-->

    <!--    TOP SELLING-->
    <div class="section-top-selling py-3">
        <div class="container">
            <h6 class="after-border">instrument</h6>
            <div class="pt-2">
                <div class="row">

                    @foreach($vendor_instrument as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-5">
                        <div class="instrument-box">
                            <div class="instrument-image">
                                <a href="{{ route('instrument.details',$item->instument_slug) }}">
                                    <img src="{{ asset($item->default_image) }}" alt="Instrument Photo">
                                </a>
                                <div class="instrument-icon">
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_1.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_2.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_3.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="instrument-text py-3 d-flex bd-highlight">
                                <span class="w-100 bd-highlight">{{ $item->instument_title }} </span>
                                <span class="flex-shrink-1 bd-highlight">{{ $item->sell_price  }} SAR</span>
                            </div>
                            <div class="instrument-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!--    TOP SELLING END-->

    <!--    TOP SELLING-->
    <div class="section-top-selling py-3">
        <div class="container">
            <h6 class="after-border">Top Selling Items</h6>
            <div class="pt-2">
                <div class="row">
                    @foreach($vendor_instrument as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-5">
                        <div class="instrument-box">
                            <div class="instrument-image">
                                <a href="{{ route('instrument.details',$item->instument_slug) }}">
                                    <img src="{{ asset($item->default_image) }}" alt="Instrument Photo">
                                </a>
                                <div class="instrument-icon">
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_1.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_2.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_3.png" alt="">
                                    </a>
                                    <a href="#">
                                        <img src="{{ asset('frontend') }}/images/icons/ins_4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="instrument-text py-3 d-flex bd-highlight">
                                <span class="w-100 bd-highlight">{{ $item->instument_title }} </span>
                                <span class="flex-shrink-1 bd-highlight">{{ $item->sell_price  }} SAR</span>
                            </div>
                            <div class="instrument-btn">
                                <a href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
    <!--    TOP SELLING END-->


    @endsection('content')
