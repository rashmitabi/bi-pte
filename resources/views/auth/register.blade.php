@extends('layouts.app')

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
                    <h3 class="heading-title"> Welcome Back! Please Sign Up To Continue </h3>
                    <div class="loginform-wrap">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            
                            <div class="form-group mb-3">
                                <i class="fas fa-user form-icon"></i>
                                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" placeholder="Enter  User Name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <i class="fas fa-phone-square form-icon"></i>
                                <input id="mobile_no" type="text" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror"  value="{{ old('mobile_no') }}" placeholder="Enter  Mobile No" autofocus>
                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <i class="fas fa-building form-icon"></i>
                                <input id="institute_name" type="text" name="institute_name" class="form-control @error('institute_name') is-invalid @enderror"  value="{{ old('institute_name') }}" placeholder="Enter  Institute Name" autofocus>
                                @error('institute_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <i class="fas fa-envelope form-icon"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter  Email Id" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                
                                <i class="fas fa-lock form-icon"></i>
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" placeholder="Enter  Password" > 
                                <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                
                                <i class="fas fa-lock form-icon"></i>
                                <input id="confirm_password" type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" autocomplete="new-password" placeholder="Enter  Confirm Password" > 
                                <i class="far fa-eye-slash lock-icon confirm-password-icon" onclick="confirm_password()"></i>
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <div class="ml-4 text-left">
                                    <input class="form-check-input" type="checkbox" name="agree" id="agree" {{ old('agree') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="agree">
                                            {{ __('Agree to terms and conditions and privacy policy') }}
                                        </label>
                                </div>
                                
                            </div>
                            <div class="submit-btn">
                                <Button type="submit" class="btn btn-submit"> Sign UP  </Button>

                            </div>
                            <div class="form-group mt-3 text-center">
                                @if (Route::has('login'))
                                    <a class="pass-label" href="{{ route('login') }}">
                                        {{ __('Sign In') }}
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
function confirm_password(){
    $(this).toggleClass("confirm-password-icon");
    var input = $("#password-confirm");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
        $(".confirm-password-icon").addClass("fa-eye");
        $(".confirm-password-icon").removeClass("fa-eye-slash");
    } else {
        
        $(".confirm-password-icon").addClass("fa-eye-slash");
        $(".confirm-password-icon").removeClass("fa-eye");
        input.attr("type", "password");
    }
}
</script>
@endsection