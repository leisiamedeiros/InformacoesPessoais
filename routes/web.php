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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('home', 'EnderecoController@listar')->name('home');
    Route::get('dados', 'DadosPessoaisController@listar')->name('exibir');
    Route::post('dados/novo', 'DadosPessoaisController@gravar')->name('gravar');
    Route::get('dados/{id}/apagar', 'DadosPessoaisController@remover')->name('dados.apagar');
    Route::get('endereco/novo', 'EnderecoController@criar')->name('endereco.novo');
    Route::post('endereco/novo', 'EnderecoController@gravar')->name('criar');
    Route::get('endereco/{id}/editar', 'EnderecoController@editar')->name('editar');
    Route::put('endereco/{id}/editar', 'EnderecoController@atualizar')->name('atualizar');
    Route::get('endereco/{id}/apagar', 'EnderecoController@apagar')->name('apagar');
});
