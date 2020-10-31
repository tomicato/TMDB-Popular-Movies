<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')->json()['results'];
        //dump($popularMovies);

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')->json()['results'];

       // dump($nowPlayingMovies);

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        //dump($genresArray);

        $genres = collect($genresArray)->mapWithKeys(function ($value){
            return [$value['id'] => $value['name']];
        });

       // dump($genres);


        return view('frontend.movies.index',
            [
                'popularMovies' => $popularMovies,
                'genres' => $genres,
                'nowPlayingMovies' => $nowPlayingMovies,
            ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();
        //dump($movie);
        //$viewModel = new MovieViewModel($movie);

        return view('frontend.movies.show', compact('movie'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
