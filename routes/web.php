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
    Route::get('/', function () {
        return view('welcome');
    })->name('index');

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::get('/produk', function () {
            return view('pages.produk');
        })->name('produk');

        Route::get('/syarat-dan-ketentuan', function (){
            return view('pages.tos');
        })->name('syarat-dan-ketentuan');

        Route::get('/policy-privacy', function (){
            return view('pages.policy-privacy');
        })->name('policy-privacy');

        Route::get('/tentang-kami', function () {
            return view('pages.tentang-kami');
        })->name('tentang-kami');

    });
});

Auth::routes();
//Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
