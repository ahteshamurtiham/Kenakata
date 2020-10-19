<?php



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'FrontendController@frontend')->name('frontend');
//localize translate er jonno
Route::get('/trans/{lang}', 'FrontendController@frontend')->name('frontendlocal');
// for search & gird view product
Route::get('/product/shop/page', 'FrontendController@searchall')->name('shop-page');

//shop page theke category te click korle shei category onojayi product ashbe
Route::get('/shop/page/category/product/{id}', 'FrontendController@catagoryshop')->name('category-shoppage');

//for single product details
Route::get('/product/{pro_slug}', 'FrontendController@productdetails')->name('productdetails');
//single cart
Route::get('/product/single/cart/{pro_slug}', 'CartController@singlecart')->name('singlecart');
Route::post('/product/single/details/{id}', 'CartController@singledetails')->name('singledetails');
Route::get('/single/cart/delete/{cart_id}', 'CartController@deletesinglecart')->name('singlecartdelete'); //id o dhorte pari ba onno namdieo dhore pass korte pari

//view shopping carts
Route::get('/shopping/carts', 'CartController@shopcart')->name('shoppingcarts');
Route::post('/update/cart', 'CartController@updatecart')->name('update-cart');

// for coupon code and back front page
Route::get('/shopping/carts/coupon/{coupon_code}', 'CartController@shopcart')->name('couponcarts');

//checkout route
Route::get('/shopping/carts/checkout', 'CheckoutController@checkout')->name('checkout');
//country te click korle tar city gola ashbe shei route
Route::get('/country/cities/{city_id}', 'CheckoutController@cityajax')->name('cityAjax');
//shipping post

Route::post('/shipping/post', 'CheckoutController@shippingpost')->name('shipping-post');

// social login
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');





Auth::routes(['verify' => true]);

// for product metarials route
Route::group(['middleware' => 'auth'], function () {

    //logout

    Route::get('/logout', 'Auth\LoginController@logout');

    //user role view user
    Route::get('/view/user', 'RoleController@viewrole')->name('view-user');
    Route::get('/edit-user/{id}', 'RoleController@editrole')->name('edit-user');
    Route::post('/update-role/{id}', 'RoleController@updaterole')->name('update-role');


    //for banner part
   Route::get('/add/banner', 'BannerController@addbanner')->name('add-banner');
   Route::post('/banner/post', 'BannerController@bannerpost')->name('banner-post');
   Route::get('/view/banner', 'BannerController@viewbanner')->name('view-banner');
   Route::get('/singleview-banner/{id}', 'BannerController@showsinglebanner');
   Route::get('/singleedit-banner/{id}', 'BannerController@editsinglebanner');
   Route::post('/update-banner/{id}', 'BannerController@updatebanner');
   Route::get('/delete-banner/{id}', 'BannerController@deletebanner');



    //for product size
   Route::get('/add-size', 'SizeController@sizeform')->name('sizeform');
   Route::post('/size/post', 'SizeController@sizepost')->name('size-post');
   Route::get('/view/size', 'SizeController@showsize')->name('view-size');
   Route::get('/singleview-size/{id}', 'SizeController@showsinglesize');
   Route::get('/singledit-size/{id}', 'SizeController@editsinglesize');
   Route::post('/update-size/{id}', 'SizeController@updatesize');
   Route::get('/delete-size/{id}', 'SizeController@deletesize');

// for product color
  Route::get('/add/color', 'ColorController@addcolor')->name('add-color');
  Route::post('/color/post', 'ColorController@colorpost')->name('color-post');
  Route::get('/view/color', 'ColorController@showcolor')->name('view-color');
  Route::get('/singleview-color/{id}', 'ColorController@showsinglecolor');
  Route::get('/singledit-color/{id}', 'ColorController@editsinglecolor');
  Route::post('/update-color/{id}', 'ColorController@updatecolor');
  Route::get('/delete-color/{id}', 'ColorController@deletecolor');

  //for product category
  Route::get('/add/category', 'CategoryController@addcategory')->name('add-category');
  Route::post('/category/post', 'CategoryController@categorypost')->name('category-post');
  Route::get('/view/category', 'CategoryController@showcategory')->name('view-category');
  Route::get('/singleview-category/{id}', 'CategoryController@showsinglecategory');
  Route::get('/singleedit-category/{id}', 'CategoryController@editcategory');
  Route::post('/update-category/{id}', 'CategoryController@updatecategory');
  Route::get('/delete-category/{id}', 'CategoryController@deletecategory');

  //for product subcategory
  Route::get('/add/subcategory', 'SubcategoryController@addsubcat')->name('add-subcategory');
  Route::post('/subcategory/post', 'SubcategoryController@subcatpost')->name('subcategory-post');
  Route::get('/view/subcategory', 'SubcategoryController@showsubcat')->name('view-subcategory');
  Route::get('/single-subcategory/{id}', 'SubcategoryController@singlesubcategory');
  Route::get('/edit-subcategory/{id}', 'SubcategoryController@editsubcategory');
  Route::post('/update-subcategory/{id}', 'SubcategoryController@updatesubcategory');
  Route::get('/delete-subcategory/{id}', 'SubcategoryController@deletesubcategory');

  //for product
  Route::get('/add/product', 'ProductController@addproduct')->name('add-product');
  Route::post('/product/post', 'ProductController@productpost')->name('product-post');
  Route::get('/view/product', 'ProductController@viewproduct')->name('view-product');
  Route::get('/single-product/{id}', 'ProductController@singleproduct');
  Route::get('/delete-product/{id}', 'ProductController@deleteproduct');



  Route::get('/subcategory-ajax/{cat_id}', 'ProductController@subcatAjax')->name('subcatAjax'); //caegoryr auto subcat gola paoar jonno

  //Coupon route
  Route::get('/add/coupon','CouponController@addcoupon')->name('add-coupon');
  Route::post('/coupon/post', 'CouponController@couponpost')->name('coupon-post');
  Route::get('/view/coupon', 'CouponController@viewcoupon')->name('view-coupon');


  //for report
  Route::get('/view/report', 'HomeController@viewreport')->name('view-report');

  //download excel
  Route::get('/export/report/excel', 'HomeController@exportexcel')->name('export-excel');

  //download pdf
  Route::get('/export/report/pdf', 'HomeController@exportpdf')->name('export-pdf');








});




