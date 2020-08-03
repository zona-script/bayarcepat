<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['as' => 'apiweb.', 'namespace' => 'ApiWeb', 'middleware' => ['auth:web']], function () {
    Route::get('/', 'UserController');
    Route::get('/user', 'UserController');
    Route::get('/user/index', 'UserController@index');
    Route::get('/balance', 'BalanceController');
    Route::get('/contact', 'ContactController');

    // deprecated
    Route::get('/phonebook', 'PhonebookController');

    Route::group(['prefix' => 'products', 'as' => 'products.', 'namespace' => 'Products'], function () {
        Route::group(['prefix' => 'prepaid'], function () {
            Route::get('/', 'PrepaidController@index');
            Route::post('/', 'PrepaidController@store');
        });
        Route::group(['prefix' => 'postpaid'], function () {
            Route::get('/', 'PostpaidController@index');
            Route::post('/check', 'PostpaidController@checkbill');
            Route::post('/', 'PostpaidController@store');
        });
    });

    Route::post('/check-postpaid-bill', 'CheckPostpaidBillController')->name('check-postpaid-bill.index');
    Route::get('/check-postpaid-bill', 'CheckPostpaidBillController')->name('check-postpaid-bill.index.get');

});
