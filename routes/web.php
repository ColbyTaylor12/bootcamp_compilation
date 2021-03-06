<?php

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

Route::get('/clock', function () {
    return view('clock');
});

Route::get('/countdown', function () {
    return view('countdown');
});

Route::get('/tic-tac-toe', function () {
    return view('tic-tac-toe');
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/weather-app', function () {
    return view('weather-app');
});