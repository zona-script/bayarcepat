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

        Route::group(['prefix' => 'prepaid', 'as' => 'prepaid.', 'namespace' => 'Prepaid'], function () {
            Route::get('/', 'PrepaidController@index')->name('index');
            Route::view('/history', 'dashboard.prepaid.history.index');
//            Route::get('/history', 'HistoryController@index')->name('history.index');
        });

        Route::group(['prefix' => 'postpaid', 'as' => 'postpaid.', 'namespace' => 'Postpaid'], function () {
            Route::get('/', 'PostpaidController@index')->name('index');
        });

        Route::group(['prefix' => 'social-media-marketing', 'as' => 'social-media-marketing.', 'namespace' => 'SocialMediaMarketing'], function () {
            Route::get('/', 'SMMController@index')->name('index');
        });

        Route::resource('/send-money', 'SendMoney\HomeController');


//        Route::group(['prefix' => 'market', 'as' => 'market.', 'namespace' => 'Market'], function () {
//            Route::get('/', 'HomeController@index')->name('index');
//            Route::group(['prefix' => 'prabayar', 'as' => 'prabayar.'], function () {
//                Route::get('/', 'PrabayarController@index')->name('index');
//                Route::post('/', 'PrabayarController@store')->name('store');
//            });
//            Route::group(['prefix' => 'pascabayar', 'as' => 'pascabayar.'], function () {
//                Route::get('/', 'PascabayarController@index')->name('index');
//            });
//        });

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

//        Route::group(['prefix' => 'kirim-uang', 'as' => 'kirim-uang.', 'namespace' => 'SendMoney'], function () {
//            Route::get('/', 'HomeController@index')->name('index');
//            Route::post('/', 'HomeController@store')->name('store');
//            Route::post('/send', 'HomeController@store')->name('store');
//        });

        Route::group(['prefix' => 'cetak-struk', 'as' => 'cetak-struk.', 'namespace' => 'PrintInvoice'], function () {
            Route::get('/', 'HomeController@index')->name('index');
        });

        Route::resource('contact', 'ContactController');
        Route::resource('refferal', 'Refferal\RefferalController')->only('index');

        Route::group(['prefix' => 'pengaturan', 'as' => 'pengaturan.', 'namespace' => 'Setting'], function () {
            Route::get('/', 'HomeController@index')->name('index');
            Route::post('/', 'HomeController@update')->name('update');
        });

        Route::get('/riwayat', 'RiwayatController@index')->name('riwayat.index');
        Route::get('/riwayat/{id}', 'RiwayatController@show')->name('riwayat.show');

        Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api'], function () {
            Route::get('/', 'HomeController@index')->name('index');
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Profile'], function () {
            Route::get('/', 'HomeController@index')->name('index');
            Route::post('/', 'ChangePasswordController@update')->name('password.update');
        });
    });

});
