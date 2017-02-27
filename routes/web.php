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
    return view('index');
});
Auth::routes();

Route::get('/comic', 'ComicController@index');
//Route::get('/comic/read/{id}', 'ComicController@read');
Route::get('/comic/read/{id_comic}/page/{id_page}', 'ComicController@page');

//Grupo de rutas a las que se le aplica el middleware de auth
Route::group(['middleware' => 'auth'], function () {
    Route::get('/comic/new', 'ComicController@create');
    Route::post('/comic/new', 'ComicController@store')->name('comic.store');
    Route::get('/comic/edit/{id}', 'ComicController@edit');
    Route::post('/comic/update/{id}', 'ComicController@update')->name('comic.update');
    Route::post('/comic/delete/{id}', 'ComicController@delete')->name('comic.delete');
});

Route::get('/home', 'HomeController@index');
