@extends('frontend.layouts.app')
@section('title','Reset Password')
@section('content')




<div class="search-section login-search clearfix">
    <div class="login-box">
    <form method="POST" action="{{ route('password.email') }}">
         @csrf
        <div class="form">
            <div class="mb-4">
                <label for="#">@lang('auth.Email')  </label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="{{ asset('frontend') }}/images/icons/user.png" alt="">
                    </span>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')  }}" placeholder="@lang('auth.Email')">
                </div>
                <div class="text-danger">  {{ $errors->first('email') }} </div>
            </div>
            
            <div class="login-btn registation-btn">
                <button type="submit">    {{ __('Send Password Reset Link') }}  </button>
            </div>
            
        </div>
        </form>
    </div>
</div>
</section>





@endsection
