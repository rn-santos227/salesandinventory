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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index');
	Route::get('/suppliers', 'SupplierController@index');
	Route::get('/categories', 'CategoryController@index');
	Route::get('/customers', 'CustommerController@index');
	Route::get('/menus', 'MenuController@index');
});

Route::resource('items', 'ItemController');
Route::resource('suppliers', 'SupplierController');
Route::resource('categories', 'CategoryController');
Route::resource('menus', 'MenuController');
Route::resource('customers', 'CustommerController');
