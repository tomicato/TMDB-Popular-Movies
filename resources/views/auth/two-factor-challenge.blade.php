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
                        <p class="login-card-description">Please enter your authentication code to login.</p>
                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                            @csrf
                            <input type="text" name="code" id="code" class="form-control"/>
                            <input name="submit" id="submit" class="btn btn-block login-btn my-4" type="submit" value="Login">
                        </form>

                        <p class="login-card-description">Enter your recovery code.</p>
                        <form method="POST" action="{{ url('/two-factor-challenge') }}">
                            @csrf
                            <input type="text" name="recovery_code" id="code" class="form-control"/>
                            <input name="submit" id="submit" class="btn btn-block login-btn my-4" type="submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
