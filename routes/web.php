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
Route::get('/home', 'HomeController@index')->name('home');

/*
# Administració
*******************************************************************************/
Route::group(['prefix'=>'admin'], function() {
  Route::get('/', function () {
    return view('admin.index');
  });

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
