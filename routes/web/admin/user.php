<?php

Route::group(['prefix' => 'smadadmin/user', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'UserController@index',
        'as' => 'admin.user.page'
    ]);

    Route::patch('/update/{user}', [
        'uses' => 'UserController@update',
        'as' => 'admin.user.update'
    ]);

    Route::put('/store', [
        'uses' => 'UserController@store',
        'as' => 'admin.user.store'
    ]);

    Route::delete('/destroy/{user}', [
        'uses' => 'UserController@destroy',
        'as' => 'admin.user.delete'
    ]);
});