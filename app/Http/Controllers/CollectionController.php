<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CollectionController extends Controller
{
    public function index()
    {
        return view('collection/collections-list', [
           'collections' => Collection::all()->sortBy('name')
        ]);
    }

    public function create()
    {
        return view('collection/collections-create', [
            'products' => Product::all()->sortBy('name')
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validation($request);

        Collection::create($data);

        return redirect('collections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    public function edit(Collection $collection)
    {
        return view('collection.collections-edit', [
           'collection' => $collection,
           'products'   => Product::all()->sortBy('name')
        ]);
    }

    public function update(Request $request, Collection $collection)
    {
        $data = $this->validation($request);

        $collection->name        = $data['name'];
        $collection->description = $data['description'];
        $collection->image_src   = $data['image_src'];

        $product = Product::find($data['product_id']);

        $collection->product()->associate($product);

        $collection->save();

        return redirect('collections');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
    }

    private function validation($data) {
        return $this->validate($data, [
            'name'         => 'required|min:1|max:100',
            'image_src'    => 'required',
            'description'  => '',
            'product_id'   => ['required', Rule::exists('products', 'id')]
        ], [
            'name.required'       => 'Field "name" must be filled',
            'name.min'            => 'Minimum length must be 3 characters character',
            'name.max'            => 'Maximum length must be 100 characters character',
            'image_src.required'  => 'Field "image" must be filled',
            'product_id.required' => 'Field "product" must be selected',
            'product_id.exists'   => 'Incorrect product'
        ]);
    }
}
