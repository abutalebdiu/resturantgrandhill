@extends('frontend.layouts.app')
@section('title','About')
@section('content')

        <!--    BOOKING SECTION-->
        <section class="booking py-3">
            <div class="container">
                <div class="row">
                    <div class="col-6 m-auto">
                        <div class="section-title text-center">
                            <h2>Booking Information</h2>
                            
                            <p>Please contact this number  <br>   +880 15 8149 5115 <br>
+880 18 9033 1021</p>
                        </div>
                        <div class="booking-form contact-form" style="display:none">
                            <form action="{{ route('room.booking.post') }}" method="post" >
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="room_id">
                                <label for="#">Full Name</label>
                                <input type="text" name="name" placeholder="Enter Your Fullname" value="{{ old('name') }}">
                                <span class="text-danger d-block">{{ $errors->first('name') }}</span>

                                <label for="#">Mobile Number</label>
                                <input type="text" name="mobile" placeholder="Enter Your Mobile" value="{{ old('mobile') }}">
                                <span class="text-danger d-block">{{ $errors->first('mobile') }}</span>

                                <label for="#">Remarks</label>
                                <textarea name="remarks" placeholder="Write Your Massage..!">{{ old('remarks') }}</textarea>
                               
                                <div class="contact-button">
                                    <button type="submit" class="custom-btn">Submit</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--    BOOKING SECTION END-->


@endsection



