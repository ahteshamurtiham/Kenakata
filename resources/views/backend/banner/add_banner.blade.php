@extends('backend.master')

@section('add_banner')
    active
@endsection

@section('content')

<div class="page-title " >
    <h3 style="color:black;">Banner</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-banner') }}" style="color:brown">View All Product</a></li>

            <li class="active" style="color:black">Add Banner</li>
        </ol>
    </div>
</div>


        <div class="col-md-10 col-md-offset-1 " style="margin-top:100px;">

            <div class="panel panel-white  ">
                <div>
                    <a class="btn btn-warning" style="float:right; color:black; margin-top:20px;" href="{{ route('view-banner') }}"><i class="fa fa-list"></i>  View List</a>
                  </div>
                <div class="panel-heading clearfix">
                    <h4 class="panel-title " style="font-size:28px; color:black; margin-left:270px;">Add Banner </h4>
                </div>

                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{ route('banner-post') }}" method="post" enctype="multipart/form-data">
                    @csrf

                   {{-- //Banner Title1 --}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Banner Title1</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('banner_title1') }}" class="form-control" id="banner_title1" name="banner_title1" placeholder="Title1">

                        </div>

                    </div>

             {{-- //Banner Title2 --}}
             <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Banner Title2</label>
                <div class="col-sm-10">
                <input type="text" value="{{ old('banner_title2') }}" class="form-control" id="banner_title2" name="banner_title2" placeholder="Title2">

                 </div>

             </div>

  {{-- //banner Description --}}
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Banner Description</label>
        <div class="col-sm-10">
            <textarea name="banner_description" id="" class="from-control" ></textarea>

        </div>
    </div>

    {{-- feature images --}}
        <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">Banner Image</label>
        <div class="col-sm-10">
            <input type="file"  class="form-control" id="banner_image" name="banner_image" placeholder="Banner Image" >

        </div>

     </div>
     {{-- //Banner Button1 --}}
     <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Banner Button1</label>
        <div class="col-sm-10">
            <input type="text" value="{{ old('banner_button1') }}" class="form-control" id="banner_button1" name="banner_button1" placeholder="button1">

        </div>

    </div>
      {{-- //Banner Button2 --}}
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Banner Button2</label>
        <div class="col-sm-10">
            <input type="text" value="{{ old('banner_button2') }}" class="form-control" id="banner_button2" name="banner_button2" placeholder="button2">

        </div>

    </div>








                        @if ($errors->any())
                               <div class="alert alert-danger">
                     <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                      </div>
                        @endif

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



@endsection

