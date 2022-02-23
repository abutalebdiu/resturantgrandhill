<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ $websetting->site_name }}</title>
    <link rel="icon" href="{{ $websetting->logo }}" type="image/x-icon">


    <meta name="description" content="Enjoy your best holiday experience at The Grand Hill Taj resort in Rangamati. Explore beautiful private hotel; fresh &amp; authentic seafood &amp; peaceful waves dancing cafe" />
	<meta name="keywords" content="The Grand Hill Taj, Resort, Restroom, Free time, Good Food" />
	<!-- Open Graph data -->
    <meta property="fb:admins" content="imhopu"/>
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="536">
    <meta property="og:type" content="hotel"/>
    <meta property="og:site_name" content="@thegrandhilltaj"/>
    <meta property="og:url" content="https://www.thegrandhilltaj.com/">
    <meta property="og:image" content="{{ asset($websetting->logo) }}"/>
    <meta property="og:title" content="The Grand Hill Taj | Best Hotel & Restaurant in Rangamati">
    <meta property="og:description" content="The Grand Hill Taj">

    <!-- Schema.org markup for Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@thegrandhilltaj">
    <meta name="twitter:creator" content="@thegrandhilltaj">
    <meta property="twitter:url" content="https://www.thegrandhilltaj.com/" />
    <meta name="twitter:title" content="The Grand Hill Taj">
    <meta name="twitter:description" content="The Grand Hill Taj">
    <meta name="twitter:image" content="{{ asset($websetting->logo) }}">
    <link href="https://www.thegrandhilltaj.com/" rel="home">
    <link href="https://www.thegrandhilltaj.com/" rel="canonical"><meta name="robots" content="index, follow" />

    <meta name="google-site-verification" content="k39bt-9ul9odwmqsIlDlSj8fuIucDZq3j1l5-wdUbx0" />

    <!--    BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FONTAWSOME6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <!--    date range-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!--    GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!--    SLICK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
     <!--    MAGNIFIC POPUP-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
</head>

