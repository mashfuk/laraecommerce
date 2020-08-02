<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $products = Product::orderby('id', 'desc')->paginate(1);
        return view('frontend.pages.product.index')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)) {
            return view('frontend.pages.product.show', compact('product'));
        } else {
            session()->flash('errors', 'Sorry !! There is no product by this URL..');
            return redirect()->route('products');
        }
    }

}
