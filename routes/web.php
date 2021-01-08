<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'HomeController@setIndex');
Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail');