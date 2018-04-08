<?php

/*
# Client (arrel)
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

//-------------------------
// route for post request
//-------------------------
Route::post('paypal', 'PaymentController@postPaymentWithpaypal')->name('paypal');

//---------------------------------
// route for check status responce
//---------------------------------
Route::get('paypal', 'PaymentController@getPaymentStatus')->name('status');

Route::get('paypalerror', 'PaymentController@error')->name('paypalerror');
