<?php

namespace App\Http\Controllers;

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
}
