<?php

Route::group(['middleware' => 'auth'], function () {
    
    //ETC
    View::composer('base', 'CategoryComposer');
    Route::resource('/','HomeController');
    Route::get('user/profile', function () {});
    Route::get('getCidades/{id}', 'HomeController@getCidades');

    //PRODUTOS
    Route::resource('produto','ProdutoController');

    //PAGAMENTOS
    Route::resource('pagamento','PagamentoController');
    Route::get('pagamento/{id}/destroy', 'PagamentoController@destroy');

    //FORNECEDORES
    Route::resource('fornecedor','FornecedorController');
    Route::get('fornecedor/{id}/destroy', 'FornecedorController@destroy');
    
    //AGENDA
    Route::resource('agenda','AgendaController');
    Route::get('agenda/{id}/destroy', 'AgendaController@destroy');
    
    //FUNCIONÁRIOS E HONORÁRIOS
    Route::resource('horario','ControleHorarioController');
    Route::resource('funcionario','FuncionarioController');
    Route::post('calcularHoras','ControleHorarioController@valorHora');
    Route::get('pagar/{id}','ControleHorarioController@horas');
    Route::get('horario/arquivar/{id}','ControleHorarioController@arquivar');
    Route::get('/honorario','HomeController@honorarios');
    Route::get('honorario/pago/{id}','HomeController@pagar');

    //NOTAS E ITENS DA NOTA
    Route::resource('nota','NotaController');
    Route::post('item/create','ItemNotaController@store');
    Route::post('item/update','ItemNotaController@update');
    Route::get('item/{nota}','ItemNotaController@index');
    Route::get('item/destroy/{id}','ItemNotaController@destroy');
    Route::get('item/{id}/edit','ItemNotaController@edit');

    //RELATÓRIOS
    Route::get('relatorioNotas','RelatoriosController@nota');
    Route::get('pagamentos','RelatoriosController@pagamentos');
    Route::get('produtos','RelatoriosController@produtos');
    Route::post('total','RelatoriosController@totalNota');
    Route::post('totalPagamentos','RelatoriosController@totalPagamentos');
    Route::post('totalProdutos','RelatoriosController@totalProdutos');

});

Route::auth();
