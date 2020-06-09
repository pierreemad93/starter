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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Custom Auth */
Route::group(['namespace' => 'Auth' , 'middleware' => 'CheckAge'] , function (){
    Route::get('/adults' ,'CustomAuth@adult')-> name('adults');
    Route::get('/admin' ,'CustomAuth@admin')-> name('admin')->middleware('auth:admin');
    Route::get('/site' ,'CustomAuth@site')-> name('site')->middleware('auth:web');
});

Route::get('fillable','CrudController@getOffers');

Route::group(['prefix' => 'offers'] , function (){
    Route::post('store' , 'CrudController@store')->name('offer.store');
    Route::get('create' , 'CrudController@create');
});
