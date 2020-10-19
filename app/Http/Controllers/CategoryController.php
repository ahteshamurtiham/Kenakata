<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }

    //for add category
    public function addcategory(){
        $title="Product Add Category || Kena-Kata Admin Pannel";
        return view('backend.category.add_category',compact('title'));
    }
   //for category post
    public function categorypost(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories',

        ]);
        $category= new Category;
        $category->category_name = $request->category_name;
        $category->created_at = Carbon::now();
        $category->save();
        return back()->withSuccessMessage('Product Category Successfully Added!');

    }
   //for view category
    public function showcategory(){
        $title="Product Category View || kena-kata Admin Pannel";
        $category= Category::all();
        return view('backend.category.show_category',compact('category','title'));
    }

    //view single category
    public function showsinglecategory($id){
    $title= "View Single Category || Kena-Kata Admin Pannel";
    $category= Category::findOrfail($id);
    return view('backend.category.single_category',compact('category','title'));


    }

    //single edit category
    public function editcategory($id){
     $title= "Edit Product Category || Kena-Kata Admin Pannel";
     $category= Category::findOrfail($id);
    return view('backend.category.edit_category',compact('category','title'));


    }

    //update category
    public function updatecategory(Request $request,$id){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories',

        ]);

        $category= Category::findOrfail($id);
        $category->category_name= $request->category_name;
        $category->created_at = Carbon::now();
        $category->save();
        return redirect()->route('view-category')->withSuccessMessage('Product Category Successfully Updated!');
    }

    //for delete category
    public function deletecategory($id){
        $category= Category::findOrfail($id);
        $category->delete();
        return back()->withSuccessMessage('Product Category Deleted!');

    }


}
