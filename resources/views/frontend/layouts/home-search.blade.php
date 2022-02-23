    <!--    HOME OVERLAY-->
    <section class="home-overlay pb-5">
        <div class="container">
            <div class="home-overlay-main p-4">
                <div class="home-overlay-top">
                    <div class="custom-row">
                        <div class="single-service">
                            <a href="{{ route('resort.details') }}">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-1.png" alt="Sector Photo">
                                <span>Resorts</span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-2.png" alt="Sector Photo">
                                <span>Restrooms</span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-3.png" alt="Sector Photo">
                                <span>Hotel Lounges</span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-4.png" alt="Sector Photo">
                                <span>Warehouse</span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-5.png" alt="Sector Photo">
                                <span> Administrative</span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-6.png" alt="Sector Photo">
                                <span> Stadium</span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-7.png.png" alt="Sector Photo">
                                <span>Studio </span>
                            </a>
                        </div>
                        <div class="single-service">
                            <a href="#">
                                <img src="{{ asset('frontend') }}/images/icons/home-overlay-8.png" alt="Sector Photo">
                                <span> Waddings Hall</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="home-overlay-bottom mt-4">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8 col-lg-10">
                            <div class="row py-3">
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <div class="home-name">
                                        <label for="countery">Country</label>
                                        <div class="search-input" id="country">
                                            <input type="text" placeholder="malaysiya">
                                            <span></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <label for="">Check In</label>
                                    <input type="date">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <label for="">Check Out</label>
                                    <input type="date">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <div class="room">
                                        <label for="">Room</label>
                                        <div class="search-input">
                                            <input type="input" placeholder="02">
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <div class="">
                                        <label for="customRange1" class="form-label">Price Range/$ 700+</label>
                                        <input type="range" class="form-range" id="customRange1">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <label for="hotel">Hotel Type</label>
                                    <select name="" id="hotel">
                                        <option value="">Any Type</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <label for="hotel">Near by</label>
                                    <select name="" id="hotel">
                                        <option value="">Any Location</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3 py-2 py-lg-0">
                                    <label for="hotel">Filter</label>
                                    <select name="" id="hotel">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2">
                            <div class="home-search">
                                <a href="#">Search</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    HOME OVERLAY END -->