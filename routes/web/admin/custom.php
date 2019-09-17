<?php

Route::group(['prefix' => 'smadadmin/custom', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'CustomController@index',
        'as' => 'admin.custom.page'
    ]);

    Route::patch('/update/{custom}', [
        'uses' => 'CustomController@update',
        'as' => 'admin.custom.update'
    ]);

    Route::put('/store', [
        'uses' => 'CustomController@store',
        'as' => 'admin.custom.store'
    ]);
});