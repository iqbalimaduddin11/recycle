<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Nasabah
Route::get('/nasabah', 'HomeController@index');
Route::post('/nasabah', 'HomeController@createNasabah');
Route::post('/nasabah', 'HomeController@storeNasabah');
Route::post('/nasabah', 'HomeController@createNasabah');
Route::post('/nasabah', 'HomeController@createNasabah');


Route::get('/admin', 'HomeController@setIndex');