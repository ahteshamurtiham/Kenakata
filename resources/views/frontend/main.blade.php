@extends('frontend.master')
@section('content')


<!-- Banner Part Start -->
   <section id="banner">
    <i class="fa fa-chevron-left prv-arrow"></i>
    <i class="fa fa-chevron-right nxt-arrow"></i>
     <div class="banner-slider">
         @foreach ($banner as $banners)
         <div class="banner-img">
             <div class="banner-overlay">
                <img src="{{ $banners->banner_image }}" alt="">
             </div>


            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="banner-content">
                        <h1>{{$banners->banner_title1}}</h1>
                        <h2>{{$banners->banner_title2}}</h2>
                        <p>{{$banners->banner_description}}</p>
                        <a href="#">{{$banners->banner_button1}}</a>
                        <a class="pur" href="#">{{$banners->banner_button2}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endforeach


     </div>
 </section>
 <!-- Banner Part End -->

 <!-- Service Part Start -->
 <section id="service">
     <div class="container">
         <div class="row">
             <div class="service-main">
                 <div class="col-md-4">
                     <div class="service-item text-center">
                         <h3><i class="fa fa-truck rotat"></i> @lang('Free Shipping')</h3>
                         </p>@lang('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')</p>
                     </div>
                 </div>
                 <div class="col-md-4 service-mid">
                     <div class="service-item text-center">
                         <h3><i class="fa fa-support"></i> @lang('24/7 Support')</h3>
                         <p>@lang('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')</p>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="service-item text-center">
                         <h3><i class="fa fa-money"></i> @lang('Cashback')</h3>
                         <p>@lang('Lorem Ipsum is simply dummy text of the printing and typesetting industry.')</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Service Part End -->

 <!-- Newest Part Start -->
 <section id="newest">
     <div class="container">
         <div class="row">
             <div class="newest-main">
                 <div class="col-md-4 col-sm-4">
                     <div class="newest-item">
                         <img src="{{url('/front')}}/images/newest1.jpg" alt="newest1" class="img-responsive">
                         <div class="overlay1 text-center">
                             <h2>@lang('new')</h2>
                             <h3>@lang('jeans shirt')</h3>
                             <a href="#">@lang('shop now')</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                     <div class="newest-item">
                         <img src="{{url('/front')}}/images/newest2.jpg" alt="newest1" class="img-responsive">
                         <div class="overlay1 text-center">
                             <h2>@lang('2017')</h2>
                             <h3>@lang('womens glass')</h3>
                             <a href="#">@lang('shop now')</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                     <div class="newest-item">
                         <img src="{{url('/front')}}/images/newest3.jpg" alt="newest1" class="img-responsive">
                         <div class="overlay1 text-center">
                             <h2>@lang('best')</h2>
                             <h3>@lang('mens Shirt')</h3>
                             <a href="#">@lang('shop now')</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Newest Part End -->

 <!-- Featured Part Start -->
 <section id="featured">
     <div class="container">
         <div class="row">
             <div class="featured-main">
                 <div class="heading text-center">
                     <h2>@lang('featured Products')</h2>
                 </div>
                 <div class="featured-filter">
                     <div class="text-center">
                          <button class="btn btn-default active filter-button" data-filter="all">All</button>
                          @foreach ($category as $cat)
                          <button class="btn btn-default filter-button" data-filter="men{{$cat->id }}">{{  $cat->category_name   }}</button>
                          @endforeach


                      </div>

                      @foreach ($category  as $cat)
                      @foreach (App\Product::where('category_id',$cat->id)->orderBy('id','asc')->get() as $item)


                      <div class="gallery_product col-md-3 col-sm-4 filter men{{ $cat->id}}">
                        <div class="featured-product">
                            <a href=" {{ route('productdetails', $item->pro_slug) }} " >
                                <img style="width:270px; height:350px;" src="{{ $item->product_image }}" alt="featured-product-img" class="img-responsive"></a>
                            <div class="overlay2 text-center">
                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="#"><i class="fa fa-random"></i></a>
                                <a href="{{ route('singlecart',$item->pro_slug) }}"><i class="fa fa-shopping-basket"></i></a>
                            </div>
                        </div>


                        <div class="feat-details">
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
                      @endforeach


                      {{-- <div class="gallery_product col-md-3 col-sm-4 filter women">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured3.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>Woolen T-Shirt Ash</p><span>$ 99.00</span>
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
                      <div class="gallery_product col-md-3 col-sm-4 filter men access">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured4.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>T-Shirt for Women</p><span>$ 99.00</span>
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
                      <div class="gallery_product col-md-3 col-sm-4 filter women child">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured2.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>Silk Skirt</p><span>$ 99.00</span>
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
                      <div class="gallery_product col-md-3 col-sm-4 filter men">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured1.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>Woolen T-Shirt</p><span>$ 99.00</span>
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
                      <div class="gallery_product col-md-3 col-sm-4 filter women access">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured4.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>T-Shirt for women</p><span>$ 99.00</span>
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
                      <div class="gallery_product col-md-3 col-sm-4 filter men">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured2.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>Silk Skirt</p><span>$ 99.00</span>
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
                      <div class="gallery_product col-md-3 col-sm-4 filter women child">
                          <div class="featured-product">
                              <a href="product-details.html"><img src="{{url('/front')}}/images/featured3.jpg" alt="featured-product-img" class="img-responsive"></a>
                              <div class="overlay2 text-center">
                                  <a href="#"><i class="fa fa-heart"></i></a>
                                  <a href="#"><i class="fa fa-random"></i></a>
                                  <a href="#"><i class="fa fa-shopping-basket"></i></a>
                              </div>
                          </div>
                          <div class="feat-details">
                              <p>Woolen T-Shirt ash</p><span>$ 99.00</span>
                              <div class="clearfix"></div>
                          </div>
                          <div class="ratings">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-half"></i>
                          </div>
                      </div> --}}

                 </div>

             </div>
         </div>
         {{-- <div class="text-center">  {{ $product->links() }}  </div> --}}
     </div>
 </section>
 <!-- Featured Part End -->

 <!-- Upcoming Part Start -->
 <section id="upcoming">
     <div class="upcoming-bg">
         <div class="container">
             <div class="row">
                 <div class="upcoming-main">
                     <div class="col-md-6">
                         <div class="upcoming-product-img">
                             <img src="{{url('/front')}}/images/macbook.png" alt="macbook" class="img-responsive">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="upcoming-prouct-details">
                             <h3>@lang('New Product') </h3>
                             <h2>@lang('Microsoft Surface Pro') </h2>
                             <p>@lang('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Loremsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It hasived not only five centuries, with the release of Letraset sheets.') </p>
                         </div>
                         <div class="luanch">
                              <h2>@lang('launch in')</h2>
                              <div class="coundown_res">
                                  <div class="count-item text-center">
                                  <div class="coun">
                                      <div class="coun_time">
                                          <h2 id="day"></h2>
                                          <p>days</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="count-item text-center">
                                  <div class="coun">
                                      <div class="coun_time">
                                          <h2 id="hour"></h2>
                                          <p>hours</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="count-item text-center">
                                  <div class="coun">
                                      <div class="coun_time">
                                          <h2 id="month"></h2>
                                          <p>mins</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="count-item text-center">
                                  <div class="coun">
                                      <div class="coun_time">
                                          <h2 id="second"></h2>
                                          <p>sec</p>
                                       </div>
                                    </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Upcoming Part End -->

 <!-- Latest Part Start -->
 <section id="latest">
    <i class="fa fa-chevron-left prv-arrow2"></i>
    <i class="fa fa-chevron-right nxt-arrow2"></i>
     <div class="container">
         <div class="row">
             <div class="latest-main">
                  <div class="heading2 text-center">
                     <h2>@lang('latest Products') </h2>
                 </div>
                 <div class="latest-item">
                    @foreach ($latestproduct as $latest)
                    <div class="gallery_product col-md-3">
                        <div class="featured-product">
                            <a href=" {{ route('productdetails', $latest->pro_slug) }}">
                                <img  style="width:270px; height:350px;" src="{{ $latest->product_image }}" alt="featured-product-img" class="img-responsive"></a>
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
 <!-- Latest Part End -->

 <!-- Testimonial Part Start -->
 <section  id="testimonial">
    <div class="heading3 text-center">
        <h2>@lang('testimonial') </h2>
    </div>
     <div class="testimonial-bg">
        <i class="fa fa-chevron-left prv-arrow3"></i>
         <i class="fa fa-chevron-right nxt-arrow3"></i>
         <div class="container">
             <div class="row">
                 <div class="testimonial-main">
                     <div class="col-md-6">
                         <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="{{url('/front')}}/images/testimonial1.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Shahin Alom</h2>
                                  <h3>Sketch Artist</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>Shahin Alom</h4>
                              </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="{{url('/front')}}/images/testimonial2.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Mahadi Tahsan</h2>
                                  <h3>Software Developer</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>mahadi tahsan</h4>
                              </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="{{url('/front')}}/images/testimonial1.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Shohan Hossain</h2>
                                  <h3>Software Developer</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>Shohan Hossain</h4>
                              </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="testimonial-item">
                              <div class="col-md-3 test-img">
                                  <img src="{{url('/front')}}/images/testimonial2.png" alt="testimonial-img" class="img-responsive">
                              </div>
                              <div class="col-md-9 test-details">
                                  <h2>Sujon Saha</h2>
                                  <h3>Graphic Designer</h3>
                                  <p>Lorem Ipsum is simply dummy text of the printing and stry. Lorem sum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a ive centuries, but also the leap into electronic.</p>
                                  <h4>Aminul Islam</h4>
                              </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Testimonial Part End -->

 <!-- Blog Part Start -->
 <section id="blog">
     <div class="container">
         <div class="row">
             <div class="heading4 text-center">
                 <h2>@lang('our blog')</h2>
             </div>
             <div class="blog-main">
                 <div class="col-md-4 col-sm-4">
                     <div class="blog-item">
                         <div class="blog-img">
                             <img src="{{url('/front')}}/images/blog1.jpg" alt="blog-img" class="img-responsive">
                                 <div class="overlay3">
                                      <h4><i class="fa fa-calendar"></i> 26 October 2017</h4>
                                      <a href="blog-details.html"><i class="fa fa-link"></i> </a>
                                      <p><span><i class="fa fa-user"></i> By: Admin </span> <span><i class="fa fa-user"></i>  2.5k Likes </span> <span><i class="fa fa-comment"></i> 1.5k comments </span><p>
                                 </div>
                             </div>
                         <div class="blog-details">
                             <h3>Best E-commerce I’d shopping yet</h3>
                             <p>Lorem Ipsum is simply dummy text of the printing andg industry. Lorem Ipsum has been the indusys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                             <a href="blog-details.html">read more <i class="fa fa-long-arrow-right"></i> </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                     <div class="blog-item">
                         <div class="blog-img">
                             <img src="{{url('/front')}}/images/blog2.jpg" alt="blog-img" class="img-responsive">
                                 <div class="overlay3">
                                      <h4><i class="fa fa-calendar"></i> 26 October 2017</h4>
                                      <a href="blog-details.html"><i class="fa fa-link"></i> </a>
                                      <p><span><i class="fa fa-user"></i> By: Admin </span> <span><i class="fa fa-user"></i>  2.5k Likes </span> <span><i class="fa fa-comment"></i> 1.5k comments </span><p>
                                 </div>
                             </div>
                         <div class="blog-details">
                             <h3>I’m satisfy with their services</h3>
                             <p>Lorem Ipsum is simply dummy text of the printing andg industry. Lorem Ipsum has been the indusys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                             <a href="blog-details.html">read more <i class="fa fa-long-arrow-right"></i> </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4 col-sm-4">
                     <div class="blog-item">
                         <div class="blog-img">
                             <img src="{{url('/front')}}/images/blog3.jpg" alt="blog-img" class="img-responsive">
                                 <div class="overlay3">
                                      <h4><i class="fa fa-calendar"></i> 26 October 2017</h4>
                                      <a href="blog-details.html"><i class="fa fa-link"></i> </a>
                                      <p><span><i class="fa fa-user"></i> By: Admin </span> <span><i class="fa fa-user"></i>  2.5k Likes </span> <span><i class="fa fa-comment"></i> 1.5k comments </span><p>
                                 </div>
                             </div>
                         <div class="blog-details">
                             <h3>I’ll never forget their hospitality</h3>
                             <p>Lorem Ipsum is simply dummy text of the printing andg industry. Lorem Ipsum has been the indusys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
                             <a href="blog-details.html">read more <i class="fa fa-long-arrow-right"></i> </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Blog Part End -->
@endsection
