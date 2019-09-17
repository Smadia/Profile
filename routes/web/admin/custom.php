<?php

Route::group(['prefix' => 'smadadmin/custom', 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Page'], function () {
        Route::get('', [
            'uses' => 'CustomPageController@index',
            'as' => 'admin.custom.page'
        ]);

        Route::get('/frame/edit/{custom}', [
            'uses' => 'CustomPageController@edit',
            'as' => 'admin.custom.page.edit'
        ]);
    });

    Route::patch('/update/{custom}', [
        'uses' => 'CustomController@update',
        'as' => 'admin.custom.update'
    ]);

    Route::put('/store', [
        'uses' => 'CustomController@store',
        'as' => 'admin.custom.store'
    ]);
});