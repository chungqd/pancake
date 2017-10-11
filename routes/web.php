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
Route::get('index', ['as' => 'trang-chu', 'uses' => 'PageController@getIndex']);

Route::get('product-type/{type}', ['as' => 'product-type', 'uses' => 'PageController@getProductType']);

Route::get('detail-product/{id}', ['as' => 'detail-product', 'uses' => 'PageController@getDetailProduct']);

Route::get('contact', ['as' => 'contact', 'uses' => 'PageController@Contact']);

Route::get('cart/{id}', ['as' => 'cart', 'uses' => 'PageController@Cart']);

Route::get('del-cart/{id}', ['as' => 'del-cart', 'uses' => 'PageController@delCart']);

Route::get('dat-hang/{id}', ['as' => 'dat-hang', 'uses' => 'PageController@getOrder']);
Route::post('dat-hang', ['as' => 'dat-hang', 'uses' => 'PageController@postOrder']);