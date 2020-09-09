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
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::group(['as' => 'web.'], function () {
    Route::get('/', 'WelcomeController@index')->name('index');

    Route::group(['prefix' => 'pages', 'as' => 'pages.', 'namespace' => 'Pages'], function () {

        Route::group(['prefix' => 'products', 'as' => 'products.', 'namespace' => 'Products'], function () {
            Route::get('/prepaid', 'PrepaidController')->name('prepaid');
            Route::get('/postpaid', 'PostpaidController')->name('postpaid');
            Route::get('/social-media-marketing', 'SMMController')->name('smm');
        });

        Route::group(['prefix' => 'produk', 'as' => 'produk.', 'namespace' => 'Produk'], function () {
            Route::get('/', 'HomeController@product')->name('index');
            Route::get('/harga-pulsa-paypal-murah', 'HargaController@pulsa')->name('harga.pulsa');
            Route::get('/harga-token-pln-termurah', 'HargaController@pln')->name('harga.pln');
            Route::get('/harga-paket-data-semua-operator-termurah', 'HargaController@internet')->name('harga.paket-data');
            Route::get('/harga-wifi-dan-voucher-wifi', 'HargaController@wifi')->name('harga.wifi');
            Route::get('/harga-paket-nelfon-dan-sms-termurah', 'HargaController@nelfonSms')->name('harga.nelfon-sms');
            Route::get('/harga-gift-card-playstore-dan-itunes', 'HargaController@giftCard')->name('harga.gift-card');
            Route::get('/harga-voucher-game-online', 'HargaController@voucherGame')->name('harga.game-online');
            Route::get('/harga-isi-saldo-gojek-grab-dana-gopay-ovo-linkaja-termurah', 'HargaController@ewallet')->name('harga.ewallet');
        });

        Route::get('/pricing', 'MarketPricingController')->name('market.index');

        Route::get('/syarat-dan-ketentuan', 'PagesController@tos')->name('syarat-dan-ketentuan');
        Route::get('/policy-privacy', 'PagesController@privacyPolicy')->name('policy-privacy');
        Route::get('/tentang-kami', 'PagesController@aboutMe')->name('tentang-kami');
        Route::get('/hubungi-kami', 'PagesController@contactMe')->name('hubungi-kami');
        Route::get('/membership', 'PagesController@membership')->name('membership');
        Route::get('/metode-pembayaran', 'PagesController@paymentMethod')->name('payment-method');
    });

    Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap');
});

//Auth::routes();
Auth::routes([
    'verify' => true,
    'register' => true
]);
Route::get('/home', 'HomeController@index')->name('home');
