<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/products-json', 'ProductController@productsJSON');

Route::resource('collection/{cid}/product', 'ProductController');

Route::resource('collections', 'CollectionController');

Route::get('product/collections/{id}', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
