@extends('backend.master')


@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-product') }}" style="color:brown">All product</a></li>

            <li class="active" style="color:black"> Product Single View</li>
        </ol>
    </div>
</div>


<div class="panel bg-light" style="margin-top:50px;">
    <div class="panel-heading clearfix">
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">Single Product View </h4>

    </div>


    <div class="panel-body bg-light" style="margin-top:60px;">
        <div>
            <a class="btn btn-warning" style="float:right; color:black; margin-top:-50px;" href="{{ route('view-product') }}"><i class="fa fa-list"></i>  View List</a>
        </div>
        <table class="table table-bordered" style="color:black; ">
            <tr>
                <td style="color:brown">Product Name:</td>
                <td>{{ $product->product_name }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Slug:</td>
                <td>{{ $product->pro_slug }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Category:</td>
                <td>{{ $product->category->category_name }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Subcategory:</td>
                <td>{{ $product->subcat->subcategory_name }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Price:</td>
                <td>$ {{ $product->product_price }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Color:</td>
                <td>
                    @php
                    $total_count= Count(json_decode($product->product_color));
                    $flag=1;
                @endphp

                @foreach (json_decode($product->product_color) as $color)
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
            </tr>

            <tr>
                <td style="color:brown">Product Size:</td>
                <td>
                   @php
                   if(json_decode($product->product_size) !=null){

                    @endphp

                    @php

                        $total_count= Count(json_decode($product->product_size));
                        $flag=1;

                @endphp

                @foreach (json_decode($product->product_size) as $size)
                {{ $size }}

                @php
                if($flag < $total_count)
                     {
                         echo ",";
                     }
                $flag++
                 @endphp

                @endforeach

                @php
            }
            else{
                echo "N/A";
            }
                @endphp

                </td>
            </tr>

            <tr>
                <td style="color:brown">Product Summary:</td>
                <td> {{ $product->product_summary }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Description:</td>
                <td> {{ $product->product_description }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Quantity:</td>
                <td> {{ $product->product_quantity }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Alert Quantity:</td>
                <td> {{ $product->alert_quantity }}</td>
            </tr>
            <tr>
                <td style="color:brown">Product Feature Image:</td>
                <td >
                    <img   style="width:120px;" src="{{ $product->product_image }}">


                </td>

            </tr>
            <tr>
                <td style="color:brown">Product Multiple Image:</td>
                <td>
                     @foreach (App\ProductImage::where('product_id',$product->id)->get() as $image)
                    <img style="width:120px" src="{{ $image->product_image }}">
                    @endforeach
                </td>
            </tr>

            <tr>
                <td style="color:brown">Created At:</td>
                    <td>{{$product->created_at}}</td>
                </tr>


        </table>
    </div>
</div>



@endsection
