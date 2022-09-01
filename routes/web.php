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

Route::get('/{any}', function () {
    return view('app');
})->where('any', '(.*)');

Route::post('/login', 'Auth\LoginController@login');
Route::post('/verification', 'Auth\LoginController@verification');

Route::post('/complete', 'Auth\RegisterController@complete');
Route::post('/identify', 'Auth\RegisterController@identify');
Route::post('/registration', 'Auth\RegisterController@registration');
