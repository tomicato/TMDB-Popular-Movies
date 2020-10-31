@extends('layouts.template')

@section('content')
    <div class="container">

        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="/img/login.jpg" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">

                    <div class="card-body">
                        <div class="brand-wrapper">
                            <a href="/">
                                <img src="/img/logo.svg" alt="logo" class="logo">
                            </a>
                        </div>
                        <p class="login-card-description">Confirm your password</p>
                        <form method="POST" action="{{ url('user/confirm-password') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" " placeholder="***********">
                                @error('password')
                                <span class="invalid-feedback is-invalid" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input name="confirm" id="confirm" class="btn btn-block login-btn mb-4" type="submit" value="Confirm">
                        </form>
                        <a href="{{ route('password.request') }}" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>

                    </div>
                </div>
            </div>
        </div>
@endsection
