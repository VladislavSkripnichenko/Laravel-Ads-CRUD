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

Route::get('/edit', function () {
    return view('create');
});

Route::get('/edit/{id}', function () {
    return view('edit');
});

Route::get('/{id}', function () {
    return view('ad');
});

Route::post('logout', 'Auth\AuthController@logout')->name('logout');

Route::post('/','Auth\AuthController@auth')->name('auth');

Route::get('/home', 'HomeController@index')->name('home');
