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

Route::get('/', 'Manufacturer@index');

Route::resource('/manufacturer', 'Manufacturer');
Route::resource('/beer', 'Beer');
Route::resource('/beer-type', 'BeerType');
