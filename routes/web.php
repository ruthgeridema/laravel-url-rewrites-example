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
    return view('catalog.homepage');
})->name('home');
Route::get('product/{id}', 'ProductController')->name('product');
Route::get('category/{id}', 'CategoryController')->name('category');
Route::rewrites();
