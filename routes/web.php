<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Pàgina d'inici del lloc web.
Route::get('/', function () {
    return view('index');
});

// Pàgina d'inici del panell d'administració.
Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['prefix'=>'admin'], function(){
    Route::resource('products','ProductController');
});