<?php

namespace App\Http\Controllers;

use App\Product;
use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    private $collection;

    public function __construct(Request $request) {
        $this->collection = Collection::find($request->route('cid'));

        view()->share(
            'collection_filter_id', $request->route('cid')
        );
    }

    public function index($cid) {
        if ($this->collection) {
            $products = $this->collection->products->sortBy('name');
        } else {
            $products = Product::all()->sortBy('name');
        }

        return view('product/product-list')
            ->with([
                'products'   => $products,
                'page_title' => 'Product list',

                'collections' => Collection::all()->sortBy('name')
            ]);
    }

    public function productsJSON() {
        return Product::all();
    }

    public function create($cid) {
        return view('product/product-create')
            ->with([
                'collections' => Collection::all()->sortBy('name')
            ]);
    }

    public function store($cid) {
        $data = $this->validation(\request());

        Product::create([
            'name'         => $data['name'],
            'manufacturer' => $data['manufacturer'],
            'image'        => $data['image'],
            'price'        => $data['price'],
            'count'        => $data['count'],
            'collection'   => $data['collection']
        ]);

        return redirect('collection/'.$cid.'/product');
    }

    public function edit($cid, Product $product) {
        return view('product/product-edit', [
            'product'     => $product,
            'collections' => Collection::all()->sortBy('name')
        ]);
    }

    public function update($cid, Product $product) {
        $data = $this->validation( \request());

        $product->name         = $data['name'];
        $product->manufacturer = $data['manufacturer'];
        $product->image        = $data['image'];
        $product->price        = $data['price'];
        $product->count        = $data['price'];

        $collection = Collection::find($data['collection']);

        $product->collection()->associate($collection);

        $product->save();

        return redirect('collection/'.$cid.'/product');
    }

    public function destroy($cid, Product $product) {
        $product->delete();
    }

    public function show($cid, Product $product) {
        return view('product/product-show', [
           'product' => $product
        ]);
    }

    private function validation($data) {
        return $this->validate($data, [
            'name'         => 'required|min:1|max:100',
            'manufacturer' => 'required|min:1|max:100',
            'image'        => 'required',
            'price'        => 'required',
            'count'        => 'required|max:1000',
            'collection'   => ['required', Rule::exists('collections', 'id')]
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
            'count.max'             => 'Maximum value must be 99',
            'collection.required'   => 'Field "collection" must be selected',
            'collection.exists'     => 'Incorrect collection'
        ]);
    }
}
