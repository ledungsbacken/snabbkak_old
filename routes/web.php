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


/*
    begin Views
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/recepies', function () {
    return view('recepies');
});
Route::get('/recepies/all', 'RecepieController@index');
Route::get('/results/{query}', function () {
    return view('results');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'access');
// Route::get('/recepies', 'HomeController@index')->name('recepies')->middleware('auth', 'access');
// Route::get('/results', 'HomeController@index')->name('results')->middleware('auth', 'access');
/*
    end Views
*/