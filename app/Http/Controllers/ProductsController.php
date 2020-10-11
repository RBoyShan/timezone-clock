<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::all()->sortBy('name');

        return view('product/product-list')
            ->with([
               'products' => $products,
               'page_title' => 'Product list',
            ]);
    }

    public function productsJSON() {
        return Product::all();
    }
}
