<?php

Route::group(['as' => 'web.'], function () {
    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth:web', 'role:' . \App\Enums\RoleEnum::$roleAdmin],
        'namespace' => 'Admin'
    ], function () {
        Route::get('/', 'IndexController@index');
    });

});
