<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories=Category::withCount(['products'])->with('products')->get();
        $categories=$categories->where('products_count','>=',1);
        return view('user.index',compact('categories'));
    }

    public function productDetails($slug){
        $product=Product::where('slug',$slug)->first();
        return view('user.productDetails',compact('product'));
    }
}
