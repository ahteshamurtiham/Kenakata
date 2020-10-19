@extends('backend.master')


@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product Category</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-category') }}" style="color:brown">Product All Category</a></li>

            <li class="active" style="color:black"> Product Single Category</li>
        </ol>
    </div>
</div>


<div class="panel bg-light" style="margin-top:50px;">
    <div class="panel-heading clearfix">
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">Product Single View Category</h4>
    </div>
    <div class="panel-body bg-light ">
        <table class="table table-bordered  " style="color:black;">
            <tr>
                <td style="color:brown">Product Category:</td>
                <td>{{ $category->category_name }}</td>
            </tr>
            <tr>
                <td style="color:brown">Created At:</td>
                    <td>{{$category->created_at}}</td>
                </tr>


        </table>
    </div>
</div>



@endsection
