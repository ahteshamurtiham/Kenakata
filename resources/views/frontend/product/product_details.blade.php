@extends('frontend.master')

@section('content')

<!-- About Banner Start -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="about-heading text-center">
                <h2>Product Details</h2>
                <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>Product Details</span></p>
            </div>
        </div>
    </div>
</section>
<!-- About Banner End -->
<section id="details-of-product">
    <div class="container">
        <div class="row">
            <div class="col-md-5 tahsan2">
                <div class="xzoom-container">
                   <img class="xzoom " id="xzoom-default"  src="{{ $single->product_image }}"  xoriginal="{{ $single->product_image }}" alt="" />
                     <div class="xzoom-thumbs">
                     @foreach ($multiimage as $image)

                        <a href=" {{  $image->product_image  }} "><img class="xzoom-gallery" width="80" src=" {{  $image->product_image  }} "  alt=""></a>
                     @endforeach


                   </div>
                 </div>
            </div>
            <div class="details-product-item col-md-7">
                <div class="product-details">
                    <div>
                       <h3>{{ $single->product_name }}</h3>
                       <h4>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <i class="fa fa-star"></i>
                           <span>| (124 Reviews)</span>
                       </h4>
                       <h5>BDT ৳ {{ $single->product_price }}</h5>
                       <p>{{ $single->product_summary }}</p>
                    </div>
                </div>
                {{-- product color --}}


           <form action="{{ route('singledetails',$single->id) }}" method="post">
             @csrf

            <div class="color-select category">

               <div class="">

                <span style="color:black; font-size:16px; ">Color :</span>

                @php
                $total_count= Count(json_decode($single->product_color));
                $flag=1;
                @endphp

                @foreach (json_decode($single->product_color) as $color)

                   <input style="margin-left:10px; " class="with-gap" type="radio" name="product_color" value="{{ $color }}"><span style="padding-left:5px; font-size:14px; font-family: 'Open Sans', sans-serif;">{{ $color }}</span>
                @php
                   if($flag < $total_count)
                        {
                            echo "";
                        }
                   $flag++
                    @endphp


                 @endforeach
               </div>

                     {{-- product size --}}
                     <div class="" style="margin-top:8px;">

                        <span style="color:black; font-size:16px;">Size :</span>

                       @php
                        if(json_decode($single->product_size) !=null){

                        @endphp

                        @php

                        $total_count= Count(json_decode($single->product_size));
                        $flag=1;

                         @endphp

                         @foreach (json_decode($single->product_size) as $size)
                         <input style="margin-left:10px; " class="with-gap" type="radio" name="product_size" value="{{ $size }}"><span style="padding-left:5px; font-size:14px; font-family: 'Open Sans', sans-serif;">{{ $size }}</span>

                         @php
                         if($flag < $total_count)
                              {
                                  echo " ";
                              }
                         $flag++
                          @endphp

                         @endforeach

                         @php
                     }
                     else{
                         echo "N/A";
                     }
                         @endphp

                           </li>
                       </ul>
                     </div>
                </div>
                <div class="quantity" style="margin-top:10px;">

                    <div class="handle-counter" id="handleCounter">
                    <div class="quan-head">
                       <h3>Quantity :</h3>
                   </div>
                     <div class="input">
                         <input type="text" name="product_quantity" value="1">
                     </div>
                     <div class="click">
                         <span class="counter-plus btn btn-primary">+</span>
                         <span class="counter-minus btn btn-primary">-</span>
                     </div>
                     <div class="clearfix"></div>
                     <span style="color:#999; font-family: 'Open Sans', sans-serif;">{{ $single->product_quantity }} Pices are Available</span>
                 </div>
                </div>
                <div class="add-wishlist">
                    <a href="#"><i class="fa fa-heart"></i></a>
                    <a href="#"><i class="fa fa-random"></i></a>
                    <button type="submit"><i class="fa fa-shopping-basket"></i></button>
                </div>
            </form>
                <div class="code-cate">
                    <p>Code<a href="#">: SKY-12345678</a></p>
                    <p>Category<a href="#" class="tahsan3">: {{$single->category->category_name}}</a></p>
                    <p>Tags<a href="#" class="tahsan5">: T-shirt, Skirt</a></p>
                </div>
                <div class="share">
                 <h6>Share:</h6>
                   <a href="#"><i class="fa fa-facebook"></i></a>
                   <a href="#"><i class="fa fa-twitter"></i></a>
                   <a href="#"><i class="fa fa-behance"></i></a>
                   <a href="#"><i class="fa fa-linkedin"></i></a>
                   <a href="#"><i class="fa fa-pinterest-p"></i></a>
               </div>
            </div>
        </div>
    </div>
</section>
<!-- product details end -->

<!-- Product Discription Part start -->
<section id="discription">
    <div class="container">
        <div class="">
            <div class="">
             <ul class="nav nav-tabs" role="tablist">
                 <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                  <li><a href="#">|</a></li>
                 <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
             </ul>
             <!-- Tab panes -->
             <div class="tab-content">
                 <div role="tabpanel" class="tab-pane active" id="home">
                     <p>{{$single->product_description }}</p>

                 </div>
                 <div role="tabpanel" class="tab-pane" id="profile">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
             </div>
            </div>
        </div>
    </div>
</section>
<!-- product discription end -->

<!-- Latest Part Start -->
<section id="latest">
   <i class="fa fa-chevron-left prv-arrow2"></i>
   <i class="fa fa-chevron-right nxt-arrow2"></i>
    <div class="container">
        <div class="row">
            <div class="latest-main">
                 <div class="heading2 text-center">
                    <h2>latest Products</h2>
                </div>
                <div class="latest-item">
                  @foreach ($latestproduct as $latest)
                  <div class="gallery_product col-md-3">
                    <div class="featured-product">
                        <a href= " {{ route('productdetails', $latest->pro_slug) }}">
                            <img style="width:270px; height:350px;" src="{{ $latest->product_image }}" alt="featured-product-img" class="img-responsive">
                        </a>
                        <div class="overlay2 text-center">
                            <a href="#"><i class="fa fa-heart"></i></a>
                            <a href="#"><i class="fa fa-random"></i></a>
                            <a href="{{ route('singlecart',$latest->pro_slug) }}"><i class="fa fa-shopping-basket"></i></a>
                        </div>
                    </div>
                    <div class="feat-details">
                        <p>{{ Str::substr($latest->product_name,0,25 )}}.....</p>
                        <h4> BDT ৳ {{$latest->product_price }}</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
                  @endforeach

                </div>
            </div>
        </div>
    </div>
</section>


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
           $('#handleCounter').handleCounter(options)
           $('#handleCounter2').handleCounter(options)
           $('#handleCounter3').handleCounter({maximize: 100})
       })
       function valChanged(d) {
//            console.log(d)
       }
   </script>
@endsection
