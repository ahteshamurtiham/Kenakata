<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Cart;
use App\City;
use App\Country;
use App\Mail\ShippingOrder;
use App\Product;
use App\Sell;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use stripe\Stripe;


class CheckoutController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    function checkout(Request $request){

        $grand_total = $request->session()->get('grand_total');

        $countries = Country::orderBy('id', 'asc')->get(); 
        $users= Auth::user();
        return view('frontend.product.checkout',compact('users','countries','grand_total'));
    }

    //country city dependency
    function cityajax($id){

        $cities= City::where('country_id',$id)->orderBy('name', 'asc')->get();
        return response()->json($cities);

    }


    //shipping post
    function shippingpost(Request $request){

        $validatedData = $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
        ]);
        $payment=$request->payment;
        $grand_total = $request->session()->get('grand_total');

       $shipping = Shipping::insertGetId([ 

            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'notes'=>$request->notes,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'payment_type'=>$payment,
            'payment_status'=>1, 
            'created_at'=>Carbon::now(),

        ]);

        
        $sell=Sell::insertGetId([
          'user_id'=>Auth::user()->id,
          'shipping_id'=>$shipping,
          'grand_total'=>$grand_total,
          'Created_at'=>Carbon::now()
        ]);

            $MAC = exec('getmac');
            $MAC = strtok($MAC,' ');

            $ip= $_SERVER['REMOTE_ADDR'];
            $data = Cart::where('mac_address',$MAC)->where('customer_ip',$ip)->get();
            foreach($data as $item){ 
                Billing::Insert([
                    'sale_id'=>$sell,
                    'product_id'=>$item->product_id,
                    'shipping_id'=>$shipping,
                    'product_unit_price'=>Product::findOrfail($item->product_id)->product_price,
                    'product_quantity'=> $item->product_quantity,
                    'Created_at'=>Carbon::now()


                  ]);

                  
                  Product::findOrfail($item->product_id)->decrement('product_quantity',$item->product_quantity);
                  $item->delete();
            }

            if($payment == 'stripe'){ 

            \Stripe\Stripe::setApiKey("sk_test_CDKqDuhGQ1TnCUaighKPJKLO00f2Opeyv4"); 
           $charge = \Stripe\Charge::create([
          "amount" => 100 * $grand_total,
          "currency" => "BDT",
           "source" => $request->stripeToken,
          "description" => "Kena_kata Ecommerce Site"
            ]);

          
            Shipping::findOrfail($shipping)->update([
                'payment_status' =>2,
                'created_at'=> Carbon::now(),
            ]);

            session(['source' =>  $charge]);
            session(['shipping_id' => $shipping]); 
            
            $data= Billing::where('sale_id',$sell)->get();
            Mail::to(Auth::user('email'))->send(new ShippingOrder($data));


           
            return redirect('/');
            }
            else{
                echo "paypal";
            }






        }




    }




