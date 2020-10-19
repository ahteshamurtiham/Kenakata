@extends('backend.master')
@section('show_color')
    active
@endsection


@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product Color</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('add-color') }}" style="color:brown">Add Product Color</a></li>

            <li class="active" style="color:black">Product All Color</li>
        </ol>
    </div>
</div>
{{-- notification --}}
@if (session('successMsg'))
<div class="alert alert-success" style="font-size:22px; color:forestgreen;" role="alert">
    {{ session('successMsg') }}
  </div>

@endif

<div class="panel bg-light" style="margin-top:50px;">
    <div class="panel-heading clearfix">
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">Product All Color</h4>
    </div>

    <div class="panel-body bg-warning " style="margin-top:60px;">
        <a href="{{route('add-color')}}" style="float:right; margin-top:-50px;" class="btn btn-success a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Add Color</strong></span>
        </a>
        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th>Product Color Id</th>
                    <th>Product Color</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($color as $all )
                <tr>

                       <td>{{ $all->id }}</td>
                       <td>{{ $all->color_name }}</td>
                       <td>{{ $all->created_at }}</td>



                       <td>
                       <a href="{{url('singleview-color/'.$all->id)}}" class="btn btn-sm btn-success">View</a>
                       <a href="{{url('singledit-color/'.$all->id)}}" class="btn btn-sm btn-primary">Edit</a>

                       <a href="{{url('delete-color/'.$all->id)}}" class="btn btn-sm btn-danger">Delete</a>
                       </td>
                   </tr>
                @endforeach

               </tbody>
        </table>
    </div>
</div>



@endsection
