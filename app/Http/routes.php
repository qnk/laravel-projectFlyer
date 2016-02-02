<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function () {
    Route::auth();

	// usage inside a laravel route
	Route::get('/home', function()
	{
	    $img = Image::make(URL::to('/').'/flyers/photos/1454321308imagesCACQQ84G.jpg')->resize(300, 200);

	    return $img->response('jpg');
	});

    Route::get('/', 'PagesController@home');

	Route::resource('flyers','FlyersController');	

	Route::get('{zip}/{street}','FlyersController@show');
	Route::post('{zip}/{street}/photos',['as' => 'store_photo_path' => 'PhotosController@store']);
});
