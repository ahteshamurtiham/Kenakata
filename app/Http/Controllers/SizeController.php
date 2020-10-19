<?php

namespace App\Http\Controllers;

use App\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;


class SizeController extends Controller
{
    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }

    public function sizeform(){
        return view('backend.size.add_size');
    }

    //for size post
    public function sizepost(Request $request){

        $validatedData = $request->validate([
            'product_size' => 'required|unique:sizes',

        ]);
      Size::insert([
          'product_size' => $request->product_size,
          'created_at' => Carbon::now()
      ]);

      return back()->withSuccessMessage('Product Size Successfully Added!');
    }
//for show product size
    function showsize(){

        $size=Size::all();

       return view('backend.size.show_size',compact('size'));
   }

   //for view single size

   public function showsinglesize($id){
      $size=Size::findOrfail($id);
      return view('backend.size.singleview_size',compact('size'));
   }

   //for edit single size
   public function editsinglesize($id){
    $size=Size::findOrfail($id);
    return view('backend.size.editsingle_size',compact('size'));
 }

 //for update size
  public function updatesize(Request $request,$id){
       $validatedData = $request->validate([
            'product_size' => 'required|unique:sizes',

        ]);
       $size= Size::findOrfail($id);
       $size->product_size = $request->product_size;
       $size->save();
       return redirect()->route('view-size')->withSuccessMessage('Product Size Successfully Updated!');
  }

  //for delete size
  public function deletesize($id){
    $size= Size::findOrfail($id);

    $size->delete();
    return back()->withSuccessMessage('Product Size Deleted!');
}



}
