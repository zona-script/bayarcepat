<?php

Route::group(['prefix' => 'callback-from-partner', 'namespace' => 'Callback'], function () {
    Route::post('/javah2h', 'Javah2hController');
    Route::get('/javah2h', 'Javah2hController');
});
