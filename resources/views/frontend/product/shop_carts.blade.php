@extends('frontend.master')

@section('content')

<!-- About Banner Start -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="about-heading text-center">
                <h2>Shopping Cart</h2>
                <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>Shopping Cart</span></p>
            </div>
        </div>
    </div>
</section>
<!-- About Banner End -->

<!-- Shopping Cart Start -->
<section id="card">
 <div class="container">
     <div class="row">
         <div class="col-md-9">
             <div class="cart-info">
                 <table class="table table-striped table-hover table-bordered">
                     <tbody>
                         <tr>
                             <th class="tl">Product & Color</th>
                             <th>Unit Price</th>
                             <th>Quantity</th>
                             <th>Total Price</th>
                             <th>Remove Item</th>
                         </tr>

            {{-- itemsgolar jonno code php --}}
            @php
            $MAC = exec('getmac');
            $MAC = strtok($MAC,' ');

            $ip= $_SERVER['REMOTE_ADDR'];
            $data = App\Cart::where('mac_address',$MAC)->where('customer_ip',$ip)->get();//zoto gola row te mac r ip address mil pabe tar shb ekta variable a rakhlam
            $total = App\Cart::where('mac_address',$MAC)->where('customer_ip',$ip)->count();//jotota mil pabe total row ta count korbe
            @endphp
            <form action="{{route('update-cart') }}" method="post">
                @csrf


                    @forelse ($data as $item)
                    <tr>
                        <td>
                            <div class="col-md-12 pl">
                                {{-- //hidden er madhome id ta nichi jeheto multiple jabe form die --}}
                                <input type="hidden" name="cart_id[]" value="{{ $item->id }}" >

                                <div class="col-md-3 pl">
                                    <img  style="width:120px; height:80px; " src="{{ $item->product->product_image }}" alt="cart1" class="img-responsive">
                                </div>
                                <div class="col-md-9 pro-info pl text-left">
                                    <h3>{{ $item->product->product_name }}</h3>
                                    <p>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    </p>
                                    <p style="float:left; ">Color: {{$item->product_color ?? 'N/A' }}</p><span style="float:left; margin-left:40px; margin-top:4px; font-size:14px;">Size : {{$item->product_size ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </td>
                        <td >৳ {{ $item->product->product_price }}</td>
                        <td>
                            <div class="quantity" >
                               <div class="handle-counter" id="handleCounter{{ $item->id }}">
                                <div class="input">

                                    <input type="text" name="product_quantity[]" value="{{ $item->product_quantity }}">
                                </div>
                                <div class="click" >
                                    <span class="counter-plus btn btn-primary">+</span>
                                    <span class="counter-minus btn btn-primary">-</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                           </div>
                        </td>
                        <td >৳ {{ $item->product->product_price * $item->product_quantity }}</td>
                        <td><a href="{{ route('singlecartdelete',$item->id) }}"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                    @empty

                   <tr>
                       <td colspan="50">No Data Available</td>
                   </tr>

                    @endforelse

                     </tbody>
                 </table>
             </div>
         </div>
         <div class="col-md-3">
             <div class="cart-total">
                <h2>Have a coupon?</h2>
                <div class="input-group">
                    <input id="1" class="form-control coupon_code" type="text" name="search" placeholder="type your code"/>
                    <span class="input-group-btn">
                    <button class="btn btn-success couponsend" type="button">Send</button>
                    </span>
               </div>
               @if(session('errorMsg'))
               <div class="alert alert-danger" role="alert">
                   {{ session('errorMsg') }}
               </div>

               @endif
             </div>
             <div class="total-amount">
                 <ul>
                     <li><h3>Cart Total</h3></li>
                     <li><span>Cart Subtotal =</span><a href="#">৳ {{ $totals }}</a></li>
                     {{-- <li><span>(+) Shipping =</span><a href="#">$</a></li> --}}
                     <li><span>(-) Discount =</span><a href="#">৳ {{ $discount ?? '' }}</a></li>
                     <li><span>Grand Total =</span><a href="#">৳ {{ $grandtotal }}</a></li>
                 </ul>
             </div>
             <div class="proceed">
                 <input type="submit"  class="btn btn-danger" value="update cart" > <a class="updat" href="{{ route('checkout') }}">proceed</a>
             </div>
         </div>
        </form>
     </div>
 </div>
</section>
<!-- Shopping Cart End --

@component('frontend.includes.brand')

@endcomponent


@endsection

@section('footer_js')
<link rel="stylesheet" href="css/jQuery.fancybox.css">

<script src="js/jquery.countdown.min.js"></script>
<script src="{{ url('/front') }}/js/jquery.elevatezoom.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="{{ url('/front') }}/js/jquery.elevatezoom.js"></script>
<script src="{{ url('/front') }}/js/jquery.fancybox.pack.js"></script>
<script src="{{ url('/front') }}/js/handleCounter.js"></script>
<script src="{{ url('/front') }}/js/xzoom.min.js"></script>
<script src="{{ url('/front') }}/js/setup.js"></script>
<script>
    $(function ($) {
           var options = {
               minimum: 1,
               maximize: 100,
               onChange: valChanged,
               onMinimum: function(e) {
                   console.log('reached minimum: '+e)
               },
               onMaximize: function(e) {
                   console.log('reached maximize'+e)
               }
           }
           @foreach ($data as $item)
           $('#handleCounter{{ $item->id }}').handleCounter(options)
           @endforeach

       })
       function valChanged(d) {
//            console.log(d)
       }

       //coupon code java script

       $('.couponsend').click(function(){
           var couponcode = $('.coupon_code').val();
           window.location.href = "{{ url('/shopping/carts/coupon/') }}/"+couponcode;
       })
   </script>


@endsection
