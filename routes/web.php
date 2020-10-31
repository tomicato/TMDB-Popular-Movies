<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('main.index');

Route::get('/home', function () {
    //dd(\Illuminate\Support\Facades\Auth::user());
    return view('home');
})->name('home.index')->middleware('auth', 'verified');

Route::resource('students', StudentController::class);

Route::get('/movies', [\App\Http\Controllers\MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [\App\Http\Controllers\MoviesController::class, 'show'])->name('movies.show');
