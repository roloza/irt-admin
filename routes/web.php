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
Route::resource('admin/brands', 'BrandController');
Route::resource('admin/counts', 'CountController');

Route::get('icon/{img}', 'IconsController@Icon');
Route::get('icons', 'IconsController@Icons');