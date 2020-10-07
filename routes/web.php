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

// Main page
//Route::get('/', function () {return view('index');});
Route::resource('/','MainController');


// Default page
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/indexNeedLogin', 'HomeController@indexNeedLogin')->name('indexNeedLogin');

// Crud routes
Route::resource('/users','UsersController');
Route::resource('/products','ProductsController');

Route::get('/trainings/NeedLogin', 'TrainingsController@NeedLogin');
Route::resource('/trainings','TrainingsController');

Route::get('/ebooks/NeedLogin','EbooksController@NeedLogin');
Route::resource('/ebooks','EbooksController');


// Custom view
Route::get('/products/{id}/add_picture', 'ProductsController@add_picture')->name('add_picture');
Route::post('/products/store_picture', 'ProductsController@store_picture');
Route::post('/products/{id}/setMainImage', 'ProductsController@setMainImage');
Route::get('/cart_detail', 'HomeController@cart_detail')->name('cart_detail');
Route::get('/payment', 'HomeController@payment')->name('payment');
Route::get('/product_detail/{id}','ProductsController@product_detail');
Route::get('/cart_history', 'HomeController@cart_history')->name('cart_history');
Route::get('/cart_history_detail', 'HomeController@cart_history_detail')->name('cart_history');


// Custom Ajax
Route::post('home/addProductToChart', 'HomeController@addProductToChart')->name('addProductToChart');
Route::post('trainings/addTrainingToChart', 'TrainingsController@addTrainingToChart')->name('addTrainingToChart');
Route::post('ebooks/addEbookToChart', 'EbooksController@addEbookToChart')->name('addEbookToChart');
Route::get('home/getTotalBelanja', 'HomeController@getTotalBelanja')->name('getTotalBelanja');
Route::get('home/deleteProductFromCart/{id}', 'HomeController@deleteProductFromCart')->name('deleteProductFromCart');
