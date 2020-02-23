<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'web.'], function () {
    Route::get('/', 'WelcomeController@index')->name('index');

    Route::group(['prefix' => 'pages', 'as' => 'pages.', 'namespace' => 'Pages'], function () {
        Route::get('/produk', 'PagesController@product')->name('produk');
        Route::get('/syarat-dan-ketentuan', 'PagesController@tos')->name('syarat-dan-ketentuan');
        Route::get('/policy-privacy', 'PagesController@privacyPolicy')->name('policy-privacy');
        Route::get('/tentang-kami', 'PagesController@aboutMe')->name('tentang-kami');

    });
});

Auth::routes();
//Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
