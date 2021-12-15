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

//Category routes
Route::get('/category-list', 'CategoryController@list')->name('category-list');
Route::get('/category-add', 'CategoryController@add')->name('category-add');
Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category-delete');
Route::get('/category-edit/{id}', 'CategoryController@edit')->name('category-edit');
Route::post('/category-manage', 'CategoryController@manage')->name('category-manage');
//Product
Route::get('/product-list', 'ProductController@list')->name('product-list');
Route::post('/product-add', 'ProductController@add')->name('product-add');
Route::get('/product-delete/{id}', 'ProductController@delete')->name('product-delete');
Route::get('/product-edit/{id}', 'ProductController@edit')->name('product-edit');
Route::get('/product-update', 'ProductController@update')->name('product-update');
