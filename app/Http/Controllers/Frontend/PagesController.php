<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    
    public function index(){
        
        $products= Product::orderby('id','desc')->paginate(1);
        return view('frontend.pages.index',compact('products'));
    }
    
    public function contact(){
        return view('frontend.pages.contact');
    }
    
    
}
