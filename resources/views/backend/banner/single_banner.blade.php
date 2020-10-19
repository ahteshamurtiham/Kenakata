@extends('backend.master')


@section('content')

<div class="page-title " >
    <h3 style="color:black;">Banner Details</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-banner') }}" style="color:brown">all Banner</a></li>

            <li class="active" style="color:black"> Single View Banner</li>
        </ol>
    </div>
</div>


<div class="panel bg-light" style="margin-top:50px;">
    <div class="panel-heading clearfix">
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; "> Single View Banner</h4>
    </div>
    <div class="panel-body bg-light ">
        <table class="table table-bordered  " style="color:black;">
            <tr>
                <td style="color:brown">Banner Title1:</td>
                <td>{{ $banner->banner_title1}}</td>
            </tr>
            <tr>
                <td style="color:brown">Banner Title2:</td>
                <td>{{ $banner->banner_title2}}</td>
            </tr>
            <tr>
                <td style="color:brown">Banner Description:</td>
                <td>{{ $banner->banner_description}}</td>
            </tr>
            <tr>
                <td style="color:brown">Banner Button1:</td>
                <td>{{ $banner->banner_button1}}</td>
            </tr>
            <tr>
                <td style="color:brown">Banner Button2:</td>
                <td>{{ $banner->banner_button2}}</td>
            </tr>

            <tr>
                <td style="color:brown">Created At:</td>
                    <td>{{$banner->created_at}}</td>
                </tr>


        </table>
         <p  style="color:brown; float:left; margin-top:20px;">Banner Image:</p>
         <img style="width:350px; height:280px; float:left;  margin-left:30px; margin-top:20px;" src="{{ $banner->banner_image }}" alt="">

    </div>
</div>



@endsection
