@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="login-wrap">
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
                        <div class="form-group">
                            <i class="fas fa-user form-icon"></i>
                            <input type="text" class="form-control" placeholder="Enter User Name"> 
                        </div>
                        <div class="form-group mb-3">
                            
                            <i class="fas fa-lock form-icon"></i>
                            <input type="text" class="form-control" placeholder="Enter  Password"> 
                            <i class="far fa-eye lock-icon"></i>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <a href="#" class="pass-label"> Forgot Your Password? </a>
                        </div>
                        <div class="submit-btn">
                            <Button type="button" class="btn btn-submit"> Sign IN  </Button>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div> -->
@endsection