@extends('backend.master')

@section('add_product')
    active
@endsection

@section('content')

<div class="page-title " >
    <h3 style="color:black;">Product</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>
        <li ><a href="{{ route('view-product') }}" style="color:brown">View All Product</a></li>

            <li class="active" style="color:black">Add Product</li>
        </ol>
    </div>
</div>
   {{-- for notification --}}
   @if (session('successMsg'))
   <div class="alert alert-success" style="font-size:20px; color:forestgreen; " role="alert">
     {{ session('successMsg') }}
    </div>

   @endif



        <div class="col-md-10 col-md-offset-1 " style="margin-top:100px;">

            <div class="panel panel-white  ">
                <div>
                    <a class="btn btn-warning" style="float:right; color:black; margin-top:20px;" href="{{ route('view-product') }}"><i class="fa fa-list"></i>  View List</a>
                  </div>
                <div class="panel-heading clearfix">
                    <h4 class="panel-title " style="font-size:28px; color:black; margin-left:270px;">Add Product </h4>
                </div>

                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{route('product-post')}}" method="post" enctype="multipart/form-data">
                    @csrf

                   {{-- //product name --}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('product_name') }}" class="form-control" id="product_name" name="product_name" placeholder="Product Name">

                        </div>

                    </div>
                  {{-- product slug --}}
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ old('pro_slug') }}" class="form-control" id="pro_slug" name="pro_slug" placeholder="Product Slug">

                        </div>

                    </div>

                   {{-- //category name --}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> Category Name</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="category_id" id="cat">
                              <option >Select One</option>
                              @foreach ($category as $item)
                              <option value="{{ $item->id }}">{{ $item->category_name}}</option>
                              @endforeach


                           </select>

                        </div>

                    </div>

                    {{-- //subcategory name --}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> SubCategory Name</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="subcategory_id" id="subcat">


                           </select>

                        </div>

                    </div>
                  {{-- //product color --}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"> Product Color</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="product_color[]" id="product_color" multiple>
                              <option >Select One</option>
                              @foreach ($colors as $color)
                              <option style="text-transform:capitalized;" value="{{ $color->color_name }}">{{ $color->color_name }}</option>
                              @endforeach


                           </select>

                        </div>

                    </div>
                    {{-- //product size --}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Product Size</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="product_size[]" id="product_size" multiple>
                              <option >Select One</option>
                              @foreach ($sizes as $size)
                              <option style="text-transform:upparcase;" value="{{ $size->product_size }}">{{ $size->product_size }}</option>
                              @endforeach
                           </select>

                        </div>

                    </div>
                     {{-- //product price --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('product_price') }}" class="form-control" id="inputEmail3" name="product_price" placeholder="Product Price">
                            </div>
                        </div>
                     {{-- //product summary --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product Summary</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('product_summary') }}" class="form-control" id="inputEmail3" name="product_summary" placeholder="Product Summary">

                            </div>

                        </div>
                      {{-- //product Description --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product Description</label>
                            <div class="col-sm-10">
                                <textarea name="product_description" id="" class="from-control" ></textarea>

                            </div>

                        </div>

                        {{-- //product Quantity --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('product_quantity') }}" class="form-control" id="inputEmail3" name="product_quantity" placeholder="Product Quantity">

                            </div>

                        </div>

                        {{-- //Alert Quantity --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Alert Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ old('alert_quantity') }}" class="form-control" id="inputEmail3" name="alert_quantity" placeholder="Alert Quantity">

                            </div>

                        </div>

                        {{-- feature images --}}
                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Feature Image</label>
                            <div class="col-sm-10">
                                <input type="file"  class="form-control" id="product_image" name="pro_image" placeholder="Product Image" >

                            </div>

                        </div>
                       {{-- feature product --}}
                        {{-- <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Feature Product</label>
                            <div class="col-sm-10">
                                <input type="radio"  class="form-control"  name="product_feature" value="1" placeholder="Product Image" > Yes
                                <input type="radio"  class="form-control"  name="product_feature" value="2" placeholder="Product Image" > No

                            </div>

                        </div> --}}

                        {{-- multiple Image --}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Multiple Image</label>
                            <div class="col-sm-10">
                                <input multiple type="file"  class="form-control" id="product_images" name="product_image[]" placeholder="Product Multiple Image" >

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


@section('footer_js')


    {{-- for subcategory --}}
    <script>

        $('#cat').change(function() {
           var cat = $(this).val();

           if(cat) {
            $.ajax({
                url: '{{ url('subcategory-ajax/')}}/'+cat,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#subcat').empty();
                    $('#subcat').append('<option value="">Select One</option>');
                    $.each(data, function(key, value) {
                        $('#subcat').append('<option value="'+ value.id +'">'+ value.subcategory_name +'</option>');
                    });

                }
            });
        }else{
            $('#subcat').empty();
        }
        })

        //for slug
        $('#product_name').keyup(function() {
            $('#pro_slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
    </script>

@endsection
