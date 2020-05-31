<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/user/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/user/{id}/atualizar', 'UserController@update')->name('user.update');

    Route::get('/empresa/cadastrar', 'EmpresaController@create')->name('empresa.create');
    Route::get('/empresa', 'EmpresaController@index')->name('empresa.index');
    Route::post('/empresa/cadastrar', 'EmpresaController@store')->name('empresa.store');
    Route::get('/empresa/{id}}', 'EmpresaController@edit')->name('empresa.edit');
    Route::put('/empresa/{id}}', 'EmpresaController@update')->name('empresa.update');
    Route::get('/empresa/destroy/{id}}', 'EmpresaController@destroy')->name('empresa.destroy');
    Route::get('/empresa/ativar/{id}', 'EmpresaController@ativar')->name('empresa.ativar');

    Route::get('/ponto/{id}', 'PontoController@index')->name('ponto.index');
    Route::get('/ponto/registrar/ponto', 'PontoController@store')->name('ponto.store');
    Route::get('/ponto/registrar/{id}', 'PontoController@update')->name('ponto.update');

    Route::get('/relatorios/{id}', 'RelatorioController@index')->name('relatorio.index');
    Route::post('/relatorios/select', 'RelatorioController@relatorioSelect')->name('relatorio.select');
    Route::post('/relatorios/all/{id}', 'RelatorioController@relatorioAll')->name('relatorio.all');

    Route::get('/vincular', 'VinculoController@index')->name('vinculo.index');
    Route::post('/vincular', 'VinculoController@store')->name('vinculo.store');
    Route::get('/vinculos/{id}', 'VinculoController@show')->name('vinculo.show');
    Route::get('/vinculos/aceitar/{id}', 'VinculoController@aceitar')->name('vinculo.aceitar');
    Route::get('/vinculos/rejeitar/{id}', 'VinculoController@rejeitar')->name('vinculo.rejeitar');
    Route::get('/vinculos/finalizar/{id}}', 'VinculoController@finalizarVinculo')->name('vinculo.finalizar');
});

Auth::routes();
