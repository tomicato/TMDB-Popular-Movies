<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fortify | Web') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    <style>
        #menu-toggle:checked + #responsive {
            display: block;
        }
    </style>

    @livewireStyles
</head>
<body>

@include('partial.header')


<!-- Content -->
<main>

    @yield('content')

    {{--@yield('content1')
    @yield('content2')--}}
</main>
<!-- /Content -->


@livewireScripts
<script>

    window.addEventListener('openModalShowPhotos', event => {
        const show_photos = document.getElementById('modal-show-photos');
        const show = document.querySelector('.modal-show');
        let pagination = document.querySelector('nav[role="navigation"]');
        show.classList.toggle('opacity-0');
        show.classList.toggle('pointer-events-none');
        show_photos.classList.toggle('modal-active-upd');
        if(pagination){
            pagination.classList.toggle('opacity-0');
        }



    });

    window.addEventListener('updatedPost', event => {
        const upd = document.getElementById('modal-window-update');
        const modal_upd = document.querySelector('.modal-upd');
        let pagination = document.querySelector('nav[role="navigation"]');
        modal_upd.classList.toggle('opacity-0');
        modal_upd.classList.toggle('pointer-events-none');
        upd.classList.toggle('modal-active-upd');
        if(pagination){
            pagination.classList.toggle('opacity-0');
        }



    });
</script>
</body>
</html>
