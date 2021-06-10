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
                    <h3 class="heading-title"> Reset Password </h3>
                    <div class="loginform-wrap">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mb-3">
                                <i class="fas fa-user form-icon"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  autocomplete="email" autofocus>

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
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password-confirm') is-invalid @enderror" autocomplete="new-password" placeholder="Enter  Confirm Password" > 
                                <i class="far fa-eye-slash lock-icon confirm-password-icon" onclick="confirm_password()"></i>
                                @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="submit-btn">
                                <Button type="submit" class="btn btn-submit"> Reset Password  </Button>
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
