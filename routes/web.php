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
//index
Route::get('/', 'PageController@index')->name('getIndex');
Route::get('/gioi-thieu', 'PageController@intro')->name('intro');
Route::get('/tin-tuc', 'PageController@news')->name('news');
Route::get('/ve-chung-toi', 'PageController@about')->name('about');
//product
Route::get('/product', 'ProductController@index')->name('allProduct');
Route::get('/product/{id}','ProductController@viewProduct')->name('viewProduct');
Route::get('/product/filter/{id}','ProductController@filterProduct')->name('filterProduct');
//filter
Route::post('/product', 'ProductController@filterProductByPrice')->name('filterProductByPrice');
Route::post('/product/search', 'ProductController@search')->name('search');
//cart
Route::get('/cart', 'ProductController@cart');
Route::get('/add-to-cart/{id}', 'ProductController@addToCart');
Route::patch('/update-cart', 'ProductController@update');
Route::delete('/remove-from-cart', 'ProductController@remove');
//checkout
Route::get('/checkout', 'ProductController@checkOut')->name('getCheckout');
Route::post('/checkout', 'ProductController@sendMail')->name('postCheckout');
//
Route::get('/sendmail', 'ProductController@sendMail')->name('sendmail');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
