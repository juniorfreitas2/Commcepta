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

Route::resource('vendedores','VendedorController');
Route::resource('produtos','ProdutoController');
Route::resource('vendas','VendaController');
Route::post('vendas/finalizar', 'VendaController@finalizar')->name('vendas.finalizar');
Route::get('relatorio', 'VendaController@getRelatorio');

// API
Route::get('produtos/getinfo/{id}', 'ApiController@getInfoProduto');
Route::post('produtos/additem', 'ApiController@addItem');
