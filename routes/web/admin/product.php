<?php

Route::group(['prefix' => 'smadadmin/product', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'ProductController@index',
        'as' => 'admin.product.page'
    ]);

    Route::patch('/update/{product}', [
        'uses' => 'ProductController@update',
        'as' => 'admin.product.update'
    ]);

    Route::delete('/delete/{product}', [
        'uses' => 'ProductController@destroy',
        'as' => 'admin.product.delete'
    ]);

    Route::put('/store', [
        'uses' => 'ProductController@store',
        'as' => 'admin.product.store'
    ]);
});