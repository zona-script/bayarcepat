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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/', function () {
    return [
        'success' => true,
        'message' => 'Api is running in port 80',
        'data' => ''
    ];
});

Route::group(['as' => 'api.'], function () {

    // api untuk product
    Route::group(['as' => 'products.', 'prefix' => 'products', 'namespace' => 'Api\Products'], function () {
        Route::get('/social-media-marketing', 'SocialMediaMarketingController@index');
    });

    Route::group(['as' => 'users.', 'prefix' => 'users', 'namespace' => 'Api\Users'], function () {
        Route::get('/username', 'UsernameController@index');
    });

    Route::resource('send-money', 'SendMoney/HomeController');

    Route::group(['as' => 'info.', 'prefix' => 'info', 'namespace' => 'Api\Info'], function () {
        Route::get('/balance', 'BalanceController');
    });

    Route::group(['as' => 'local.', 'prefix' => 'local', 'namespace' => 'Api\Local'], function () {
        Route::get('/', 'ApiController@index');
    });
});
