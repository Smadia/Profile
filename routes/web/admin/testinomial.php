<?php

Route::group(['prefix' => 'smadadmin/testimonial', 'namespace' => 'Admin'], function () {
    Route::get('', [
        'uses' => 'TestimonialController@index',
        'as' => 'admin.testimonial.page'
    ]);

    Route::patch('/update/{testimonial}', [
        'uses' => 'TestimonialController@update',
        'as' => 'admin.testimonial.update'
    ]);

    Route::put('/store', [
        'uses' => 'TestimonialController@store',
        'as' => 'admin.testimonial.store'
    ]);

    Route::delete('/destroy/{testimonial}', [
        'uses' => 'TestimonialController@destroy',
        'as' => 'admin.testimonial.delete'
    ]);
});