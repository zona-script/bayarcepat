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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/', function () {
    return [
        'success' => true,
        'message' => 'Api is running in port 80'
    ];
});

Route::group(['as' => 'api.'], function () {

    Route::group(['as' => 'local.', 'prefix' => 'harga', 'namespace' => 'Api\Harga'], function () {
        Route::get('/', 'HargaController@index');
        Route::get('/pulsa', 'HargaController@pulsa');
        Route::get('/pln', 'HargaController@pln');
        Route::get('/voucher-game', 'HargaController@voucherGame');
        Route::get('/internet', 'HargaController@internet');
        Route::get('/ewallet', 'HargaController@ewallet');
        Route::get('/sms-dan-telepon', 'HargaController@smsDanTelepon');
        Route::get('/pulsa-transfer', 'HargaController@pulsaTransfer');
        Route::get('/wifi', 'HargaController@wifi');
        Route::get('/gift-card', 'HargaController@giftCard');
    });
    Route::group(['as' => 'info.', 'prefix' => 'info', 'namespace' => 'Api\Info'], function () {
        Route::get('/', function () {

        });
        Route::get('/balance', 'BalanceController');
    });
    Route::group(['as' => 'local.', 'prefix' => 'local', 'namespace' => 'Api\Local'], function () {
        Route::get('/', 'ApiController@index');
    });
});
