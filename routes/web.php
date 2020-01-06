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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['as'=>'admin.', 'middleware'=>['auth','admin'],'prefix'=>'admin'],function(){
	Route::get('dashboard', 'adminController@dashboard')->name('dashboard');

	Route::get('catagory/all', 'CatagoryController@catagoryTable')->name('catagory.all');

	Route::resource('product','productController');
	Route::resource('catagory','CatagoryController');
	Route::resource('order','OrderController');
	Route::resource('customer','CustomerController');
});