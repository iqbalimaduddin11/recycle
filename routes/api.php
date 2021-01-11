<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Login & Register Nasabah, Pengurus 1/2, Bendahara
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('/forget', 'UserController@forgotPassword');

Route::group(['middleware' => ['jwt.verify']], function () {
    // User
    Route::get('/getAuthenticatedUser', 'UserController@getAuthenticatedUser');
    Route::get('/user/{id}', 'UserDetailController@getUser');
    Route::post('/user/detail', 'UserDetailController@setUser');
    Route::post('/user/update/{id}', 'UserDetailController@updateUser');
    Route::post('/user/delete', 'UserDetailController@destroyUser');
    Route::get('/logout', 'UserController@logout');
    
    //penjemputan sampah
    Route::post('/penjemputan/{id}', 'PenjemputanController@createPenjemputan');
});


Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');









// Route::patch('user/password/{id}', 'UserController@changePassword');