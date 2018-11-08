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

Route::get('/','AdsController@index');

Route::get('/edit',function(){
    return view('edit');
})->name('CreateAd')->middleware('auth');

Route::post('edit','AdsController@create')->name('create');

Route::get('/edit/{id}','AdsController@edit')->middleware('auth');

Route::post('/edit/{id}','AdsController@update');

Route::delete('/delete/{id}','AdsController@delete')->name('delete')->middleware('auth');

Route::get('/{id}','AdsController@show');


Route::post('logout', 'Auth\AuthController@logout')->name('logout');

Route::post('/','Auth\AuthController@auth')->name('auth');


Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound']);
Route::get('500', ['as' => '500', 'uses' => 'ErrorController@fatal']);

