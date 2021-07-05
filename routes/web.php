<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [logincontroller::class, 'login'])->name('login');

Route::post('/login', [logincontroller::class, 'checklogin']);

Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');

Route::get('/register', [registercontroller::class, 'check'])->name('register');

Route::post('/register', [registercontroller::class, 'checkregister']);

Route::get('/home', [homecontroller::class, 'index'])->name('home');

Route::get('/newshome', [newscontroller::class, 'index'])->name('newshome');

Route::get('/podcast', [podcastcontroller::class, 'index'])->name('podcast');

Route::get('/podcast/carica_podcast', [podcastcontroller::class, 'caricapodcast'])->name('carica_podcast');

Route::get('/news', [newscontroller::class, 'news'])->name('news');

Route::get('/newsmodal/{news}', [newscontroller::class, 'newsmodal'])->name('newsmodal');

Route::get('/gare', [garecontroller::class, 'index'])->name('gare');

Route::get('/caricagare', [garecontroller::class, 'gare'])->name('caricagare');

Route::get('/commenti', [commenticontroller::class, 'commenti'])->name('commenti');

Route::get('/aggiungicommenti/{commento}/{id}', [commenticontroller::class, 'aggiungicommenti'])->name('aggiungicommenti');












