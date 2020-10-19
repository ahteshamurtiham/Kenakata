@extends('backend.master')
@section('view_report')
    active
@endsection


@section('content')


<div class="page-title " >
    <h3 style="color:black;">Report</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>


            <li class="active" style="color:black">View Report </li>
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
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown;  text-decoration: underline; ">View Report</h4>
    </div>

    <div class="panel-body bg-secondary " style="margin-top:60px;">
        <a href=" {{ route('export-excel') }} " class="btn btn-primary" style="float:left; margin-bottom:10px;">Download Excel</a>
        <a href=" {{ route('export-pdf') }}" class="btn btn-success" style="margin-left:20px;">Download PDF</a>


        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th style="text-align:center" >Serial No</th>
                    <th style="text-align:center" >Product Name</th>
                    <th style="text-align:center" >Product Unit Price</th>
                    <th style="text-align:center" >Product Quantity</th>
                    <th style="text-align:center" >Total Price</th>


                </tr>
            </thead>
            <tbody>
               @forelse ($billing as $key => $item)

               <tr>
                   <td style="width:5%;">{{ $billing->firstItem() +$key }}</td>
                   <td >{{$item->product->product_name}}</td>
                    <td style="text-align:center">৳ {{ $item->product_unit_price}}</td>
                    <td style="text-align:center" > {{  $item->product_quantity }}</td>
                    <td style="text-align:center; color:black; font-size:18x; font-weight: bold;" >৳ {{  $item->product_quantity * $item->product_unit_price }}</td>

               </tr>
               @empty
                 <td colspan="50" class="text-center" style="color:red; font-size:20px;">No Data Available!</td>
               @endforelse

               </tbody>
        </table>

        {{ $billing->links() }}
    </div>
</div>



@endsection
