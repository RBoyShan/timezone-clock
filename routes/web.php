<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/product-list', 'ProductsController@index');

Route::get('/products-json', 'ProductsController@productsJSON');
