<?php

Route::group(['prefix' => 'smadadmin/client', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'ClientController@index',
        'as' => 'admin.client.page'
    ]);

    Route::patch('/update/{client}', [
        'uses' => 'ClientController@update',
        'as' => 'admin.client.update'
    ]);

    Route::put('/store', [
        'uses' => 'ClientController@store',
        'as' => 'admin.client.store'
    ]);

    Route::delete('/destroy/{client}', [
        'uses' => 'ClientController@destroy',
        'as' => 'admin.client.delete'
    ]);
});