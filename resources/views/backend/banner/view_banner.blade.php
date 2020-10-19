@extends('backend.master')
@section('view_banner')
    active
@endsection


@section('content')


<div class="page-title " >
    <h3 style="color:black;">Banner Details</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('add-banner') }}" style="color:brown">Add Banner</a></li>

            <li class="active" style="color:black">View Banner Details</li>
        </ol>
    </div>
</div>
{{-- notification
@if (session('successMsg'))
<div class="alert alert-success" style="font-size:22px; color:forestgreen;" role="alert">
    {{ session('successMsg') }}
  </div>

@endif --}}

<div class="panel bg-light" style="margin-top:50px;">
    <div class="panel-heading clearfix">
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">All Banner Details</h4>
    </div>

    <div class="panel-body bg-warning  " style="margin-top:60px;">
        <a href="{{route('add-banner')}}" style="float:right; margin-top:-50px;" class="btn btn-success a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Add Banner</strong></span>
        </a>
        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th>Banner Id</th>
                    <th>Banner Image</th>
                    <th>Banner Title1</th>
                    <th>Banner Title2</th>
                    <th>Banner Description</th>
                    <th>Banner Button1</th>
                    <th>Banner Button2</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banner as $item )
                <tr>

                       <td style="width:10px;">{{ $item->id }}</td>
                       <td><img style="width:100px; height:60px;" src="{{ $item->banner_image }}" alt=""></td>
                       <td style="width:10px;">{{ $item->banner_title1}}</td>
                       <td>{{ $item->banner_title2 }}</td>
                       <td style="width:10px;">{{ Str::substr($item->banner_description,0,40 )}}.....<span style="color:red;">View more</span></td>
                       <td style="width:10px;">{{ $item->banner_button1 }}</td>
                       <td style="width:10px;">{{ $item->banner_button2 }}</td>
                       <td style="width:10px;">{{ $item->created_at }}</td>



                       <td>
                       <a href="{{url('singleview-banner/'.$item->id)}}" class="btn btn-sm btn-success">View</a>
                       <a href="{{url('singleedit-banner/'.$item->id)}}" class="btn btn-sm btn-primary">Edit</a>

                       <a href="{{url('delete-banner/'.$item->id)}}" class="btn btn-sm btn-danger">Delete</a>
                       </td>
                   </tr>
                @endforeach

               </tbody>
        </table>
    </div>
</div>



@endsection
