<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/products-json', 'ProductController@productsJSON');

Route::resource('product', 'ProductController');

Route::resource('collections', 'CollectionController');
