 <!--    NOTIFICATION-->
  
    <section class="notification-section py-5 my-5">
        <div class="container">
           <h6 class="m-0"> @lang('homepage.subscribe_head')</h6>
            <p>@lang('homepage.subscribe_text')</p>
            <form action="{{ route('subscribe') }}" method="post">
                @csrf
            <div class="input-group mb-3">
                
                    <input type="text" class="form-control" name="subscribe" value="{{ old('subscribe') }}" placeholder="@lang('homepage.type_email')">
                    <span class="input-group-text">
                        <button type="submit">@lang('homepage.subscribe')</button>
                    </span>
            </div>
            <b class="text-danger">{{ $errors->first('subscribe') }}</b>
        </form>
        </div>
    </section>

<!--    NOTIFICATION END-->
