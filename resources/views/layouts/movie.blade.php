<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movie App</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}" class="flex items-center">
                        <img src="{{ asset('img/logo_movie.svg') }}" alt="" class="w-14">
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('main.index') }}" class="hover:text-gray-300" target="_blank">Main Page</a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">TV Show</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <div class="relative mt-3 md:mt-0">
                    <input type="text" placeholder="Search"
                           class="bg-gray-800 w-64 px-4 pl-8 py-1 rounded-full focus:outline-none focus:shadow-outline"/>
                    <div class="absolute top-0">
                        <svg class="h-4 w-4 text-gray-500 text-gray-500 mt-2 ml-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <circle cx="10" cy="10" r="7"/>
                            <line x1="21" y1="21" x2="15" y2="15"/>
                        </svg>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img class="rounded-full w-8 h-8" src="https://pbs.twimg.com/profile_images/1128143121475342337/e8tkhRaz_normal.jpg">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="border border-t border-gray-800">
        <div class="container mx-auto text-sm px-4 py-6">
            Powered by <a href="https://www.themoviedb.org/documentation/api" class="underline hover:text-gray-300">TMDb API</a>
        </div>
    </footer>
</body>
</html>
