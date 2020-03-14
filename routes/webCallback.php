<?php

Route::group(['prefix' => 'callback-from-partner', 'namespace' => 'Callback'], function () {
    Route::get('/', 'CallbackController');
    Route::post('/javah2h', 'JavaH2HController');
    Route::get('/javah2h', 'JavaH2HController');
    Route::post('/digiflazz', 'DigiflazzController');
    Route::get('/digiflazz', 'DigiflazzController');
});
