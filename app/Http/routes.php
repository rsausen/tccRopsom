<?php

Route::group(['middleware' => 'auth'], function () {
    View::composer('base', 'CategoryComposer');
    Route::resource('/','HomeController');
    Route::resource('produto','ProdutoController');
    Route::resource('pagamento','PagamentoController');
    Route::resource('fornecedor','FornecedorController');
    Route::get('fornecedor/{id}/destroy', 'FornecedorController@destroy');
    Route::resource('agenda','AgendaController');
    Route::get('agenda/{id}/destroy', 'AgendaController@destroy');
    Route::resource('nota','NotaController');
    Route::resource('horario','ControleHorarioController');
    Route::get('horario/arquivar/{id}','ControleHorarioController@arquivar');    
    Route::post('calcularHoras','ControleHorarioController@valorHora');
    Route::get('pagar/{id}','ControleHorarioController@horas');
    Route::resource('funcionario','FuncionarioController');
    Route::get('/honorario','HomeController@honorarios');
    Route::get('honorario/pago/{id}','HomeController@pagar');

    Route::get('item/{nota}','ItemNotaController@index');
    Route::post('item/create','ItemNotaController@store');
    Route::get('item/destroy/{id}','ItemNotaController@destroy');
    Route::get('item/{id}/edit','ItemNotaController@edit');
    Route::post('item/update','ItemNotaController@update');

    //RELATÓRIOS
    Route::get('relatorioNotas','RelatoriosController@nota');
    Route::post('total','RelatoriosController@totalNota');
    Route::get('pagamentos','RelatoriosController@pagamentos');
    Route::post('totalPagamentos','RelatoriosController@totalPagamentos');
    Route::get('produtos','RelatoriosController@produtos');
    Route::post('totalProdutos','RelatoriosController@totalProdutos');

    
    Route::get('user/profile', function () {
    });
    Route::get('getCidades/{id}', 'HomeController@getCidades');
});

Route::auth();
