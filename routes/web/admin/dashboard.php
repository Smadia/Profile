<?php

Route::group(['prefix' => '/smadadmin/dashboard', 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Page'], function () {
        Route::get('', [
            'uses' => 'DashboardPageController@index',
            'as' => 'admin.dashboard.page'
        ]);
    });
});