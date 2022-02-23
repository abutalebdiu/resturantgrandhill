@extends('frontend.layouts.app')
@section('title','Musical Instruments')
@section('content')
</section>
     <!--    INSTUMENT NOTIFICATION-->
     <section class="instument-notification">
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

    <!--    PRIVACY SECTION-->
    <section class="musincal-instument-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4 min-height">
                    <div class="search-instrument">
                        <div class="search-instrument-div row align-content-between flex-wrap">
                            <div>
                                <h6 class="after-border">@lang('instrument.Search_Instruments')</h6>
                                <form action="#">
                                    
                                    <div>
                                       <label for="#"></label>
                                        <input type="text" placeholder="@lang('instrument.Instrument_Name')">
                                    </div>
                                    <input type="text" placeholder="@lang('instrument.Type')">
                                    <input type="text" placeholder="@lang('instrument.Price_Range')">
                                    <input type="text" placeholder="@lang('instrument.Brand_name')">
                                </form>
                            </div>

                            <div class="musincal-instrument-btn">
                                <button type="submit">@lang('instrument.Search')</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 min-height">
                    <div class="musincal-instrument-content mt-5 mt-md-0">
                        <div class="row">
                            @foreach($instruments as $instrument)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-5">
                    
                    <div class="instrument-box h-100 row align-content-between flex-wrap">
                        <div>
                                <div class="instrument-image">

                                    <a href="{{ route('instrument.details',$items->instument_slug) }}">
                                        <img src="{{ asset($items->default_image) }}" alt="instrument photo">
                                    </a>


                                    <div class="instrument-icon clearfix">
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
                                    <span class="w-100 bd-highlight">{{ $items->instument_title }} </span>
                                    <span class="flex-shrink-1 bd-highlight">{{ $items->sell_price }} SAR</span>
                                </div>
                        </div>
                        <div class="instrument-btn">
                            <a href="#" class="instrument_id" data-id={{ $items->id }}>@lang('homepage.Add_to_cart')</a>
                        </div>
                    </div>
                   
                </div>
            @endforeach
                            {{-- @foreach($instuments as $items)
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="musincal-instrument-box">
                            <a href="{{ route('instrument.details',$items->instument_slug) }}">
                                <img src="{{ asset($items->default_image) }}" alt="Instrument Photo">
                            </a>

                            <div class="musincal-instrument-top-overlay">
                                        <a href="#">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-cart-plus"></i>
                                        </a>
                                    </div>
                            <div class="musincal-instrument-bottom-overlay">
                                <a href="">@lang('instrument.Add_to_Cart')</a>
                            </div>
                        </div>
                        </div>
                        @endforeach --}}





 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    PRIVACY SECTION END-->

    <!--    TOP SELLING-->
    <div class="section-top-selling py-3">
        <div class="container">
            <h6 class="after-border">@lang('instrument.Top_Selling_Items')</h6>
            <div class="pt-2">
                <div class="row">
                    @foreach($instuments as $items)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="musincal-instrument-box">
                    <a href="{{ route('instrument.details',$items->instument_slug) }}">
                        <img src="{{ asset($items->default_image) }}" alt="Instrument Photo">
                    </a>

                    <div class="musincal-instrument-top-overlay">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-cart-plus"></i>
                                </a>
                            </div>
                    <div class="musincal-instrument-bottom-overlay">
                        <a href="">@lang('instrument.Add_to_Cart')</a>
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
            <h6 class="after-border">@lang('instrument.Top_Selling_Items')</h6>
            <div class="pt-2">
                <div class="row">
                    @foreach($instuments as $items)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="musincal-instrument-box">
                    <a href="{{ route('instrument.details',$items->instument_slug) }}">
                        <img src="{{ asset($items->default_image) }}" alt="Instrument Photo">
                    </a>

                    <div class="musincal-instrument-top-overlay">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-cart-plus"></i>
                                </a>
                            </div>
                    <div class="musincal-instrument-bottom-overlay">
                        <a href="">@lang('instrument.Add_to_Cart')</a>
                    </div>
                </div>
                </div>
                @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <!--    TOP SELLING END-->

    @include('frontend.includes.subscribe')



@endsection('content')