<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('page-about');
});

Route::get('/product-list', function () {
    return view('page-product-list');
});
