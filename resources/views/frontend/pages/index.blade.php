@extends('frontend.layouts.app')
@section('title','Home')
@section('content')

 <!--    HOME SECTION-->
 <section class="slider-section">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            
            @foreach($sliders as $slider)
            <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}  " >
                <img src="{{ asset($slider->image)}}" class="d-block w-100" alt="...">
            </div>
            @endforeach
            
             
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--    HOME OVERLAY-->
    <section class="home-overlay">
        <div class="container">
            <div class="home-overlay-main p-4">
                <div class="home-overlay-bottom">
                 <form action="{{ route('search') }}"  method="get">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-12 col-lg-10">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 py-2 py-lg-0">
                                    <div class="home-name">
                                        <label for="category_id">Room Type</label>
                                        <div class="search-input" id="country">
                                            <select name="category_id" id="">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 py-2 py-lg-0">
                                    <label for="">Check In-Check Out</label>
                                    <input type="text" id="checkin" name="dates">
                                </div>
                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 py-2 py-lg-0">
                                    <div class="room">
                                        <label for="">Room</label>
                                        <div class="search-input">
                                            <input type="number" placeholder="02" value="1">
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-12 col-lg-2">
                            <div class="home-search text-center">
                                <button type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </section>
    <!--    HOME OVERLAY END -->

</section>
<!--    HOME SECTION END-->






<!--    AREA SECTION-->
<section class="area-section pt-5 pb-3">
    <div class="container">
        <div class="section-title m-auto text-center">
            <h2>Our Reservation Area</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
        </div>
        <div class="area-content mt-5">
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <div class="area-image">
                        <img src="http://thegrandhilltaj.com/public/images/Gallery/61ac3cc516db9.jpeg" alt="Area Photo">
                        <a href="{{ route('room') }}" class="area-overlay d-flex align-items-end">
                            <div>
                                <h6>Hotel Lounges</h6>
                                <p>Choose your best hotels for reservation</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="area-image">
                        <img src="http://thegrandhilltaj.com/public/images/Gallery/61b9db0f7c868.jpeg" alt="Area Photo">
                        <a href="{{ route('room') }}" class="area-overlay d-flex align-items-end">
                            <div>
                                <h6>Full View</h6>
                                <p>Best resorts for reservation</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="area-image">
                        <img src="http://thegrandhilltaj.com/public/images/Gallery/6198ce139b462.jfif" alt="Area Photo">
                        <a href="{{ route('room') }}" class="area-overlay d-flex align-items-end">
                            <div>
                                <h6>Restrooms</h6>
                                <p>Take a best restrooms for reservation</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-4">
                    <div class="area-image">
                        <img src="http://thegrandhilltaj.com/public/images/Gallery/61ae0f604cd22.jpeg" alt="Area Photo">
                        <a href="{{ route('room') }}" class="area-overlay d-flex align-items-end">
                            <div>
                                <h6>Hall</h6>
                                <p>Reserved A awesome wedding hall for marrage </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--    AREA SECTION END-->

<!--    BEST AREA-->
<section class="best-area py-5">
    <div class="container">
        <div class="section-title m-auto text-center">
            <h2>Traveler’s Best Choose</h2>
            <p>Lorem Ipsum is simply dummy text of the printing</p>
        </div>
    </div>
    <div class="best-area-slider mt-5">
        <div class="autoplay slider-width-control">
            @foreach($rooms as $item)
            <div class="slider-item">
                <a href="{{ route('room') }}">
                    <img src="{{ asset($item->photo) }}" alt="Room Photo">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--    BEST AREA END-->

<!--    MAPS SECTION-->
<section class="maps-section pb-5">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center">Our Location</h2>
        </div>
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.5889901330206!2d92.15768261443574!3d22.669107935135422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3752b5bfb4503877%3A0x994f2ae8421ee501!2sHill%20Taj%20Resort!5e0!3m2!1sen!2sbd!4v1637413879837!5m2!1sen!2sbd" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>
<!--    MAPS SECTION END-->


    <!--    NOTIFICATION SECTION-->
    @include('frontend.layouts.subscribe')
    <!--    NOTIFICATION SECTION-->



@endsection
