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

    public function create() {
        return view('product/product-create');
    }

    public function store() {
        $product = new Product();

        $product->name         = \request('prod-name');
        $product->manufacturer = \request('prod-manufacturer');
        $product->image        = \request('prod-image');
        $product->price        = \request('prod-price');
        $product->count        = \request('prod-count');

        $product->save();

        return redirect('/product-list');
    }

    public function edit($id) {
        $product = Product::find($id);

        return view('product/product-edit', [
           'product' => $product
        ]);
    }

    public function update($id) {
        $product = Product::find($id);

        $product->name         = \request('prod-name');
        $product->manufacturer = \request('prod-manufacturer');
        $product->image        = \request('prod-image');
        $product->price        = \request('prod-price');
        $product->count        = \request('prod-count');

        $product->save();

        return redirect('/product-list');
    }
}
