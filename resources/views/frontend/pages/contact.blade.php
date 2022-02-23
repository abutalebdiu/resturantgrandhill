@extends('frontend.layouts.app')
@section('title','Contact')
@section('content')

    <!--    ABOUT HOME-->
    <section class="home-about">
        <div class="home-about-content">
            <h4 class="bottom-border-white">Contact us</h4>
            <p>Feel free to contact with us.</p>
        </div>
    </section>
    <!--    ABOUT HOME END-->

    <!--    CONTACT SECTION-->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7 mb-4 mb-lg-0">
                    <div class="contact-form">
                        <h4 class="mb-2">Massage</h4>
                        <form action="{{ route('fronted.contact.post') }}" method="post">
                            @csrf
                            <input type="text" placeholder="Enter Your Name" name="name" value="{{ old('name') }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                            <input type="email" placeholder="Enter Your Email" name="email" value="{{ old('email') }}">
                            <span class="text-danger">{{ $errors->first('email') }}</span>

                            <input type="text" placeholder="Your Mobile Number" name="phone" value="{{ old('phone') }}">
                            <span class="text-danger">{{ $errors->first('phone') }}</span>

                            <input type="text" placeholder="Your Country" name="address" placeholder="{{ old('address') }}">
                            <span class="text-danger">{{ $errors->first('address') }}</span>

                            <textarea name="message" placeholder="Write Your Massage..!">{{ old('message') }}</textarea>
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                            <div class="contact-button">
                                <button type="submit" class="custom-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="contact-right">
                        <div class="single-location">
                            <h4 class="pb-2">Head Office</h4>
                            <p>
                              <img src="{{ asset('frontend') }}/images/icons/location-contact.png" alt="">
                             {{ $websetting->address }}

                            </p>
                            <p>
                               <img src="{{ asset('frontend') }}/images/icons/phone-contact.png" alt="">
                               +880 15 8149 5115, +880 18 9033 1021
                            </p>
                            <p>
                               <img src="{{ asset('frontend') }}/images/icons/email-contact.png" alt="">
                               {{ $websetting->email }}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    CONTACT SECTION END-->
    
    <!--    LOCATION-->
    <section class="google-location">
        <div class="container">
            <div class="section-title">
                <h4>Our Location</h4>
            </div>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.5889901330206!2d92.15768261443574!3d22.669107935135422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3752b5bfb4503877%3A0x994f2ae8421ee501!2sHill%20Taj%20Resort!5e0!3m2!1sen!2sbd!4v1637413879837!5m2!1sen!2sbd" width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    <!--    LOCATION END-->














{{-- 
                        <form action="{{ route('contact.post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6 py-2">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="@lang('homepage.First_Name')">
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="col-12 col-sm-6 py-2">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="@lang('homepage.Last_Name')">
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                </div>
                                <div class="col-12 col-sm-6 py-2">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="@lang('homepage.Email')">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="col-12 col-sm-6 py-2">
                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="@lang('homepage.Phone')">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </div>
                                <div class="col-12 py-2">
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="@lang('homepage.Address')">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                </div>
                                <div class="col-12 py-2">
                                    <textarea name="message"  placeholder="@lang('homepage.Type_your_message')">{{ old('message') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                </div>
                                <div class="contact-btn py-2">
                                    <button type="submit">@lang('homepage.Submit')</button>
                                </div>
                            </div>
                        </form> --}}


@endsection('content')