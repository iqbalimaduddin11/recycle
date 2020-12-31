<?php

use Illuminate\Support\Facades\Route;

// CRUD Nasabah

Route::get('/nasabah', 'NasabahController@index');
Route::get('/nasabah/create', 'NasabahController@createNasabah');
Route::get('/nasabah/{slug}', 'NasabahController@show');
Route::post('/nasabah', 'NasabahController@store');
Route::get('/nasabah/{id}/edit', 'NasabahController@editNasabah');
Route::put('/nasabah/{id}', 'NasabahController@update');
Route::delete('/nasabah/{id}', 'NasabahController@deleteNasabah');


// CRUD Pengurus 1
// CRUD Pengurus 2
// CRUD Bendahara
// CRUD Jenis Sampah & Harga