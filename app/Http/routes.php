<?php

/*
Route::get('/', 'PagesController@home');
Route::get('login', 'PagesController@login');
*/

/*
Route::group(['middleware' => ['web']], function(){
	Route::resource('flyers','FlyersController');	
});
*/

Route::get('{zip}/{street}','FlyersController@show');
Route::post('{zip}/{street}/photos','FlyersController@addPhoto');

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'PagesController@home');

	Route::resource('flyers','FlyersController');	
});
