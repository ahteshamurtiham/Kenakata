<?php

namespace App\Http\Controllers;

use App\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
Use Image;

class BannerController extends Controller
{
    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }

    //add banner
    function addbanner(){
        $title = "ADD Banner||Kena-kata admin Pannel";
        return view('backend.banner.add_banner',compact('title'));
    }

    //banner post
    function bannerpost(Request $request){
        $validatedData = $request->validate([
            'banner_image' => 'required',

        ]);

      if($request->hasfile('banner_image')){
          $image= $request->file('banner_image');
          $ext = Str::random(10).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(1920,600)->save(base_path('public/front/banner/'.$ext));

          $banner = new Banner;
          $banner->banner_title1 = $request->banner_title1;
          $banner->banner_title2 = $request->banner_title2;
          $banner->banner_button1 = $request->banner_button1;
          $banner->banner_button2 = $request->banner_button2;
          $banner->banner_description = $request->banner_description;
          $banner->banner_image = '/front/banner/'.$ext ?? '';
          $banner->created_at =  Carbon::now();
          $banner->save();

          return back()->withSuccessMessage('Banner items Successfully Added!');
      }
      else{
        return back()->withSuccessMessage('Banner items Not Added!');
      }

    }

    //show all banner
    function viewbanner(){
        $title = "View Banner || Kena-kata Admin Pannel";
        $banner = Banner::all();
        return view('backend.banner.view_banner',compact('title','banner'));
    }
    //single view banner

    function showsinglebanner($id){
        $title = "Single View Banner || Kena-kata Admin Pannel";
        $banner = Banner::findOrfail($id);
        return view('backend.banner.single_banner',compact('title','banner'));

    }

    //edit single banner

    function editsinglebanner($id){
        $title = "Edit Single Banner || Kena-kata Admin Pannel";
        $banner = Banner::findOrfail($id);
        return view('backend.banner.edit_banner',compact('title','banner'));
    }

    //update banner

    function updatebanner(Request $request,$id){

        $banner= Banner::findOrfail($id);

        if($request->hasfile('banner_image')){
            $image= $request->file('banner_image');
            $ext = Str::random(10).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,600)->save(base_path('public/front/banner/'.$ext));


            $banner->banner_title1 = $request->banner_title1;
            $banner->banner_title2 = $request->banner_title2;
            $banner->banner_button1 = $request->banner_button1;
            $banner->banner_button2 = $request->banner_button2;
            $banner->banner_description = $request->banner_description;
            $banner->banner_image = '/front/banner/'.$ext ?? '';
            $banner->created_at =  Carbon::now();
            $banner->save();

            return redirect()->route('view-banner')->withSuccessMessage('Banner items Successfully Updated!');
        }
        else{


            $banner->banner_title1 = $request->banner_title1;
            $banner->banner_title2 = $request->banner_title2;
            $banner->banner_button1 = $request->banner_button1;
            $banner->banner_button2 = $request->banner_button2;
            $banner->banner_description = $request->banner_description;

            $banner->created_at =  Carbon::now();
            $banner->save();

          return redirect()->route('view-banner')->withSuccessMessage('Banner items Updated!');
        }


    }

    //delete banner
    function deletebanner($id){
        $banner= Banner::findOrfail($id);
        $banner->delete();
        return back()->withSuccessMessage('Banner items Deleted!');
    }

}
