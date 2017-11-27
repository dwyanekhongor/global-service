<?php

Route::post('/article/index', 'ArticleController@index');
Route::post('/article/show', 'ArticleController@show');
Route::post('/article/store', 'ArticleController@store');
Route::post('/article/update', 'ArticleController@update');
Route::post('/article/destroy', 'ArticleController@destroy');

Route::post('/user/index', 'UserController@index');
Route::post('/user/show', 'UserController@show');
Route::post('/user/store', 'UserController@store');
Route::post('/user/update', 'UserController@update');
Route::post('/user/destroy', 'UserController@destroy');

Route::post('/category/show', 'CategoryController@show');
Route::post('/category/store', 'CategoryController@store');
Route::post('/category/update', 'CategoryController@update');
Route::post('/category/destroy', 'CategoryController@destroy');