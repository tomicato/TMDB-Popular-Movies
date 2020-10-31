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
                        <p class="login-card-description">Зарегистрировать новый аккаунт</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="sr-only">Имя</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Имя">

                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email адрес">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Пароль</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Пароль">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password-confirm" class="sr-only">Подтвердить пароль</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Повторите пароль">
                            </div>
                            <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit" value="Регистрация">
                        </form>
                        <a href="{{ route('password.request') }}" class="forgot-password-link">Забыли пароль?</a>
                        <p class="login-card-footer-text">Уже имеется аккаунт? <a href="{{ route('login') }}" class="text-reset">Войти здесь</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#!">Условия сайта.</a>
                            <a href="#!">Политика конфиденциальности</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
