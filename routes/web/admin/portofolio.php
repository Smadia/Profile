<?php

Route::group(['prefix' => 'smadadmin/portofolio', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'PortofolioController@index',
        'as' => 'admin.portofolio.page'
    ]);
});