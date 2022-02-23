@extends('frontend.layouts.app')
@section('title',$instuments->instument_title)
@section('content')
</section>

    <!--    INSTUMENT NOTIFICATION-->
    <section class="instument-notification">
        <div class="container">
            <div class="row">
                <div class="col-4 col-lg-3">
                    <div class="category">
                        <a href="#">
                            All Categories >
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
                     <div class="cart-box cart_count">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    INSTUMENT NOTIFICATION END-->

    <!--    INSTUMENT DETAILS-->
    <section class="instument-details-main py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="instument-details-left">
                        <div class="product__carousel">
                            <div class="gallery-parent">
                                <!-- SwiperJs and EasyZoom plugins start -->
                                <div class="swiper-container gallery-top">
                                    <div class="swiper-wrapper">
                                        
                                        <div class="swiper-slide easyzoom easyzoom--overlay">
                                            <a href="images/instrument/1.png">

                                               <img src="{{ asset($instuments->default_image) }}" alt="" />
                                            </a>
                                        </div>
                                       
                                        
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next swiper-button-white"></div>
                                    <div class="swiper-button-prev swiper-button-white"></div>
                                </div>
                                <div class="swiper-container gallery-thumbs mt-3">
                                    <div class="swiper-wrapper">
                                        
                                        <div class="swiper-slide">
                                           <img src="{{ asset($instuments->default_image) }}" alt="" />

                                        </div>
                                    </div>
                                </div>
                                <!-- SwiperJs and EasyZoom plugins end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="instument-details-right">
                        <h6>
                            {{ $instuments->instument_title }}
                        </h6>
                        <h5>{{ $instuments->sell_price }}</h5>
                        
                        <div class="instument-quelity d-flex align-items-center">
                            <div>
                                <p>
                                    <b>quelity :</b>
                                    <span id="product_count">
                                        01
                                    </span>
                                </p>
                            </div>
                            <div class="quelity-btn">
                                <button onClick="incriment_btn()">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <button onClick="decriment_btn()">
                                    <i class="fa fa-angle-up"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                         
                        </div>
                        <div>
                            <div class="cart-button">
                                <button type="submit" id="add_to_cart" data-id={{ $instuments->id }}>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    INSTUMENT DETAILS-->

    <!--    REVIEW DETAILS-->
    <section class="review-detials py-5">
        <div class="container">
            <div class="review-header">
                <a href="#" class="active">Description</a>
                <a href="#">Information</a>
                <a href="#">Customer Reviews</a>
            </div>
            <div class="customer-review">
                <div class="review-box">
                    <div class="row">
                        <div class="col-12 col-lg-2">
                            <div class="review-count">
                                <h6>135 Reviews</h6>
                                <h5>4.9/5</h5>
                                <p>133 Satisfied Rating</p>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3 col-lg-2">
                            <div class="review-rating">
                                <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>

                            </div>
                        </div>
                        <div class="col-4 col-sm-5 col-md-6 col-lg-5">
                            <div class="progress-bar-box">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm-3 col-md-3 col-lg-3">
                            <div class="review-satisfi">
                                <p>( 130 ) Satisfied</p>
                                <p>( 02 ) Good
                                <p>
                                <p>( 01 ) Avarage</p>
                                <p>( 00 ) Bad</p>
                                <p>( 01 ) Lame</p>
                            </div>
                        </div>

                        <div class="product-review py-5">
                            <div class="product-review-head mb-3">
                                <h6>Product Reviews</h6>
                            </div>

                            <div class="comment-box">
                                <ul class="uk-comment-list">
                                    <li>
                                        <div class="uk-comment review-rating-comment">
                                            <div>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <span>by Asfaq Nipun</span>
                                            <div class="comment-text mt-3">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam repudiandae sequi assumenda. Alias, rerum! Temporibus unde alias ducimus sed delectus.
                                            </div>
                                            <div class="like-row py-4">
                                                <button>
                                                   <img src="{{ asset('frontend') }}/images/icons/like.png" alt="">
                                                </button>
                                                <span>01</span>
                                                <button>
                                                    Replay
                                                </button>
                                                <span>03 Days 8hr ago</span>
                                            </div>
                                        </div>

                                        <ul class="uk-comment-list">
                                            <li>
                                                <div class="uk-comment review-rating-comment">
                                                    <div>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <span>by Asfaq Nipun</span>
                                                    <div class="comment-text mt-3">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam repudiandae sequi assumenda. Alias, rerum! Temporibus unde alias ducimus sed delectus.
                                                    </div>
                                                    <div class="like-row py-4">
                                                        <button>
                                                           <img src="{{ asset('frontend') }}/images/icons/like.png" alt="">
                                                        </button>
                                                        <span>01</span>
                                                        <button>
                                                            Replay
                                                        </button>
                                                        <span>03 Days 8hr ago</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    REVIEW DETAILS END-->



    <!--    TOP SELLING-->
    
    <div class="section-top-selling py-3">
        <div class="container">
            <h6 class="after-border">Related Products</h6>
            <div class="pt-2">
                <div class="row">


                   @foreach($instuments_related as $instrument)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-5">
                            <a href="{{ route('instrument.details',$instrument->instument_slug) }}" title="">
                             <div class="instrument-box h-100 row align-content-between flex-wrap">
                        <div>
                            <a href="{{ route('instrument.details',$instrument->instument_slug) }}" title="">
                                <div class="instrument-image">
                                    <img src="{{ asset($instrument->default_image) }}" alt="instrument photo">
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
                                <div class="instrument-text d-flex justify-content-between   align-items-start clearfix">
                                    <span> {{ $instrument->instument_title }}</span>
                                    <span> {{ $instrument->sell_price }} SAR</span>
                                </div>
                            </a>
                        </div>
                        <div class="instrument-btn mt-3">
                            <a href="#" class="instrument_id" data-id={{ $instrument->id }}>@lang('homepage.Add_to_cart')</a>
                        </div>
                    </div>
                            </a>
                        </div>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>

    <!--    TOP SELLING END-->


@endsection('content')


@section('js')

    <!--    CUSTOM JS-->
    <script>
        let count = 1;
    function incriment_btn() {
    count+=1;
    document.getElementById("product_count").innerHTML = count;
    }

    function decriment_btn() {
    count-=1;
    document.getElementById("product_count").innerHTML = count;
    }
    </script>


@endsection