@extends('layouts.master')

@section('css')
<style>
    .center-block {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body "><img class="center-block" alt="Brand" width="100" src="{{ URL::asset('assets/images/logo/logo.png') }}"></div>
                <h3 class="text-center font-weight-bold">Welcome to Fline</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-6 center-block">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-6 center-block">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class=" col-md-3 center-block">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>


                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class=" col-md-6 center-block text-center">
                                <small>By continuing, you agree to Fline's <strong>Terms of Service</strong> and acknowledge you've read our <strong>Privacy Policy</strong></small>
                            </div>
                            
                        </div>

                        <div class="form-group row  mb-0">
                        <div class=" col-md-2 center-block text-center">
                                <hr style="border-top: 1px solid white;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class=" col-md-6 center-block text-center">
                                <a href="{{ route('register') }}"><small><strong>Not in Fline yet? Sign up</strong></small></a>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection