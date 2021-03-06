@extends('backend.master')

@section('add_color')
    active
@endsection

@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product Color</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-color') }}" style="color:brown">View Product all Color</a></li>

            <li class="active" style="color:black">Add Product Color</li>
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
                <div>
                    <a class="btn btn-warning" style="float:right; color:black; margin-top:20px;" href="{{ route('view-color') }}"><i class="fa fa-list"></i>  View List</a>
                  </div>
                <div class="panel-heading clearfix">
                    <h4 class="panel-title " style="font-size:28px; color:black; margin-left:270px;">Add Product Color</h4>
                </div>

                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{route('color-post')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product Color</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('color_name') }}" class="form-control" id="inputEmail3" name="color_name" placeholder="Product Color">

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
