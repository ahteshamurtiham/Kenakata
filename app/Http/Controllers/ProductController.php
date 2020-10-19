<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Product;
use App\Size;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
Use Str;
Use Image;
Use App\ProductImage;

class ProductController extends Controller
{

    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }

    //for add product
    public function addproduct(){
        $title= "Add Product || kena-kata Admin Pannel";
        $category= Category::orderBy('category_name', 'asc')->get();
        $subcategory = SubCategory::orderby('subcategory_name', 'asc')->get();
        $colors= Color::orderBy('color_name', 'asc')->get();
        $sizes= Size::orderBy('product_size', 'asc')->get();

        return view('backend.product.add_product',compact('title','category','colors','sizes','subcategory'));
    }

     //for product post
     function productpost(Request $request){


        $validatedData = $request->validate([
            'product_name' => 'required|unique:products',


        ]);

        $color=$request->product_color;
        $size= $request->product_size;
        if($request->hasfile('pro_image') || $request->hasfile('product_image')){

             //single imag er jonno
            if($request->hasfile('pro_image') !=null){

             $image= $request->file('pro_image');
             $ext = Str::random(10).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(600,680)->save(base_path('public/front/product/'.$ext));


            }
            else{
                   $ext= "";
                 }

            $product_id = Product::insertGetId([

                    'product_name'=>$request->product_name,
                    'pro_slug'=>$request->pro_slug,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'product_price'=>$request->product_price,
                    'product_color'=>json_encode($color),
                    'product_size'=>json_encode($size),
                    'product_summary'=>$request->product_summary,
                    'product_description'=>$request->product_description,
                    'product_image'=> '/front/product/'.$ext ?? '',
                    'product_quantity'=>$request->product_quantity,
                    'alert_quantity'=>$request->alert_quantity,
                    'created_at'=>Carbon::now(),
            ]);

                $image= $request->file('product_image');
                foreach ($image as $value) {
                    $extension=Str::random(10).'.'.$value->getClientOriginalExtension();
                    Image::make($value)->resize(600,680)->save(base_path('public/front/product/'.$extension));

                    ProductImage::insert([

                        'product_id'=>$product_id,
                        'product_image'=>'/front/product/'.$extension,
                        'created_at'=>Carbon::now(),

                    ]);
                }
                return back()->withSuccessMessage('Product  Successfully Added!');

            }
           
            else{

                Product::insert([

                    'product_name'=>$request->product_name,
                    'pro_slug'=>$request->pro_slug,
                    'category_id'=>$request->category_id,
                    'subcategory_id'=>$request->subcategory_id,
                    'product_price'=>$request->product_price,
                    'product_color'=>json_encode($color),
                    'product_size'=>json_encode($size),
                    'product_summary'=>$request->product_summary,
                    'product_description'=>$request->product_description,

                    'product_quantity'=>$request->product_quantity,
                    'alert_quantity'=>$request->alert_quantity,
                    'created_at'=>Carbon::now(),
                ]);

                return back()->withSuccessMessage('Product  Successfully Added!');

            }


     }



    //for subcategory automatic
    function subcatAjax($cat_id){
        $sub_cat = SubCategory::where('category_id', $cat_id)->get();
        return Response()->json($sub_cat);
    }

    //for view product

    function viewproduct(){
        $title="View Product || kena-Kata Admin Pannel";
        $product= Product::paginate(5);

        return view('backend.product.view_product',compact('product','title'));
    }

    //for single product view
    function singleproduct($id){
        $title="Single Product view || Kena-Kata Admin Pannel";
        $product= Product::findOrfail($id);
        return View('backend.product.single_product',compact('title','product'));
    }

    //for delete product
    function deleteproduct($id){
        $product= Product::findOrfail($id);
        $product->delete();
        return back()->withSuccessMessage('Product Deleted!');

    }


}
