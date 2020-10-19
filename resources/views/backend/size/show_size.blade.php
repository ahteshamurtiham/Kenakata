@extends('backend.master')
@section('show_size')
    active
@endsection


@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product Size</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ url('/home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ url('/add-size') }}" style="color:brown">Add Product Size</a></li>

            <li class="active" style="color:black">Product All Size</li>
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
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">Product All Size</h4>
    </div>

    <div class="panel-body bg-warning " style="margin-top:50px;">
        <a href="{{route('sizeform')}}" style="float:right; margin-top:-50px;" class="btn btn-success a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Add Size</strong></span>
        </a>
        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th>Product Size Id</th>
                    <th>Product Size</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($size as $all )
                <tr>

                       <td>{{ $all->id }}</td>
                       <td>{{ $all->product_size }}</td>
                       <td>{{ $all->created_at }}</td>



                       <td>
                       <a href="{{url('singleview-size/'.$all->id)}}" class="btn btn-sm btn-success">View</a>
                           <a href="{{url('singledit-size/'.$all->id)}}" class="btn btn-sm btn-primary">Edit</a>

                           <a href="{{url('delete-size/'.$all->id)}}" class="btn btn-sm btn-danger">Delete</a>
                       </td>
                   </tr>
                @endforeach

               </tbody>
        </table>
    </div>
</div>



@endsection
