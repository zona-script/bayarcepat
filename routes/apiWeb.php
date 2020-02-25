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
});
