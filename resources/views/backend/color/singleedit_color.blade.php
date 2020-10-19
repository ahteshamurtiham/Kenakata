@extends('backend.master')



@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product Color</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-color') }}" style="color:brown"> Product all Color</a></li>

            <li class="active" style="color:black">Edit Product Color</li>
        </ol>
    </div>
</div>

        <div class="col-md-10 col-md-offset-1 " style="margin-top:100px;">
            <div class="panel panel-white  ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title " style="font-size:28px; color:black; margin-left:270px;">Update Product Color</h4>
                </div>
                {{-- @if (session('errorMsg'))
                <div class="alert alert-danger" role="alert">
                    {{ session('errorMsg') }}
                  </div>

                @endif --}}
                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{url('update-color/'.$color->id)}}" method="post">

                    @csrf
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product Color</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="color_name" value="{{$color->color_name}}" placeholder="Color">

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
