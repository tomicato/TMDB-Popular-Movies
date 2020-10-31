<div class="mt-8">

    <a href="{{ route('movies.show', $movie['id']) }}">
        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="poster"
             class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{ route('movies.show', $movie['id']) }}" class="mt-2 text-lg hover:text-gray-300">{{ $movie['title'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <svg class="h-3 w-3 text-yellow-500" width="24" height="24" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path
                    d="M12 17.75l-6.172 3.245 1.179-6.873-4.993-4.867 6.9-1.002L12 2l3.086 6.253 6.9 1.002-4.993 4.867 1.179 6.873z"/>
            </svg>

            <span class="ml-1"> {{ $movie['vote_average'] * 10 }}% </span>
            <span class="mx-2"> | </span>
            <span> {{  \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            @foreach($movie['genre_ids'] as $genre)
                {{ $genres->get($genre) }}
                @if (!$loop->last) , @endif
            @endforeach
            </div>
        </div>
</div>

