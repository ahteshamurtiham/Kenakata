<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class CartController extends Controller
{
    function singlecart(Request $request,$pro_slug){
      $id= Product::where('pro_slug',$pro_slug)->first()->id;

      $MAC = exec('getmac');
      $MAC = strtok($MAC,' ');

      $ip= $_SERVER['REMOTE_ADDR'];

    //   eibar condition

    if(Cart::where('product_id',$id)->where('mac_address',$MAC)->where('customer_ip',$ip)->exists()){
        Cart::where('product_id',$id)->where('mac_address',$MAC)->where('customer_ip',$ip)->increment('product_quantity');
    }
    else{
        Cart::insert([
            'product_id'=>$id,
            'product_quantity'=>1,
            'customer_ip'=>$ip,
            'mac_address'=> $MAC,

            'created_at'=> Carbon::now(),
        ]);
    }
    return back();


    }

   //for single details
   function singledetails(Request $request,$id){

    $pro_id= Product::where('id',$id)->first()->id;
    $MAC = exec('getmac');
    $MAC = strtok($MAC,' ');//this 2line for catch mac address

    $ip= $_SERVER['REMOTE_ADDR'];


    if(Cart::where('product_id',$pro_id)->where('mac_address',$MAC)->where('customer_ip',$ip)->exists()){
        Cart::where('product_id',$pro_id)->where('mac_address',$MAC)->where('customer_ip',$ip)->increment('product_quantity',$request->product_quantity);
    }
    else{
        Cart::insert([
            'product_id'=>$pro_id,
            'product_quantity'=>$request->product_quantity,
            'product_color'=>$request->product_color,
            'product_size'=>$request->product_size,
            'customer_ip'=>$ip,
            'mac_address'=> $MAC,

            'created_at'=> Carbon::now(),
        ]);
    }
    return back();


   }





    //delete single cart in navbar
    function deletesinglecart($cart_id){
       $cart= Cart::findOrfail($cart_id);
       $cart->delete();
       return back();
    }


    //***view shopping carts all product cart
    function shopcart($coupon_code = ''){ 

      if($coupon_code == ''){ 

        $MAC = exec('getmac');
        $MAC = strtok($MAC,' ');

        $ip= $_SERVER['REMOTE_ADDR'];
        $data = Cart::where('mac_address',$MAC)->where('customer_ip',$ip)->get();
        $discount = 0;
        $grandtotal= 0;

        $totals = 0;
        foreach ($data as $value) {
            $totals += Product::findOrfail($value->product_id)->product_price * $value->product_quantity;
        }
        $grandtotal= $totals;
        session(['grand_total'=> $grandtotal]);

        session(['totals'=> $totals]);


        return view('frontend.product.shop_carts', compact('totals','discount','grandtotal'));
      }
      else{
          
          if(Coupon::where('coupon_code',$coupon_code)->exists()){ 
            
           if(Carbon::now()->format('Y-m-d')<= Coupon::where('coupon_code',$coupon_code)->first()->coupon_validity ){

           
            $MAC = exec('getmac');
            $MAC = strtok($MAC,' ');

            $ip= $_SERVER['REMOTE_ADDR'];
            $data = Cart::where('mac_address',$MAC)->where('customer_ip',$ip)->get();

            $disamount =  Coupon::where('coupon_code',$coupon_code)->first()->coupon_discount;
            $totals = 0;
            $grandtotal= 0;


            foreach ($data as $value) {
                $totals += Product::findOrfail($value->product_id)->product_price * $value->product_quantity;
            }

            $discount = $totals*$disamount/100; 


            $grandtotal= $totals - $discount;
            session(['grand_total'=> $grandtotal]);
            session(['discount'=> $discount]);
            session(['totals'=> $totals]);
            return view('frontend.product.shop_carts', compact('totals','discount','grandtotal'));

           }

           else{
            return back()->with('errorMsg','Coupon Expired!');
           }


          }
          else{
            return back()->with('errorMsg','Invalid Coupon Code');
          }
      }



    }

    //update cart
    function updatecart(Request $request){

     foreach ($request->cart_id as $key => $value) {
       Cart::findOrfail($value)->update([
         'product_quantity'=> $request->product_quantity[$key]
       ]);

     }
     return back();
    }







}
