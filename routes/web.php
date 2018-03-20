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
# Home
TODO: afegir a admin
*******************************************************************************/


/*
# Administració
*******************************************************************************/
Route::group(['prefix'=>'admin'], function() {
  Route::get('/', 'HomeController@index')->name('home');

  Route::resource('categories','CategoryController');
  Route::resource('products','ProductController');
});

/*
# Client
*******************************************************************************/
Route::group(['prefix'=>'client'], function() {

});
Route::group(['prefix'=>'admin'], function(){
    Route::resource('users','UserController');
});
