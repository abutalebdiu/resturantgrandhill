@extends('frontend.layouts.app')
@section('title','Services')
@section('content')

</section>

    <!--    PRIVACY SECTION-->
    <section class="project-section py-5">
        <div class="container">
            <div class="container">
                <div class="section-title text-center mb-5">
                    <h6 class=""> @lang("service.our_services")    </h6>
                    <span></span>
                    <p>  @lang("service.discover_creating")  </p>
                </div>
            </div>

            <div class="service-box py-4">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="service-image">
                            <img src="{{ asset('frontend') }}/images/photo/service-1.png" alt="Service Photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="service-text">
                            <h6> @lang("service.talents_discovery") </h6>
                            <p>
                                 @lang("service.talents_discovery_p1")  
                            </p>
                            <p>
                                @lang("service.talents_discovery_p2")  
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-box service-bottom py-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="service-image buttom mb-5">
                            <img src="{{ asset('frontend') }}/images/photo/service-2.png" alt="Service Photo">
                        </div>
                        <div class="service-text">
                            <h6 class="text-center"> @lang("service.manufacture_talents") </h6>
                            <p>  @lang("service.manufacture_talents_p")
                                 
                            </p>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="service-image buttom mb-5">
                            <img src="{{ asset('frontend') }}/images/photo/service-3.png" alt="Service Photo">
                        </div>
                        <div class="service-text">
                            <h6 class="text-center"> @lang("service.nurturing_talents")  </h6>
                            <p>  @lang("service.nurturing_talents_p1")   </p>
                            <p>  @lang("service.nurturing_talents_p2") 

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
    <!--    PRIVACY SECTION END-->


@endsection('content')