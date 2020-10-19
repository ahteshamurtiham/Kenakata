@extends('frontend.master')
@section('content')




   <!-- About Banner Start -->
   <section id="about">
       <div class="container">
           <div class="row">
               <div class="about-heading text-center">
                   <h2>Product Grid View With Sidebar</h2>
                   <p><a href="index.html">home</a> <i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> <span>Product Grid View With Sidebar</span></p>
               </div>
           </div>
       </div>
   </section>
   <!-- About Banner End -->

   <!-- Product-item start -->
   <section id="product-grid-sidebar">
       <div class="container">
           <div class="row">
               <div class="col-md-3">
                   <div class="single category">
                        <h3 class="side-title">Category</h3>

                        <ul class="list-unstyled">
                            @foreach ($categories as $cat)
                            {{-- product table e category id ase oi categoryr under e product add hoise so ota dhore count korbo --}}
                            <li><a href="{{ route('category-shoppage',$cat->id)}}" title="">{{ $cat->category_name}}<span class="pull-right">{{ App\Product::where('category_id',$cat->id)->count() }}</span></a></li>
                            @endforeach


                        </ul>
                   </div>



               </div>
               <div class="col-md-9">

                   <div class="latest-main">
                       {{-- <h2 style="text-align:center; color:red; font-size:22px;">Product</h2> --}}
                       <div class="heading2 text-center">
                        <h2>Products</h2>
                    </div>
                       <div class="product-grid-item">
                       @foreach ($products as $item)
                       <div class="gallery_product col-md-4 col-sm-4">
                        <div class="featured-product">
                            <a href=" {{ route('productdetails', $item->pro_slug) }}"><img style="width:270px; height:350px;" src="{{ $item->product_image }}" alt="featured-product-img" class="img-responsive"></a>
                            <div class="overlay2 text-center">
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-random"></i></a>
                                <a href="#"><i class="fa fa-shopping-basket"></i></a>
                            </div>
                        </div>
                        <div class="feat-details feat-details2">
                            <p>{{ Str::substr($item->product_name,0,25 )}}.....</p>
                            <h4> BDT ৳ {{$item->product_price }}</h4>
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
                   <div class="clearfix"></div>

               </div>
           </div>
       </div>
   </section>
  <!-- Product-item end -->




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


@endsection

