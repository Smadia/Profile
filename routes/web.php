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

Route::group(['as' => 'profile.'], function () {

    Route::get('/', [
        'uses' => 'ProfileController@index',
        'as' => 'index'
    ]);

    Route::get('portfolio', [
        'uses' => 'ProfileController@portfolio',
        'as' => 'portfolio'
    ]);

});

Route::group(['prefix' => 'smadadmin'], function () {
    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]);
});

Route::get('/smadadmin', function () {
    return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');