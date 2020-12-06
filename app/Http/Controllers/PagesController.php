<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Product;
use Illuminate\Support\Facades\Gate;

class PagesController extends Controller
{
    public function home() {
        return view('index');
    }

    public function about() {
        return view('page-about');
    }

    public function admin() {
       if (Gate::allows('admin-panel')) {
           return view('admin.admin');
       }

       return view('index');
    }

    public function admin_products() {
        if (Gate::allows('admin-panel')) {
            $products = Product::all()->sortBy('name');

            return view('admin.admin-products')
                ->with([
                    'products' => $products
                ]);
        }

        return view('index');
    }

    public function admin_collections() {
        if (Gate::allows('admin-panel')) {
            $collections = Collection::all()->sortBy('name');

            return view('admin.admin-collections')
                ->with([
                    'collections' => $collections
                ]);
        }

        return view('index');
    }
}
