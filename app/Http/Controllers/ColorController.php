<?php

namespace App\Http\Controllers;

use App\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }


  //for add color controller
  public function addcolor(){
      return view('backend.color.add_color');
  }

  //for color post
  public function colorpost(Request $request){
    $validatedData = $request->validate([
        'color_name' => 'required|unique:colors',

    ]);

    $color= new Color;
    $color->color_name = $request->color_name;
    $color->created_at = Carbon::now();
    $color->save();

    return back()->withSuccessMessage('Product Color Successfully Added!');
  }
  //for view product all color
  public function showcolor(){
    $color= Color::all();
    return view('backend.color.show_color',compact('color'));
  }

//for single color view
    public function showsinglecolor($id){
     $color=Color::findOrfail($id);
      return view('backend.color.single_color',compact('color'));
 }

 // for edit single color
   public function editsinglecolor($id){
       $color=Color::findOrfail($id);
       return view('backend.color.singleedit_color',compact('color'));
   }

//for update color
public function updatecolor(Request $request,$id){
    $validatedData = $request->validate([
         'color_name' => 'required|unique:colors',

     ]);
    $color= Color::findOrfail($id);
    $color->color_name = $request->color_name;
    $color->save();
    return redirect()->route('view-color')->withSuccessMessage('Product Color Successfully Updated!');
}

  //for delete color
  public function deletecolor($id){
      $color= Color::findOrfail($id);
      $color->delete();
      return back()->withSuccessMessage('Product Color Deleted!');

  }







}
