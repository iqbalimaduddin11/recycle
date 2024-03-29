<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => ['jwt.verify']], function () {
    //Nasabah
    Route::get('/nasabah', 'HomeController@getNasabah');
    Route::get('/nasabah/create', 'HomeController@createNasabah');
    Route::get('/nasabah/{slug}', 'HomeController@showNasabah');
    Route::post('/nasabah', 'HomeController@storeNasabah');
    Route::get('/nasabah/{id}/edit', 'HomeController@editNasabah');
    Route::put('/nasabah/{id}', 'HomeController@updateNasabah');
    Route::delete('/nasabah/{id}', 'HomeController@deleteNasabah');

//Pengurus 1
    Route::get('/pengurus1', 'HomeController@getPengurus1');
    Route::get('/pengurus1/create', 'HomeController@createPengurus1');
    Route::get('/pengurus1/{slug}', 'HomeController@showPengurus1');
    Route::post('/pengurus1', 'HomeController@storePengurus1');
    Route::get('/pengurus1/{id}/edit', 'HomeController@editPengurus1');
    Route::put('/pengurus1/{id}', 'HomeController@updatePengurus1');
    Route::delete('/pengurus1/{id}', 'HomeController@deletePengurus1');

//Pengurus 2
    Route::get('/pengurus2', 'HomeController@getPengurus2');
    Route::get('/pengurus2/create', 'HomeController@showPengurus2');
    Route::get('/pengurus2/{slug}', 'HomeController@showPengurus2');
    Route::post('/pengurus2', 'HomeController@storePengurus2');
    Route::get('/pengurus2/{id}/edit', 'HomeController@editPengurus2');
    Route::put('/pengurus2/{id}', 'HomeController@updatePengurus2');
    Route::delete('/pengurus2/{id}', 'HomeController@deletePengurus2');

//Bendahara
    Route::get('/bendahara', 'HomeController@getBendahara');
    Route::get('/bendahara/create', 'HomeController@showBendahara');
    Route::get('/bendahara/{slug}', 'HomeController@showBendahara');
    Route::post('/bendahara', 'HomeController@storeBendahara');
    Route::get('/bendahara/{id}/edit', 'HomeController@editBendahara');
    Route::put('/bendahara/{id}', 'HomeController@updateBendahara');
    Route::delete('/bendahara/{id}', 'HomeController@deleteBendahara');
// });

Route::get('/admin', 'HomeController@setIndex');
