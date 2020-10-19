<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubcategoryController extends Controller

{
    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }

    //for add subcategory
    public function addsubcat(){
        $title="Add Subcategory || Kena-Kata Admin Pannel";
        $category= Category::orderBy('category_name', 'asc')->get();
        return view('backend.subcategory.add_subcat',compact('title','category'));
    }

    //for subcategory post
    public function subcatpost(Request $request){
        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',

        ]);
        $subcat = new SubCategory;
        $subcat->category_id = $request->category_id;
        $subcat->subcategory_name = $request->subcategory_name;
        $subcat->created_at = Carbon::now();
        $subcat->save();
        return back()->withSuccessMessage('Product Subcategory Successfully Added!');

    }

    //view all subcategory
    public function showsubcat(){

        $title="View All Subcategory || kena-Kata Admin Pannel";

        $subcat= SubCategory::paginate(10);

      return view('backend.subcategory.view_subcat',compact('title','subcat'));
    }

    //single subcategory view
    public function singlesubcategory($id){
        $title= "Single Subcategory || kena-Kata Admin Pannel";
        $subcat= SubCategory::findOrfail($id);
        return view ('backend.subcategory.single_subcategory',compact('subcat','title'));
    }

    //edit subcategory
    public function editsubcategory($id){
    $title= "Edit & Update subcategory || Kena-Kata Admin pannel";
    $category= Category::orderBy('category_name', 'asc')->get();
    $subcat= SubCategory::findOrfail($id);
    return view('backend.subcategory.edit_subcategory',compact('title','subcat','category'));
    }

    //update subcategory
    public function updatesubcategory(Request $request,$id){
        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',

        ]);

        $subcat= SubCategory::findOrfail($id);
        $subcat->subcategory_name = $request->subcategory_name;
        $subcat->category_id = $request->category_id;
        $subcat->created_at = Carbon::now();
        $subcat->save();
        return redirect()->route('view-subcategory')->withSuccessMessage('Product Subcategory Successfully Updated!');


    }

    //delete subcategory
    public function deletesubcategory($id){
        $subcat= SubCategory::findOrfail($id);
        $subcat->delete();
        return back()->withSuccessMessage('Subcategory Deleted!');

    }



}
