<?php

Route::group(['prefix' => '/smadadmin/dashboard', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'DashboardController@index',
        'as' => 'admin.dashboard.page'
    ]);
});