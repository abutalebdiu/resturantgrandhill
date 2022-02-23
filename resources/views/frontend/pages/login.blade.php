@extends('frontend.layouts.app')
@section('title','Login')
@section('content')

    <!--    LOGIN SECTION-->
    <section class="login-section login py-5 clearfix">
        <div class="container py-5">
            <div class="login-box">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="login-left">
                            <h2>sign In</h2>
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="login-right py-2">
                            <form action="{{ route('user.login') }}" method="post">
                                @csrf
                               <div class="py-2">
                                   <label for="#">Email</label>
                                    <input type="text" name="username" value="{{ old('username')  }}" placeholder="Email">
                                    <span class="text-danger mt-2 d-block">{{$errors->first('username')}}</span>
                               </div>

                                <div class="py-2">
                                   <label for="#">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" placeholder="@lang('auth.Password')">
                                    <span class="text-danger mt-2 d-block">{{$errors->first('password')}}</span>
                                </div>
                                {{-- <div class="forget mt-2">
                                    <a href="#">Forgot your password?</a>
                                </div> --}}
                                <div class="mt-3 sign-in-btn text-center">
                                    <button type="submit" class="custom-btn">Sign In</button>
                                </div>
                                 {{-- <div class="sign-in-login mt-3">
                                    <span>
                                    You haven't an account?
                                     <a href="{{ route('registration') }}">Sign up</a>
                                    </span>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    LOGIN SECTION END-->

{{-- <div class="search-section login-search clearfix">
    <div class="login-box">
        <form action="{{ route('user.login') }}" method="post">
            @csrf
        <div class="form">
            <div class="mb-4">
                <label for="#">@lang('auth.Username')  </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="{{ asset('frontend') }}/images/icons/user.png" alt="">
                    </span>
                    <input type="text" class="form-control" name="username" value="{{ old('username')  }}" placeholder="@lang('auth.Username')">
                </div>
                <span class="text-danger mt-2 d-block">{{$errors->first('username')}}</span>
            </div>
            <div class="mb-4">
                <label for="#">@lang('auth.Password')</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="{{ asset('frontend') }}/images/icons/unlock.png" alt="">
                    </span>
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="@lang('auth.Password')">
                </div>
                <span class="text-danger mt-2 d-block">{{$errors->first('password')}}</span>
                <div class="forget">
                    <a href="#">@lang('auth.Forgot_your_password')</a>
                </div>
            </div>
            <div class="login-btn registation-btn">
                <button type="submit">@lang('auth.Login')</button>
            </div>
            <div class="any-accound">
                <span>
                    @lang('auth.You_haven_an')   <a href="{{ route('registration') }}">@lang('auth.signup')</a>
                </span>
            </div>
        </div>
        </form>
    </div>
</div>
</section> --}}


@endsection
