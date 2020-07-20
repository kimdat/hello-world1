<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return 'welcome to t11910m3';
});
Route::get('order/index', 'OrderController@index');

Route::get('order/create', 'OrderController@create');

Route::post('order/postCreate', 'OrderController@postCreate');

Route::get('product/index', 'ProductController@index');

Route::get('product/create', 'ProductController@create');

Route::post('product/postCreate', 'ProductController@postCreate');

Route::get('product/update/{id}', 'ProductController@update');

Route::post('product/postUpdate/{id}', 'ProductController@postUpdate');

Route::get('product/delete/{id}', 'ProductController@delete');
