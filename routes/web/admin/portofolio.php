<?php

Route::group(['prefix' => 'smadadmin/portofolio', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'PortofolioController@index',
        'as' => 'admin.portofolio.page'
    ]);

    Route::patch('/update/{portofolio}', [
        'uses' => 'PortofolioController@update',
        'as' => 'admin.portofolio.update'
    ]);

    Route::delete('/delete/{portofolio}', [
        'uses' => 'PortofolioController@destroy',
        'as' => 'admin.portofolio.delete'
    ]);

    Route::put('/store', [
        'uses' => 'PortofolioController@store',
        'as' => 'admin.portofolio.store'
    ]);
});