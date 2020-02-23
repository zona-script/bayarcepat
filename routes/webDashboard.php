<?php

Route::group(['as' => 'web.'], function () {
    Route::group([
        'as' => 'dashboard.',
        'prefix' => 'dashboard',
        'middleware' => ['auth:web'],
        'namespace' => 'Dashboard'
    ], function () {
        Route::get('/', 'DashboardController@index')->name('index');
        Route::post('/', 'DashboardController@update')->name('update');
        Route::post('/verified', 'DashboardController@verified')->name('verified');

        Route::group(['prefix' => 'saldo', 'as' => 'saldo.', 'namespace' => 'Saldo'], function () {
            Route::get('/tarik', 'WithdrawalController@create')->name('tarik.create');
            Route::post('/tarik', 'WithdrawalController@store')->name('tarik.store');

            Route::get('/deposit', 'DepositController@index')->name('deposit.index');
            Route::get('/deposit/create', 'DepositController@create')->name('deposit.create');
            Route::post('/deposit/create', 'DepositController@store')->name('deposit.store');
        });

        Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.'], function () {
            Route::get('/', 'TransaksiController@index')->name('index');
            Route::post('/', 'TransaksiController@store')->name('store');
        });

        Route::group(['prefix' => 'kirim-uang', 'as' => 'kirim-uang.'], function () {
            Route::get('/', function () {
                return view('dashboard.kirim-uang.index');
            })->name('index');
        });

        Route::group(['prefix' => 'cetak-struk', 'as' => 'cetak-struk.'], function () {
            Route::get('/', function () {
                return view('dashboard.cetak-struk.index');
            })->name('index');
        });

        Route::group(['prefix' => 'pengaturan', 'as' => 'pengaturan.'], function () {
            Route::get('/', function () {
                return view('dashboard.pengaturan.index');
            })->name('index');
        });

        Route::get('/riwayat', 'RiwayatController@index')->name('riwayat.index');
        Route::get('/riwayat/{id}', 'RiwayatController@show')->name('riwayat.show');

        Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
            Route::get('/', function () {
                return view('dashboard.api.index');
            })->name('index');
        });

        Route::get('/profile', function () {
            return view('dashboard.profile.index');
        })->name('profile');
    });

});
