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

Route::get('/', function () {
    return view('base');
});

Route::resource('empresas','EmpresaController');
Route::resource('userapp','UserAppController');
Route::resource('cart','CartController');


// -------------------------------------- routes API ------------------------------------------//
Route::get('api/clientes/getlimitecredito/{idEmpresa}', 'Api\ClienteController@getLimiteCredito');
Route::get('api/clientes/getperfilcliente/{idEmpresa}', 'Api\ClienteController@getPerfilCliente');
Route::get('api/clientes/getrca/{idEmpresa}', 'Api\ClienteController@getRepresentantes');
Route::get('api/clientes/getpayments/{idEmpresa}', 'Api\ClienteController@getPagamentos');
Route::Post('api/clientes/getinstallments/{idEmpresa}', 'Api\ClienteController@getPrazos');
Route::Post('api/clientes/getprodutos/{idEmpresa}', 'Api\ClienteController@getProdutos');

//Route::post('empresas','EmpresaController');

