@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="login-wrap">
    <div class="row mx-auto h-100">
        <div class="col-12 col-md-6 col-xl-6 col-sm-6">
            <div class="login-img-wrap">
                <img src="{{ asset('assets/images/login-img.png') }}" class="login-img">
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-6 col-sm-6">
            <div class="login-right-wrap">
                <div class="col-12 col-md-12 col-xl-8 col-sm-8">
                    <h3 class="heading-title"> Welcome Back! Please Sign In To Continue </h3>
                    <div class="loginform-wrap">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <i class="fas fa-user form-icon"></i>
                                <input id="login" type="text" name="login" class="form-control @error('login') is-invalid @enderror" autocomplete="Username or Email Address" autofocus placeholder="Enter Username or Email Address" value="{{ old('login')  }}">
                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                
                                <i class="fas fa-lock form-icon"></i>
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" placeholder="Enter  Password" > 
                                <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <div class="ml-4 text-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                </div>
                                <div class="form-group mb-0 text-right">
                                     @if (Route::has('password.request'))
                                        <a class="pass-label" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="submit-btn">
                                <Button type="submit" class="btn btn-submit"> Sign IN  </Button>

                            </div>
                            <div class="form-group mt-3 text-center">
                                @if (Route::has('register'))
                                    <a class="pass-label" href="{{ route('register') }}">
                                        {{ __('Sign Up') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-hooks')
<script>
function password(){
    $(this).toggleClass("password-icon");
    var input = $("#password");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
        $(".password-icon").addClass("fa-eye");
        $(".password-icon").removeClass("fa-eye-slash");
    } else {
        
        $(".password-icon").addClass("fa-eye-slash");
        $(".password-icon").removeClass("fa-eye");
        input.attr("type", "password");
    }
}
</script>
@endsection

<!-- @section('css-hooks')

@endsection -->
