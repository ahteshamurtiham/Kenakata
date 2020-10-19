<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Billing;
use App\Category;
use App\Mail\ShippingOrder;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Str;

class FrontendController extends Controller
{

   public function frontend($locale = '') 
   {
    
    App::setLocale($locale);

 
    $category = Category::orderBy('category_name', 'asc')->get();
    $latestproduct= Product::orderBy('id', 'desc')->get();
    $banner = Banner::orderBy('id', 'desc')->get();


    return view('frontend.main',compact('latestproduct','banner','category'));
    // return view('invoice');
   }

   //product details
   function productdetails($pro_slug){


      $single = Product::where('pro_slug',$pro_slug)->first();
      $multiimage = ProductImage::where('product_id',$single->id)->get();
      $latestproduct= Product::orderBy('id', 'desc')->get();
    //   $single =Product::where('id',$product->id)->first();
       return view('frontend.product.product_details',compact('single','multiimage','latestproduct'));

   }

   //for search & shop page
   function searchall(Request $request){


    $s = $request->search;

    if($request->search == ''){ 

     $products = Product::orderBy('product_name', 'asc')->get();
     $categories = Category::orderBy('category_name', 'asc')->get();
     return view('frontend.product.shoppage',compact('products','categories'));

    }
    else{
     $products = Product::where('product_name', 'like', '%' . $s . '%')->get();
     $categories = Category::orderBy('category_name', 'asc')->get();
     return view('frontend.product.shoppage',compact('products','categories'));
    }


   }

    

    function catagoryshop($id){

        $products = Product::where('category_id',$id)->get();
        // $products = Product::where('category_id', 'like', '%' . $id . '%')->get();
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('frontend.product.cat_shoppage',compact('products','categories'));


    }




}