<body>

    <!--    HEADER TOP SECTION-->
    <section class="header-top-section py-2 py-md-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center m-auto">
                    <div class="logo ltd">
                        <a href="{{ route('homepage') }}" class="d-flex align-items-center">
                            <img src="{{ asset($websetting->logo) }}" alt="The Grand Hill Taj">
                            <span class="the">
                                    The <br> Grand Hill Taj
                            </span>
                        </a>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="header-top-menu text-center d-flex align-items-center">


                        <b><i class="fa fa-volume-control-phone"></i></b>
                        <b>
                            <span class="d-block">+880 15 8149 5115</span>
                            <span class="d-block">+880 18 9033 1021</span>
                            <span class="d-block">+880 16 0034 3694</span>
                        </b>

                        <a href="{{ route('room') }}">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    HEADER TOP SECTION END-->

    <!--    HEADER SECTION-->
    <header class="py-2">
        <div class="container">
            <ul class="d-none d-md-block">
                <li><a href="{{ route('homepage') }}">home</a></li>
                <li><a href="{{ route('about') }}">about</a></li>
                <li><a href="{{ route('room') }}">room</a></li>
                <li><a href="{{ route('gallery') }}">gallery</a></li>
                <li><a href="{{ route('offer') }}">offer</a></li>
                <li><a href="{{ route('contact') }}">contact</a></li>

            </ul>
            <div class="mobile-btn d-md-none d-flex justify-content-between align-items-center" onClick="mobileClick()">
                <span>MENU</span>
               <i class="fas fa-bars"></i>
            </div>
        </div>

        <!-- button sub-->
        <div id="aboutus-content">
            <div class="container">
                <div class="row">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius aut nihil nesciunt vel in odit, nulla unde eum sit animi neque, rerum culpa aliquam iusto architecto mollitia quibusdam beatae et ipsa doloremque! At cumque totam minima doloremque amet. Repellat eos dolorum qui sint praesentium a, soluta quod voluptatibus optio molestias!
                </div>
            </div>
        </div>
        <!-- button sub-->
    </header>
    <!--    HEADER SECTION END-->

    <!--    MOBILE MENU-->
    <div id="mobile-menu" class="mobile-menu">
        <!-- accordion-->
        <div class="accordion accordion-flush" id="accordionFlushExample">

            <div class="mobile-logo mb-3">
                <a href="#">
                    <img src="{{ asset($websetting->logo) }}" alt="mobile-logo" style="width:80px; padding: 10px 0; margin-left: 10px;">
                </a>
                <i id="mobile-cross" class="fa fa-times" onClick="mobileClick()"></i>
            </div>

            <div class="accordion-item custom ">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('homepage') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            Home
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('about') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            About
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('room') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            Room
                        </button>
                    </a>
                </h2>
            </div>

            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('gallery') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            Gallery
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('gallery') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            Offer
                        </button>
                    </a>
                </h2>
            </div>
            <div class="accordion-item custom">
                <h2 class="accordion-header" id="flush-headingThree">
                    <a href="{{ route('contact') }}">
                        <button class="accordion-button custom collapsed none" type="button">
                            Contact
                        </button>
                    </a>
                </h2>
            </div>
        </div>

    </div>
    <div id="mobileOverlay" class="mobile-overlay" onClick="mobileClick()"></div>
    <!--    MOBILE MENU END-->


    @yield('content')

    <!--    FOOTER-->
    <footer class="pt-5 pb-0 pb-md-5">
        <div class="container">
            <div class="connect-with">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="footer-social-text">
                            <h2>Connect with us</h2>
                            <p>Find us on social media site</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 pb-4">
                        <div class="footer-social">
                            <a href="https://www.facebook.com/hilltajresort" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-main pt-4">
                <div class="row">
                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <div class="footer-head">
                            <h6>Need Help ?</h6>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.
                            </p>
                            <div class="footer-info mt-2">
                                <p><b>E-mail :</b> {{ $websetting->email }}</p>
                                <p><b>Phone :</b> +880 15 8149 5115 </p>
                                <p><b>Address:</b> {{ $websetting->address }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <div class="footer-head">
                            <h6 class="bottom-border">Company</h6>
                            <ul>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Service</a></li>
                                <li><a href="#">Our Service</a></li>
                                <li><a href="#">Our Business Policy</a></li>
                                <li><a href="#">Community Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-5 mb-md-0">
                        <div class="footer-head">
                            <h6 class="bottom-border">Support</h6>
                            <ul>
                                <li><a href="#">Account</a></li>
                                <li><a href="#">Legal Support</a></li>
                                <li><a href="#">Work With us</a></li>
                                <li><a href="#">Affilliate program</a></li>
                                <li><a href="#">Contact to support</a></li>
                                <li><a href="{{route('login')}}">Admin Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--    FOOTER END-->


    <!--    COPYRIGHT-->
    <section class="copyright-section py-3">
        <div class="container">
            <p>Design & Developed By <a href="https://www.softech.com.bd/"><font color='red'> Softech BD LTD. </font></a></p>
        </div>
    </section>
    <!--    COPYRIGHT END-->


    <!--    JQUERY GOOGLE HOST-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--    BOOSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--    SLICK-->
    <script src="{{ asset('frontend') }}/js/slick.min.js"></script>
        <!--    MAGNIFIC POPUP-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js " integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin=" anonymous "></script>
    <!--    data range-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{asset('backend/assets/sweetalert/sweetalert2@9.js')}}"></script>
    <script>

        @if(Session::has('message'))

        var type = "{{Session::get('alert-type','info')}}"

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif




        //        MOBILE MENU
        function mobileClick() {
            $("#mobile-menu").toggleClass('mobileAdd');
            $("#mobileOverlay").toggleClass('mobile-overlay');
        }

        //        date time picker
        $('input[name="dates"]').daterangepicker();


        //        MOBILE MENU END

        $('.autoplay').slick({
            slidesToShow: 5,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            arrows: false,
            nextArrow: $('.nxt'),
            prevArrow: $('.prv'),
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]

        });

         // MAGNIFIC
         $('.gallery').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });



    </script>
</body>

</html>
