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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pessoa/fisica/registrar','PersonController@registerPerson');
Route::post('/pessoa/fisica/adicionar/{id}','PersonController@updatePerfil')->where('id','[0-9]+');
Route::get('/perfil','PersonController@Perfil')->name('perfil');

Route::get('/veiculo','VehicleController@getVehicle'); 
Route::get('/veiculo/registrar','VehicleController@registerVehicle');
Route::get('/veiculo/alterar/{id}','VehicleController@upVehicle')->where('id','[0-9]+');
Route::post('/veiculo/update/{id}','VehicleController@update')->where('id','[0-9]+');
Route::get('/veiculo/remover/{id}','VehicleController@delVehicle')->where('id','[0-9]+');
Route::post('/veiculo/adicionar','VehicleController@addVehicle');

Route::get('/veiculo/servico/{id}', 'ServiceController@getService')->where('id','[0-9]+');
Route::get('/veiculo/servico/registrar/{id}','ServiceController@registerService')->where('id','[0-9]+');
Route::post('/veiculo/servico/adicionar/{id}','ServiceController@addService')->where('id','[0-9]+');
Route::get('/veiculo/servico/view/{id}', 'ServiceController@getServiceVehicle')->where('id','[0-9]+');

