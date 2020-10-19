@extends('backend.master')

@section('add_subcategory')
    active
@endsection

@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product SubCategory</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-subcategory') }}" style="color:brown">View Product all SubCategory</a></li>

            <li class="active" style="color:black">Edit & Update SubCategory</li>
        </ol>
    </div>
</div>
   {{-- for notification --}}
   {{-- @if (session('successMsg'))
   <div class="alert alert-success" style="font-size:20px; color:forestgreen; " role="alert">
     {{ session('successMsg') }}
    </div>

   @endif --}}

        <div class="col-md-10 col-md-offset-1 " style="margin-top:100px;">
            <div class="panel panel-white  ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title " style="font-size:28px; color:black; margin-left:270px;">Edit Product SubCategory</h4>
                </div>

                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{ url('update-subcategory/'.$subcat->id) }}" method="post">
                    @csrf


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> Category Name</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="category_id" id="cat">
                              <option >{{ $subcat->category->category_name }}</option>
                              @foreach ($category as $item)
                              <option value="{{ $item->id }}">{{ $item->category_name}}</option>
                              @endforeach


                           </select>

                        </div>

                    </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product SubCategory</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $subcat->subcategory_name }}" class="form-control" id="inputEmail3" name="subcategory_name" placeholder="Product SubCategory">

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
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



@endsection
