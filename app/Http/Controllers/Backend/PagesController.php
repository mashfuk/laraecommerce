<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Image;


use App\Http\Controllers\Controller;


class PagesController extends Controller {

    //

    public function index() {
        return view('backend.pages.index');
    }

  
}
