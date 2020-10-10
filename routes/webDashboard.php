<?php

use App\Http\Controllers\Dashboard\SendMoney\HomeController;

Route::group(['as' => 'web.'], function () {
    Route::group([
        'as' => 'dashboard.',
        'prefix' => 'dashboard',
        'middleware' => ['auth:sanctum'],
        'namespace' => 'Dashboard'
    ], function () {
        Route::get('/', 'DashboardController@index')->name('index');
        Route::post('/', 'DashboardController@update')->name('update');
        Route::post('/verified', 'DashboardController@verified')->name('verified');

        Route::group(['prefix' => 'send-money', 'as' => 'send-money.', 'namespace' => 'SendMoney'], function () {
            Route::get('/', [HomeController::class, 'index'])
                ->name('index')
                ->middleware('option:sendmoney,1');
            Route::post('/', [HomeController::class, 'store'])
                ->name('store')
                ->middleware('option:sendmoney,1');
            Route::resource('/history', 'HistoryController');
        });

        Route::group(['prefix' => 'prepaid', 'as' => 'prepaid.', 'namespace' => 'Prepaid'], function () {
            Route::get('/', 'PrepaidController@index')
                ->name('index')
                ->middleware('option:prepaid,1');
            Route::get('/history', 'HistoryController@index')->name('history');
        });

        Route::group(['prefix' => 'postpaid', 'as' => 'postpaid.', 'namespace' => 'Postpaid'], function () {
            Route::get('/', 'PostpaidController@index')
                ->name('index')
                ->middleware('option:postpaid,1');;
            Route::get('/history', 'HistoryController@index')->name('history');
        });

        Route::group(['prefix' => 'social-media-marketing', 'as' => 'social-media-marketing.', 'namespace' => 'SocialMediaMarketing'], function () {
            Route::get('/', 'SMMController@index')
                ->name('index')
                ->middleware('option:smm,1');;
            Route::get('/history', 'HistoryController@index')->name('history');
        });

        Route::group(['prefix' => 'balance', 'as' => 'balance.', 'namespace' => 'Balance'], function () {
            Route::resource('/history', 'HistoryDepositAndWithdrawalController');
            Route::get('/withdrawal', 'WithdrawalController@create')
                ->name('withdrawal.create')
                ->middleware('option:withdrawal,1');
            Route::post('/withdrawal', 'WithdrawalController@store')->name('withdrawal.store');

            Route::get('/deposit', 'DepositController@index')
                ->name('deposit.index')
                ->middleware('option:deposit,1');
            Route::get('/deposit/create', 'DepositController@create')->name('deposit.create');
            Route::post('/deposit/create', 'DepositController@store')->name('deposit.store');
        });

        Route::resource('/bank', 'Bank\HomeController');
        Route::resource('contact', 'ContactController');

        Route::group(['prefix' => 'developer-api', 'as' => 'api.', 'namespace' => 'Api'], function () {
            Route::get('/', 'HomeController@index')->name('index');
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Profile'], function () {
            Route::get('/', 'HomeController@index')->name('index');
            Route::post('/', 'ChangePasswordController@update')->name('password.update');
        });

        Route::resource('refferal', 'Refferal\RefferalController')->only('index');

        Route::group(['prefix' => 'setting', 'as' => 'pengaturan.', 'namespace' => 'Setting'], function () {
            Route::get('/', 'HomeController@index')->name('index');
            Route::post('/', 'HomeController@update')->name('update');
        });
    });

});
