<?php

/*
# Client (arrel)
*******************************************************************************/
Route::group(['prefix'=>'/'], function () {
    Route::resource('/', 'AuctionClientController', ['only' => ['index']]);
    Route::resource('auctions-feed', 'AuctionJsonFeedController', ['only' => ['index']]);
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
    Route::resource('stock', 'StockController');
    Route::resource('auctions', 'AuctionAdminController');
    Route::resource('users', 'UserController');
});

/*
# Client
*******************************************************************************/
Route::group(['prefix'=>'client'], function () {
    Route::resource('ProfileUsers', 'UserProfileController');
});

/*
# PayPal
*******************************************************************************/
//---------------------------
// route for view/blade file
//---------------------------
Route::get('addPayment', 'PaymentController@addPayment')->name('addPayment');
Route::get('index1', 'UserProfileController@index1')->name('index1');
Route::get('/pdf/{id}', 'pdfController@index')->name('pdf');

//-------------------------
// route for post request
//-------------------------
Route::post('paypal', 'PaymentController@postPaymentWithpaypal')->name('paypal');

//---------------------------------
// route for check status responce
//---------------------------------
Route::get('paypal', 'PaymentController@getPaymentStatus')->name('status');

Route::get('paypalerror', 'PaymentController@error')->name('paypalerror');

/*
# Socialite
*****************************************************************************/
Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');