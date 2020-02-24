<?php

Route::group(['as' => 'web.'], function () {
    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth:web', 'role:' . \App\Enums\RoleEnum::$roleAdmin],
        'namespace' => 'Admin'
    ], function () {
        Route::get('/', 'IndexController@index')->name('index');

        Route::group([
            'as' => 'saldo.',
            'prefix' => 'saldo',
            'namespace' => 'Saldo'
        ], function () {
            Route::get('/deposit', 'DepositController@index')->name('deposit.index');
            Route::get('/deposit/{trx_id}', 'DepositController@show')->name('deposit.show');
            Route::post('/deposit/{trx_id}', 'DepositController@update')->name('deposit.update');
            Route::get('/penarikan', 'PenarikanController@index')->name('penarikan.index');
            Route::get('/penarikan/{trx_id}', 'PenarikanController@show')->name('penarikan.show');
            Route::post('/penarikan/{trx_id}', 'PenarikanController@update')->name('penarikan.update');
        });
    });

});
