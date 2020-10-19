@extends('backend.master')
@section('view_product')
    active
@endsection


@section('content')


<div class="page-title " >
    <h3 style="color:black;">Product </h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('add-product') }}" style="color:brown">Add Product</a></li>

            <li class="active" style="color:black">View Product </li>
        </ol>
    </div>
</div>
{{-- notification --}}
@if (session('successMsg'))
<div class="alert alert-success" style="font-size:22px; color:forestgreen;" role="alert">
    {{ session('successMsg') }}
  </div>

@endif

<div class="panel bg-secondary" style="margin-top:50px;">
    <div class="panel-heading clearfix">
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">View All Product</h4>

    </div>


    <div class="panel-body bg-secondary " style="margin-top:60px;">
        <a href="{{route('add-product')}}" style="float:right; margin-top:-50px;" class="btn btn-success a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Add Product</strong></span>
        </a>

        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Feature Image</th>
                    <th>Product Name</th>
                    {{--  <th>Multiple Images</th>  --}}
                    <th>Category</th>
                    <th>Price</th>
                    {{--  <th>Quantity</th>  --}}
                    <th>Color</th>
                    <th>Created_At</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
               @forelse ($product as $key => $item)

               <tr>
                   <td style="width:5%;">{{ $product->firstItem() +$key }}</td>
                   <td><img style="width:100px" src="{{ $item->product_image }}"></td>

                   <td style="width:15%">{{$item->product_name}}</td>
                   {{--  <td>
                    @foreach (App\ProductImage::where('product_id',$item->id)->get() as $image)
                    <img style="width:100px" src="{{ $image->product_image }}">
                    @endforeach
                   </td>  --}}

                    <td style="width:5%;">{{ $item->category->category_name }}</td>
                    <td>$ {{$item->product_price}}</td>

                    {{--  <td>{{ $item->product_quantity }}</td>  --}}
                   <td style="width:8%;">
                       @php
                           $total_count= Count(json_decode($item->product_color));
                           $flag=1;
                       @endphp

                       @foreach (json_decode($item->product_color) as $color)
                       {{ $color }}

                       @php
                       if($flag < $total_count)
                            {
                                echo ",";
                            }
                       $flag++
                        @endphp


                       @endforeach

                   </td>

                   <td>{{ $item->created_at->format('Y-m-d') }}</td>
                   {{--  action td  --}}
                   <td>

                    <a href="#" class="btn btn-info ">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Edit</strong></span>
                    </a>

                    <a href="{{ url('single-product/'.$item->id) }}" class="btn btn-warning ">
                        <span  style="color:black;" class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        <span style="color:black;"><strong>View</strong></span>
                    </a>
                    <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger ">
                       <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span><strong>Delete</strong></span>
                    </a>

                    </td>

               </tr>


               @empty
                 <td colspan="50" class="text-center" style="color:red; font-size:20px;">No Data Available!</td>
               @endforelse

               </tbody>
        </table>

        {{ $product->links() }}
    </div>
</div>



@endsection
