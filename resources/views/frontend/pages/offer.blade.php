@extends('frontend.layouts.app')
@section('title','Room')
@section('content')



    <section class="room-main py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-title m-auto text-center">
                        <h2>Offer Room</h2>
                    </div>

                    <div class="room-area mt-3">
                        @foreach($room_offer as $item)
                        <div class="room-box">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="room-image">
                                        <img src="{{ asset($item->photo) }}" alt="Room Photo">
                                        <span>OFFER</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="d-md-flex bd-highlight align-items-center">
                                        <div class="p-2 w-100 bd-highlight room-des">
                                            <p><b>{{ $item->category ? $item->category->name :'' }}</b></p>

                                            <p>Bed : <b>{{ $item->bed }}</b></p>
                                            <p>Room Size : <b>{{ $item->room_size }} (Sq ft)</b></p>
                                            <p>Price : <b class="sc">{{ $item->price }} tk (Per Day)</b></p>
                                            <p>Price : <b class="red"><del style="margin-right: 5px;">{{ $item->price }}  </del>{{ $item->discount_price }} tk (Per Day)</b></p>
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