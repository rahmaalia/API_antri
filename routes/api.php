<?php

use Illuminate\Http\Request;

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

Route::post('login', 'UserController@login');
Route::post("register", 'UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'UserController@details');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('v1/dokter', 'DokterController@index');
Route::post('data_pasien','DataPasienController@create');
Route::get('poli','PoliController@index');
Route::get('antri','AntriController@index');
Route::post('antri','AntriController@create');

