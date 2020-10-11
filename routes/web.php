<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/product-list', 'ProductsController@index');

Route::get('/products-json', 'ProductsController@productsJSON');

Route::get('/product/create', 'ProductsController@create');

Route::get('/product/{id}/edit', 'ProductsController@edit');

Route::post('product-list', 'ProductsController@store');

Route::patch('/product/{id}', 'ProductsController@update');
