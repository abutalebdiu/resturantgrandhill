@extends('frontend.layouts.app')
@section('title','Project')
@section('content')
</section>



    <!--    PRIVACY SECTION-->
    <section class="project-section py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h6 class=""> @lang('project.latest_projects') </h6>
                <span></span>
            </div>
            <div class="project-content">
                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Talent-Incubator-Application.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6>@lang('project.talent_application_project') </h6>
                            <p> @lang('project.talent_application_project_p1')   </p>
                            
                        </div>
                    </div>
                </div>


                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6 d-md-none">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Promote-and-market-products-related-to-talents.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6> @lang('project.promote_market')   </h6>
                            <p> @lang('project.promote_market_p1')   </p>
                            <p> @lang('project.promote_market_p2')    </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Promote-and-market-products-related-to-talents.png" alt="Project photo">
                        </div>
                    </div>
                </div>



                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Establishing-and-launching-projects.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6> @lang('project.establish_launching')  </h6>
                            <p> @lang('project.establish_launching_p1') 
                            </p>
                            
                        </div>
                    </div>
                   
                </div>
                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6 d-md-none">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Promote-and-market-products-related-to-talents.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6> @lang('project.promote_market')   </h6>
                            <p> @lang('project.promote_market_p1')   </p>
                            <p> @lang('project.promote_market_p2')    </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Promote-and-market-products-related-to-talents.png" alt="Project photo">
                        </div>
                    </div>
                </div>
                 <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Research-and-studies-specialized-in-the-talent.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6> @lang('project.research_studies') </h6>
                            <p> @lang('project.research_studies_p1')   </p>
                        </div>
                    </div>
                </div>




                <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6 d-md-none">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Promote-and-market-products-related-to-talents.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6> @lang('project.Summer_Talent_Incubator')   </h6>
                            <p> @lang('project.Summer_Talent_Incubator_p1')   </p>
                            <p> @lang('project.Summer_Talent_Incubator_p2')    </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Promote-and-market-products-related-to-talents.png" alt="Project photo">
                        </div>
                    </div>
                </div>
                 <div class="row mb-5 pb-5">
                    <div class="col-12 col-md-6">
                        <div class="project-image">
                            <img src="{{ asset('frontend') }}/images/photo/Research-and-studies-specialized-in-the-talent.png" alt="Project photo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="project-text">
                            <h6> @lang('project.Little_Pioneer_Program') </h6>
                            <p> @lang('project.Little_Pioneer_Program_p')   </p>
                        </div>
                    </div>
                </div>











            </div>


            <div class="talent-program">
                <div class="section-title text-center py-5">
                    <h6 class=""> @lang('project.our_talent_program') 
                   </h6>
                    <span></span>
                </div>
                <div class="project-content">
                    <div class="row mb-5">
                        <div class="col-12 col-md-4">
                            <div class="project-image talent">
                                <img src="{{ asset('frontend') }}/images/photo/Summer-Talent-Incubator-Programs.png" alt="Project photo">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="project-text talent-project">
                                <h6>@lang('project.our_talent_program_p1') </h6>
                                <p> @lang('project.our_talent_program_p2') </p>
                                <p> @lang('project.our_talent_program_p3') </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-12 col-md-4">
                            <div class="project-image talent">
                                <img src="{{ asset('frontend') }}/images/photo/Young-pioneer-program.png" alt="Project photo">
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="project-text talent-project">
                                <h6>@lang('project.young_pioneer_program')  </h6>
                                <p> @lang('project.young_pioneer_program_p1') </p>
                                <p> @lang('project.young_pioneer_program_p2')  </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </section>
    <!--    PRIVACY SECTION END-->

@endsection('content')