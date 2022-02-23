@extends('frontend.layouts.app')
@section('title','Gallery')
@section('content')

    <!--    ABOUT HOME-->
    <section class="home-about">
        <div class="home-about-content">
            <h4 class="bottom-border-white">Gallery</h4>
            <p>Feel free to contact with us.</p>
        </div>
    </section>
    <!--    ABOUT HOME END-->

    <!--    DETAILS-->
    <section class="area-details">
        <div class="container">
            <div class="overview-text py-5">
                <div class="area-all-photo gallery">
                    @foreach($galleries as $item)
                    <a href="{{ asset($item->image) }}">
                        <img class="img-fluid" src="{{ asset($item->image) }}" alt="Area Photo">
                    </a>
                    @endforeach
                    {{-- <a href="{{ asset('frontend') }}/images/room/2.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/2.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/3.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/3.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/4.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/4.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/5.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/5.png" alt="Area Photo">

                    </a>
                    <a href="{{ asset('frontend') }}/images/room/6.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/6.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/1.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/1.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/2.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/2.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/3.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/3.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/4.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/4.png" alt="Area Photo">
                    </a>
                    <a href="{{ asset('frontend') }}/images/room/5.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/5.png" alt="Area Photo">

                    </a>
                    <a href="{{ asset('frontend') }}/images/room/6.png">
                        <img class="img-fluid" src="{{ asset('frontend') }}/images/room/6.png" alt="Area Photo">
                    </a> --}}

                </div>
            </div>
        </div>
    </section>
<!--    DETAILS END-->  



@endsection('content')