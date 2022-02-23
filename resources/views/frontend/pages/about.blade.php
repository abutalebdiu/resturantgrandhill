@extends('frontend.layouts.app')
@section('title','About')
@section('content')


      <!--    ABOUT HOME-->
      <section class="home-about">
        <div class="home-about-content">
            <h4 class="bottom-border-white">About Us</h4>
            <p>Know about us. who we are and what we are doing</p>
        </div>
    </section>
    <!--    ABOUT HOME END-->

    <!--    ABOUT SECTION-->
    <div class="section-about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="about-image">
                        <img src="{{ asset('frontend') }}/images/photos/about.png" alt="Area Photo">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                   <div class="about-text">
                        <h4>Know About Us</h4>
                    <p>
                        Area4U application and website for booking resorts, restrooms, hotel lounges, administrative or participatory offices, and reserving stadiums, photography studios and warehouses. It is the best tool for organizing customer reservations, and managing the list of bookings arranged automatically, where through one click of a button you can convert the reservation into a sales invoice for the customer whose items contain the list of services Reserved.
                        Area4U has also been designed to prevent any interference in clients' reservations and allow only the days and hours available for reservation.
                    </p>
                    <p>
                        We provide storage solutions for electronic stores and local and international commercial establishments in storing their goods inside warehouses and shipping them to their customers.
                    </p>
                   </div>
                </div>
            </div>
        </div>
    </div>
    <!--    ABOUT SECTION END-->


    @include('frontend.layouts.subscribe')


@endsection






