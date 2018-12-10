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
    return view('welcome');
});





Route::group(['middleware' => 'auth'], function () {
    
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
Route::group(['prefix'=>'habitos', 'where'=>['id'=>'[0-9]+']], function(){
    Route::any('',              ['as'=>'habitos',           'uses'=>'HabitosController@index']);
    Route::get('relatorio',     ['as'=>'habitos.relatorio', 'uses'=>'HabitosController@geraPdf']);
    Route::get('create',        ['as'=>'habitos.create',    'uses'=>'HabitosController@create']);
    Route::get('{id}/destroy',  ['as'=>'habitos.destroy',   'uses'=>'HabitosController@destroy']);
    Route::get('{id}/edit',     ['as'=>'habitos.edit',      'uses'=>'HabitosController@edit']);
    Route::put('{id}/update',   ['as'=>'habitos.update',    'uses'=>'HabitosController@update']);
    Route::post('store',        ['as'=>'habitos.store',     'uses'=>'HabitosController@store']);

});

Route::group(['prefix'=>'historicos', 'where'=>['id'=>'[0-9]+']], function(){
    Route::get('',              ['as'=>'historicos',           'uses'=>'HistoricosController@index']);
    Route::get('create',        ['as'=>'historicos.create',    'uses'=>'HistoricosController@create']);
    Route::get('{id}/destroy',  ['as'=>'historicos.destroy',   'uses'=>'HistoricosController@destroy']);
    Route::get('{id}/edit',     ['as'=>'historicos.edit',      'uses'=>'HistoricosController@edit']);
    Route::put('{id}/update',   ['as'=>'historicos.update',    'uses'=>'HistoricosController@update']);
    Route::post('store',        ['as'=>'historicos.store',     'uses'=>'HistoricosController@store']);

    Route::get('createmaster',  ['as'=>'historicos.createmaster',  'uses'=>'HistoricosController@createmaster']);
    Route::post('masterdetail', ['as'=>'historicos.masterdetail',  'uses'=>'HistoricosController@masterdetail']);

});

Route::group(['prefix'=>'alimentos', 'where'=>['id'=>'[0-9]+']], function(){
    Route::any('',              ['as'=>'alimentos',           'uses'=>'AlimentosController@index']);
    Route::get('create',        ['as'=>'alimentos.create',    'uses'=>'AlimentosController@create']);
    Route::get('{id}/destroy',  ['as'=>'alimentos.destroy',   'uses'=>'AlimentosController@destroy']);
    Route::get('{id}/edit',     ['as'=>'alimentos.edit',      'uses'=>'AlimentosController@edit']);
    Route::put('{id}/update',   ['as'=>'alimentos.update',    'uses'=>'AlimentosController@update']);
    Route::post('store',        ['as'=>'alimentos.store',     'uses'=>'AlimentosController@store']);
});

Route::group(['prefix'=>'categorias', 'where'=>['id'=>'[0-9]+']], function(){
    Route::any('',              ['as'=>'categorias',           'uses'=>'CategoriasController@index']);
    Route::get('create',        ['as'=>'categorias.create',    'uses'=>'CategoriasController@create']);
    Route::get('{id}/destroy',  ['as'=>'categorias.destroy',   'uses'=>'CategoriasController@destroy']);
    Route::get('{id}/edit',     ['as'=>'categorias.edit',      'uses'=>'CategoriasController@edit']);
    Route::put('{id}/update',   ['as'=>'categorias.update',    'uses'=>'CategoriasController@update']);
    Route::post('store',        ['as'=>'categorias.store',     'uses'=>'CategoriasController@store']);
});

Route::group(['prefix'=>'nivels', 'where'=>['id'=>'[0-9]+']], function(){
    Route::any('',              ['as'=>'nivels',           'uses'=>'NivelController@index']);
    Route::get('create',        ['as'=>'nivels.create',    'uses'=>'NivelController@create']);
    Route::get('{id}/destroy',  ['as'=>'nivels.destroy',   'uses'=>'NivelController@destroy']);
    Route::get('{id}/edit',     ['as'=>'nivels.edit',      'uses'=>'NivelController@edit']);
    Route::put('{id}/update',   ['as'=>'nivels.update',    'uses'=>'NivelController@update']);
    Route::post('store',        ['as'=>'nivels.store',     'uses'=>'NivelController@store']);
});

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
