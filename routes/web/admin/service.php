<?php

Route::group(['prefix' => 'smadadmin/service', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'ServiceController@index',
        'as' => 'admin.service.page'
    ]);

    Route::patch('/update/{service}', [
        'uses' => 'ServiceController@update',
        'as' => 'admin.service.update'
    ]);

    Route::delete('/delete/{service}', [
        'uses' => 'ServiceController@destroy',
        'as' => 'admin.service.delete'
    ]);

    Route::put('/store', [
        'uses' => 'ServiceController@store',
        'as' => 'admin.service.store'
    ]);
});