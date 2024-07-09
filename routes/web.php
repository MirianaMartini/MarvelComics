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
    Session::flush();
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@create')->name('home');
Route::get('/home/{collection}/{user_id}', 'HomeController@open');
Route::get('/delete/{collection}', 'HomeController@destroy');

Route::get('/open/delete/{id_comic}/{id_collection}', 'OpenCollectionController@destroy');

Route::get('/search', 'SearchController@index')->name('search');
Route::post('/search', 'SearchController@api');
Route::post('/search/add', 'SearchController@add');

