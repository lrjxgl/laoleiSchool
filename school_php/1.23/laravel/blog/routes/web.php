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

Route::get('/', "IndexController@index");
Route::get('/index/show/{id}', "IndexController@show");
Route::get('/index/add/{id}', "IndexController@add");
Route::get('/index/add/', "IndexController@add");
Route::match(['get', 'post'],'/index/create', "IndexController@create");