<?php

/*
# Pàgina d'inici
*******************************************************************************/
Route::get('/', function () {
    return view('index');
});

/*
# Auth
*******************************************************************************/
Auth::routes();

/*
# Administració
*******************************************************************************/
Route::group(['prefix'=>'admin'], function () {
    Route::resource('/', 'HomeController', ['only' => ['index']]);
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('auctions', 'AuctionAdminController');
});

/*
# Client
*******************************************************************************/
Route::group(['prefix'=>'client'], function () {
});
Route::group(['prefix'=>'admin'], function () {
    Route::resource('users', 'UserController');
});
