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
                                    <img src="{{ asset($vendor_information->user? $vendor_information->user->image : '') }}" alt="">
                                </a>
                            </div>
                            <div class="vendor-details">
                                <h6>{{ $vendor_information->user? $vendor_information->user->name : '' }}</h6>
                                <p>{{ $vendor_information->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7 d-none d-md-block">
                        <div class="company-name row align-items-center">
                            <h6>{{ $vendor_information->user? $vendor_information->user->name : '' }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    VENDOR HOME END-->

    <!--    VENDOR MENU-->
    <section class="vendor-menu-section py-3">
        <div class="container">
            <div class="vendor-menu">
                <a href="{{ route('vendor.instrument',$vendor_information->user_id) }}">all product</a>
                <a href="{{ route('vendor.instrument.profile',$vendor_information->user_id) }}" class="active">profile</a>
            </div>
        </div>
    </section>
    <!--    VENDOR MENU-->
    
    
    <!--    VENDOR PROFILE DETAILS-->
    <section class="vendor-profile-details py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 my-2">
                    <div class="vendor-details-box">
                        <h6>Company Information</h6>
                        
                        <p>Name : <b>{{ $vendor_information->user? $vendor_information->user->name : '' }}</b></p>
                        <p>Location : <b>{{ $vendor_information->address }}</b></p>
                        <p> starding date: <b>{{ $vendor_information->created_at }}</b></p>
                    </div>
                </div>
                <div class="col-12 col-md-6 my-2">
                    <div class="vendor-details-box">
                        <h6>Contact Information</h6>
                        
                        <p>email : <b>{{ $vendor_information->user? $vendor_information->user->email : '' }}</b></p>
                        <p>mobile : <b>{{ $vendor_information->user? $vendor_information->user->mobile : '' }}</b></p>
                        <p>facebok page : <b>http://facebook.com/companynmae</b></p>
                    </div>
                </div>
                <div class="col-12 my-2">
                    <div class="vendor-details-box">
                        <h6>About Our Company</h6>
                        <p>
                            {{ $vendor_information->about }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    VENDOR PROFILE DETAILS END-->



@endsection('content')
