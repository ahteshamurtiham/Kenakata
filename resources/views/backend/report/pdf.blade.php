<h1 style="text-align:center;">Order Report</h1><br><br>
<table class="table table-bordered  " style="color:black; border: 2px solid #000000; padding-bottom:5px; padding-top:5px; padding-left:5px; padding-right:5px;">
    <thead>
        <tr>
            <th style="text-align:center;  border: 1px solid #eb0539; padding-bottom:5px; padding-top:5px; padding-left:5px; padding-right:5px;" >SL No</th>
            <th style="text-align:center;  border: 1px solid #eb0539; padding-bottom:5px; padding-top:5px; padding-left:5px; padding-right:5px;" >Product Name</th>
            <th style="text-align:center;  border: 1px solid #eb0539; padding-bottom:5px; padding-top:5px; padding-left:5px; padding-right:5px;" >Product Unit Price</th>
            <th style="text-align:center;  border: 1px solid #eb0539; padding-bottom:5px; padding-top:5px; padding-left:5px; padding-right:5px;" >Product Quantity</th>
            <th style="text-align:center;  border: 1px solid #eb0539; padding-bottom:5px; padding-top:5px; padding-left:5px; padding-right:5px;" >Total Price</th>


        </tr>
    </thead>
    <tbody>
        @php
        $slno= 1;

       @endphp
       @forelse ($data as $key => $item)

       <tr >

            <td style="text-align:center ; border: 1px solid #eb0539" >{{ $slno++ }}</td>
            <td style="border: 1px solid #eb0539">{{$item->product->product_name}}</td>
            <td style="text-align:center; border: 1px solid #eb0539">{{ $item->product_unit_price}} Taka</td>
            <td style="text-align:center; border: 1px solid #eb0539" > {{  $item->product_quantity }}</td>
            <td style="text-align:center; color:black; font-size:18x; font-weight: bold; border: 1px solid #eb0539" > {{  $item->product_quantity * $item->product_unit_price }} Taka</td>

       </tr>
       @empty
         <td colspan="50" class="text-center" style="color:red; font-size:20px;">No Data Available!</td>
       @endforelse

       </tbody>
</table>


