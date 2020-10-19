@extends('backend.master')

@section('add_coupon')
    active
@endsection

@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product Coupon</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-color') }}" style="color:brown">View Product all Coupon</a></li>

            <li class="active" style="color:black">Add Product Coupon</li>
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
                    <a class="btn btn-warning" style="float:right; color:black; margin-top:20px;" href="{{ route('view-coupon') }}"><i class="fa fa-list"></i>  View List</a>
                  </div>
                <div class="panel-heading clearfix">
                    <h4 class="panel-title " style="font-size:28px; color:black; margin-left:270px;">Add Product Coupon</h4>
                </div>

                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{route('coupon-post')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="coupon_code" class="col-sm-2 control-label">Coupon Code</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('coupon_code') }}" class="form-control" id="coupon_code" name="coupon_code" placeholder="Coupon Code">

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="coupon_discount" class="col-sm-2 control-label"> Coupon Discount</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('coupon_discount') }}" class="form-control" id="coupon_discount" name="coupon_discount" placeholder="Coupon Discount">

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="coupon_validity" class="col-sm-2 control-label">Coupon Expired Date</label>
                            <div class="col-sm-10">
                                <input type="date" value="{{ old('coupon_validity') }}" class="form-control" id="coupon_validity" name="coupon_validity" placeholder="Coupon Expired Date">

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
