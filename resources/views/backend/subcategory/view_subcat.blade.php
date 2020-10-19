@extends('backend.master')
@section('show_subcategory')
    active
@endsection


@section('content')


<div class="page-title " >
    <h3 style="color:black;">Product SubCategory</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('add-subcategory') }}" style="color:brown">Product add SubCategory</a></li>

            <li class="active" style="color:black">View Product SubCategory</li>
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
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">Product All SubCategory</h4>
    </div>

    <div class="panel-body bg-warning "  style="margin-top:60px;" >

            <a href="{{route('add-subcategory')}}" style="float:right; margin-top:-50px;" class="btn btn-success a-btn-slide-text">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                <span><strong>Add SubCategory</strong></span>
            </a>
        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th>Product SubCategory Id</th>
                    <th>Product Category</th>
                    <th>Product SubCategory</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcat as $scat )
                <tr>

                       <td>{{ $scat->id }}</td>
                       <td>{{ $scat->category->category_name }}</td>
                       <td>{{ $scat->subcategory_name }}</td>
                       <td>{{ $scat->created_at }}</td>



                       <td>
                       <a href="{{url('single-subcategory/'.$scat->id)}}" class="btn btn-sm btn-success">View</a>
                       <a href="{{url('edit-subcategory/'.$scat->id)}}" class="btn btn-sm btn-primary">Edit</a>

                       <a href="{{url('delete-subcategory/'.$scat->id)}}" class="btn btn-sm btn-danger">Delete</a>
                       </td>
                   </tr>
                @endforeach

               </tbody>
        </table>

        {{ $subcat->links() }}
    </div>
</div>



@endsection
