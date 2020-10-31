<!-- NavBar -->
<nav class="flex items-center justify-between flex-wrap bg-blue-400 p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a href="{{ route('main.index') }}" class="inline-flex">
            <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/>
            </svg>
            <span class="font-semibold text-xl tracking-tight">Fortify</span>
        </a>
    </div>

    <label for="menu-toggle" class="pointer-cursor lg:hidden block">
        <svg class="text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>
                menu</title>
            <path fill="#ffffff" d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle"/>

    <div id="responsive" class="hidden w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="lg:flex-grow text-base w-2/5">
            <a href="{{ route('main.index') }}"
               class="lg:p-4 py-3 px-2 block border-b-2  border-transparent hover:border-white  @if(Route::currentRouteName() == 'main.index') border-white  @endif block mt-4 lg:inline-block lg:mt-0 text-gray-100 hover:text-white mr-4">
                Главная
            </a>
            {{--<a href="{{ route('home.index') }}"
               class="lg:p-4 py-3 px-2 block border-b-2  border-transparent hover:border-white @if(Route::currentRouteName() == 'home') border-white  @endif   block mt-4 lg:inline-block  text-gray-100 lg:mt-0  hover:text-white mr-4">
                Домашняя
            </a>--}}
            <a href="{{ route('students.index') }}"
               class="lg:p-4 py-3 px-2 block border-b-2  border-transparent hover:border-white  @if(Route::currentRouteName() == 'students.index')  border-white  @endif block mt-4 lg:inline-block text-gray-100 lg:mt-0 hover:text-white mr-4">
                Студенты
            </a>
            <a href="{{ route('movies.index') }}"
               class="lg:p-4 py-3 px-2 block border-b-2  border-transparent hover:border-white  @if(Route::currentRouteName() == 'movies.index')  border-white  @endif block mt-4 lg:inline-block text-gray-100 lg:mt-0 hover:text-white mr-4">
                Фильмы
            </a>
        </div>

        @if(Auth::user())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="sm:flex sm:items-center md:block lg:flex lg:items-center my-3">
                    <a href="#" class="lg:px-4 flex items-center justify-start lg:my-0  pointer-cursor">
                        <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400"
                             src="https://pbs.twimg.com/profile_images/1128143121475342337/e8tkhRaz_normal.jpg"
                             title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}">
                    </a>
                    <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"
                       href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                        Выход
                    </a>
                </div>
            </form>
        @else
            <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"
               href="{{ route('login') }}">
                Вход
            </a>
        @endif

    </div>
</nav>
<!-- /NavBar -->
