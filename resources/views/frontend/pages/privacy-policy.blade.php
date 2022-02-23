@extends('frontend.layouts.app')
@section('title','privacy policy')
@section('content')
</section>


    <!--    PRIVACY SECTION-->
    <section class="parivacy-section py-5">
        <div class="container">
            <div class="section-title text-center">
                <h6 class="">  @lang('privacy_policy.confidence_privacy') </h6>
                <span></span>
            </div>
            <div class="privacy-head pt-5">
                <h6> @lang('privacy_policy.privacy_policy')  </h6>
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4 mb-3 mb-md-0">
                        <img src="{{ asset('frontend') }}/images/photo/privacy-1.png" alt="photo">
                    </div>
                    <div class="col-12 col-md-6 col-xl-8">
                        <h5>@lang('privacy_policy.disclosure_agreement')  </h5>
                        <p>
                           @lang('privacy_policy.disclosure_agreement_p1') 
                        </p>
                        <p>
                            @lang('privacy_policy.disclosure_agreement_p2') 
                        </p>
                        <p>
                            @lang('privacy_policy.disclosure_agreement_p3') 
                        </p>
                        <p>
                           @lang('privacy_policy.disclosure_agreement_p4') 

                        </p>
                    </div>
                </div>
            </div>
            <div class="privacy-content pt-5 clearfix">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="privacy-content-box">
                            <span>01</span>
                            <h6> @lang('privacy_policy.automatic_gathering')   </h6>
                            <p>
                               @lang('privacy_policy.automatic_gathering_p1')   
                            </p>
                            <p>
                              @lang('privacy_policy.automatic_gathering_p2')  
                            </p>
                            <p>
                               @lang('privacy_policy.automatic_gathering_p3')  
                            </p>
                            <p>
                              @lang('privacy_policy.automatic_gathering_p4')   
                           
                            </p>


                        </div>
                        <div class="privacy-content-box d-md-none">
                            <span>02</span>
                            <h6> @lang('privacy_policy.information_required')    </h6>
                            <p>  @lang('privacy_policy.information_required_p1')   </p>
                            <p>  @lang('privacy_policy.information_required_p2')  </p>

                        </div>
                        <div class="privacy-content-box">
                            <span>03</span>
                            <h6>
                               @lang('privacy_policy.public_private')   
                                
                            </h6>
                            <p>
                                   @lang('privacy_policy.public_private_p1')
                            </p>


                        </div>
                        <div class="privacy-content-box d-md-none">
                            <span>04</span>
                            <h6>  @lang('privacy_policy.use_and_access')  </h6>
                            <p>   @lang('privacy_policy.use_and_access_p1')  </p>


                        </div>
                        <div class="privacy-content-box">
                            <span>05</span>
                            <h6>  @lang('privacy_policy.monitor_online_activity') </h6>
                            <p>   @lang('privacy_policy.monitor_online_activity_p') </p>



                        </div>
                        <div class="privacy-content-box d-md-none">
                            <span>06</span>
                            <h6>  @lang('privacy_policy.manage_or_remove') </h6>
                            <p> @lang('privacy_policy.manage_or_remove_p')  </p>


                        </div>
                        
                    </div>
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <div class="privacy-content-box">
                            <span>02</span>
                            <h6> @lang('privacy_policy.information_required')    </h6>
                            <p>  @lang('privacy_policy.information_required_p1')   </p>
                            <p>  @lang('privacy_policy.information_required_p2')  </p>

                        </div>
                        <div class="privacy-content-box">
                            <span>04</span>
                            <h6>
                                  @lang('privacy_policy.use_and_access') 
                            </h6>
                            <p>
                                 @lang('privacy_policy.use_and_access_p1')
                            </p>


                        </div>
                        <div class="privacy-content-box">
                            <span>06</span>
                            <h6>  @lang('privacy_policy.manage_or_remove') </h6>
                            <p> @lang('privacy_policy.manage_or_remove_p')  </p>


                        </div>
                        <div class="privacy-content-box">
                            <img src="{{ asset('frontend') }}/images/photo/privacy-2.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
    <!--    PRIVACY SECTION END-->

@endsection('content')