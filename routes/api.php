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
Route::post('/cadastro', 'UserController@registrar');

//Route::group(['middleware' => ['auth:api']], function() {
//
//    Route::resource('veiculos', 'VeiculoController');
//});

Route::group(['middleware' => ['auth:api']], function() {

    Route::get('/veiculos', 'VeiculoController@index')->middleware('scope:administrador,usuario');
    Route::get('/veiculos/{id}', 'VeiculoController@show')->middleware('scope:administrador,usuario');
    Route::get('/veiculos?page{page}&qtd{qtd}', 'VeiculoController@index')->middleware('scope:administrador,usuario');
    Route::post('/veiculos', 'VeiculoController@store')->middleware('scope:administrador');
    Route::put('/veiculos/{id}', 'VeiculoController@update')->middleware('scope:administrador');
    Route::delete('/veiculos/{id}', 'VeiculoController@destroy')->middleware('scope:administrador');
});
