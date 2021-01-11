<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'HomeController@setIndex');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');