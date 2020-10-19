<table class="table table-bordered  " style="color:black;">
    <thead>
        <tr>
            <th style="text-align:center" >SL No</th>
            <th style="text-align:center" >Product Name</th>
            <th style="text-align:center" >Product Unit Price</th>
            <th style="text-align:center" >Product Quantity</th>
            <th style="text-align:center" >Total Price</th>


        </tr>
    </thead>
    <tbody>
        @php
        $slno= 1;

       @endphp
       @forelse ($billing as $key => $item)

       <tr>

            <td style="text-align:center" >{{ $slno++ }}</td>
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
