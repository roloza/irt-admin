<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/admin/counts', 'API\ApiCountController@store')->name('api.admin.counts.store');
Route::post('/admin/counts/edit', 'API\ApiCountController@update')->name('api.admin.counts.edit');

Route::get('brands', 'API\ApiBrandController@index')->name('api.brands');
Route::get('brand/{slug}', 'API\ApiBrandController@brand')->name('api.brand');
Route::get('brands/by-counts', 'API\ApiBrandController@byCounts')->name('api.brands.byCounts');
Route::get('categories', 'API\ApiBrandController@categories')->name('api.categories');
Route::get('menu', 'API\ApiBrandController@menu')->name('api.menu');