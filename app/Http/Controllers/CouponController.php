<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
  //use middleware for user role
  public function __construct()
  {
      $this->middleware('UserRole');
  }

    //add coupon
    function addcoupon(){
        return view('backend.coupon.add_coupon');
    }

    //coupon post
    function couponpost(Request $request){

        $coupon= new Coupon;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->coupon_validity = $request->coupon_validity;
        $coupon->created_at = Carbon::now();
        $coupon->save();
        return back();

    }

    //view coupon
    function viewcoupon(){
        $coupon = Coupon::all();
        return view('backend.coupon.coupon_view',compact('coupon'));
    }
}
