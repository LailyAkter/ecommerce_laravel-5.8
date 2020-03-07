<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Product;
use App\Admin\Category;

class FrontendController extends Controller
{
   public function index(){
       $products = Product::latest()->get();
       $category = Category::latest()->get();
    //    dd($products);
       return view('frontend.home',compact(['products','category']));
   }

   public function product_detail($id)
   {
       $product = Product::find($id);
       $products = Product::latest()->get();

    //    dd( $products);
       return view('frontend.products.single_product',compact(['product','products']));
   }
   public function products()
   {
       $all_products = Product::latest()->get();
       return view('frontend.products.shop',compact('all_products'));
   }

   public function wishlist()
   {
       return view('frontend.products.wishlist');
   }

   public function checkout()
   {
       return view('frontend.products.checkout');
   }

   public function blog()
   {
       return view('frontend.blogs.blog');
   }

   public function blog_single()
   {
       return view('frontend.blogs.blog_single');
   }

   public function about()
   {
       return view('frontend.about');
   }

   public function contact()
   {
       return view('frontend.contact');
   }
}
