    <!--    NOTIFICATION SECTION-->
    <section class="notification-section py-5 my-5">
        <div class="container">
            <div class="subs-content d-flex align-items-center">
                <div class="subs-image flex-shrink-0 d-none d-sm-block">
                    <img src="{{ asset('frontend') }}/images/icons/clock.png" alt="Clock Image">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6>Subscribe to get secrat deals</h6>
                    <p>Thoughtful thou-ghts to your inbox</p>
                    
                        <div class="subs-input">
                            <form action="{{ route('frontend.subscribe') }}" method="post">
                            @csrf
                            <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                            <button type="submit">Subscribe</button>
                    </div>
                    <div>
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    <!--    NOTIFICATION SECTION-->