<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
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
        $data = \request()->validate([
            'prod-name'         => 'required|min:1|max:100',
            'prod-manufacturer' => 'required|min:1|max:100',
            'prod-image'        => 'required',
            'prod-price'        => 'required',
            'prod-count'        => 'required|max:1000',
        ], [
            'prod-name.required'         => 'Field "name" must be filled',
            'prod-name.min'              => 'Minimum length must be 3 characters character',
            'prod-name.max'              => 'Maximum length must be 100 characters character',
            'prod-manufacturer.required' => 'Field "manufacturer" must be filled',
            'prod-manufacturer.min'      => 'Minimum length must be 3 characters character',
            'prod-manufacturer.max'      => 'Maximum length must be 100 characters character',
            'prod-image.required'        => 'Field "image" must be filled',
            'prod-price.required'        => 'Field "price" must be filled',
            'prod-count.required'        => 'Field "count" must be filled',
            'prod-count.max'             => 'Maximum value must be 99',
        ]);

        Product::create([
            'name'         => $data['prod-name'],
            'manufacturer' => $data['prod-manufacturer'],
            'image'        => $data['prod-image'],
            'price'        => $data['prod-price'],
            'count'        => $data['prod-count']
        ]);

        return redirect('product');
    }

    public function edit(Product $product) {
        return view('product/product-edit', [
           'product' => $product
        ]);
    }

    public function update(Product $product) {
        $product->update(
            \request()->validate([
                'name'         => 'required|min:1|max:100',
                'manufacturer' => 'required|min:1|max:100',
                'image'        => 'required',
                'price'        => 'required',
                'count'        => 'required|max:1000',
            ], [
                'name.required'         => 'Field "name" must be filled',
                'name.min'              => 'Minimum length must be 3 characters character',
                'name.max'              => 'Maximum length must be 100 characters character',
                'manufacturer.required' => 'Field "manufacturer" must be filled',
                'manufacturer.min'      => 'Minimum length must be 3 characters character',
                'manufacturer.max'      => 'Maximum length must be 100 characters character',
                'image.required'        => 'Field "image" must be filled',
                'price.required'        => 'Field "price" must be filled',
                'count.required'        => 'Field "count" must be filled',
                'count.max'             => 'Maximum value must be 99'
            ])
        );

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
