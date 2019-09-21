<?php

Route::group(['prefix' => 'smadadmin/role', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'RoleController@index',
        'as' => 'admin.role.page'
    ]);

    Route::patch('/update/{role}', [
        'uses' => 'RoleController@update',
        'as' => 'admin.role.update'
    ]);

    Route::delete('/delete/{role}', [
        'uses' => 'RoleController@destroy',
        'as' => 'admin.role.delete'
    ]);

    Route::put('/store', [
        'uses' => 'RoleController@store',
        'as' => 'admin.role.store'
    ]);
});