<?php

Route::get('/carros', 'CarrosController@index')
            ->name('carros');
Route::get('/carros/criar', 'CarrosController@create')
            ->name('form_criar_carro');
Route::post('/carros/criar', 'CarrosController@store');
Route::DELETE('/carros/remover/{id}', 'CarrosController@destroy');
