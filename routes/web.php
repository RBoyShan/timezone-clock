<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/products-json', 'ProductsController@productsJSON');

Route::resource('product', 'ProductsController');

