@extends('frontend.layouts.app')
@section('title','Room')
@section('content')


    <!--    HOME OVERLAY-->
    <section class="search-overlay py-4">
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

    <section class="room-main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    
                    <div class="room-area">
                        <span><b>Search Result :</b> available {{ $rooms->count() + $newsrooms->count()}} rooms. </span>
                        @foreach($rooms as $item)
                        <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset($item->photo) }}" alt="Room Photo">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight align-items-center">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>{{ $item->category ? $item->category->name :'' }}</b></p>

                                            <p>Bed : <b>{{ $item->bed }}</b></p>
                                            <p>Room Size : <b>{{ $item->room_size }} (Sq ft)</b></p>
                                            <p>Price : <b class="sc">{{ $item->price }} tk (Per Day)</b></p>
                                            <div class="pt-2">
                                                <p>Details :  {{ $item->description }} </p>
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight booking-btn">
                                            <a href="{{ route('room.booking',$item->id) }}">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach($newsrooms as $item)
                        <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset($item->photo) }}" alt="Room Photo">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight align-items-center">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>{{ $item->category ? $item->category->name :'' }}</b></p>

                                            <p>Bed : <b>{{ $item->bed }}</b></p>
                                            <p>Room Size : <b>{{ $item->room_size }} (Sq ft)</b></p>
                                            <p>Price : <b class="sc">{{ $item->price }} tk (Per Day)</b></p>
                                            <div class="pt-2">
                                            <p>Details :  {{ $item->description }} </p>
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight booking-btn">
                                            <a href="{{ route('room.booking',$item->id) }}">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach







                        {{-- <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset('frontend') }}/images/room/1.png" alt="">
                                        <span>OFFER</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>Category Name</b></p>

                                            <p>Bed : <b>3</b></p>
                                            <p>Room Size : <b>20 (Sq ft)</b></p>
                                            <p>Price : <b class="red"><del>1500 </del>1400 tk (Per Day)</b></p>
                                            <div class="pt-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi enim praesentium.
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight booking-btn">
                                            <a href="#">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset('frontend') }}/images/room/1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>Category Name</b></p>

                                            <p>Bed : <b>3</b></p>
                                            <p>Room Size : <b>20 (Sq ft)</b></p>
                                            <p>Price : <b class="sc">1500 tk (Per Day)</b></p>
                                            <div class="pt-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi enim praesentium.
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight booking-btn">
                                            <a href="#">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset('frontend') }}/images/room/1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>Category Name</b></p>

                                            <p>Bed : <b>3</b></p>
                                            <p>Room Size : <b>20 (Sq ft)</b></p>
                                            <p>Price : <b class="sc">1500 tk (Per Day)</b></p>
                                            <div class="pt-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi enim praesentium.
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight booking-btn">
                                            <a href="#">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset('frontend') }}/images/room/1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>Category Name</b></p>

                                            <p>Bed : <b>3</b></p>
                                            <p>Room Size : <b>20 (Sq ft)</b></p>
                                            <p>Price : <b class="sc">1500 tk (Per Day)</b></p>
                                            <div class="pt-2">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi enim praesentium.
                                            </div>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight booking-btn">
                                            <a href="#">Booking Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="room-sidebar">
                        <div class="category-box mb-3">
                            <h4>Room Type</h4>
                            <ul>
                                <li>
                                    <i class="far fa-hand-point-right"></i>
                                    <a href="#">Normal</a>
                                </li>
                                <li>
                                    <i class="far fa-hand-point-right"></i>
                                    <a href="#">Standart</a>
                                </li>
                                <li>
                                    <i class="far fa-hand-point-right"></i>
                                    <a href="#">Laxury</a>
                                </li>
                                <li>
                                    <i class="far fa-hand-point-right"></i>
                                    <a href="#">Laxury Deluxe</a>
                                </li>
                                <li>
                                    <i class="far fa-hand-point-right"></i>
                                    <a href="#">Laxury Supreme</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection('content')