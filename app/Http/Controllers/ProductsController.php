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
        Product::create([
            'name'         => \request('prod-name'),
            'manufacturer' => \request('prod-manufacturer'),
            'image'        => \request('prod-image'),
            'price'        => \request('prod-price'),
            'count'        => \request('prod-count')
        ]);

        return redirect('/product');
    }

    public function edit(Product $product) {
        return view('product/product-edit', [
           'product' => $product
        ]);
    }

    public function update(Product $product) {
        $product->update([
            \request(['name', 'manufacturer', 'image', 'price', 'count'])
        ]);

        $product->save();

        return redirect('/product');
    }

    public function destroy(Product $product) {
        $product->delete();
    }

    public function show(Product $product) {
        return view('product/product-show', [
           'product' => $product
        ]);
    }
}
