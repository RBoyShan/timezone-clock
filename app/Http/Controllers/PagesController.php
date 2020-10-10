<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PagesController extends Controller
{
    public function home() {
        return view('index');
    }

    public function about() {
        return view('page-about');
    }

    public function products() {
        return view('page-product-list')
            ->with([
                'products' => Product::getProducts(),
                'page_title' => 'Список товарів'
            ]);
    }
}
