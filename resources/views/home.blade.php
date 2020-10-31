@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters" >
                <div class="col-md-5">
                    <img src="/img/login.jpg" alt="login" class="img-fluid login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        @if(!auth()->user()->two_factor_secret)
                            У Вас нет двухфакторной аутентификации
                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary mt-5">Включить</button>
                                <a href="{{ route('main.index') }}">
                                    <button type="button" class="btn btn-outline-success mt-5">Отказаться и перейти на сайт</button>
                                </a>
                            </form>
                        @else
                            У Вас присутствует двухфакторная аутентификация!
                            <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary mt-5">Отключить</button>
                            </form>
                        @endif

                        @if(session('status') == 'two-factor-authentication-enabled')
                            <p>You have now enabled 2fa, please scan the following QR code
                                into your phone authenticator application.</p>

                            {!! auth()->user()->twoFactorQrCodeSvg() !!}

                            {{--<p>Please, store theses recovery codes in a secure location.</p>
                            @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                                {{ trim($code) }} <br>
                            @endforeach--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
