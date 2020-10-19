@extends('backend.master')
@section('view_user')
    active
@endsection


@section('content')

{{-- notification --}}
@if (session('successMsg'))
<div class="alert alert-success" style="font-size:22px; color:forestgreen;" role="alert">
    {{ session('successMsg') }}
  </div>

@endif
<div class="page-title " >
    <h3 style="color:black;">Role Management </h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ route('home') }}" style="color:brown">Home</a></li>


            <li class="active" style="color:black">View Role </li>
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
        <h4 class="panel-title" style="font-size:28px; margin-left:400px; color:brown; ">Role Management</h4>

    </div>


    <div class="panel-body bg-secondary " style="margin-top:60px;">


        <table class="table table-bordered  " style="color:black;">
            <thead>
                <tr>
                    <th style="text-align:center">Serial No</th>
                    <th style="text-align:center">Name</th>
                    <th style="text-align:center">Email</th>
                    <th style="text-align:center">Phone</th>
                    <th style="text-align:center">Role</th>
                    <th style="text-align:center">Action</th>

                </tr>
            </thead>
            <tbody>
               @forelse ($user_role as $key => $item)

               <tr>
                   <td style="width:5%; text-align:center">{{ $user_role->firstItem() +$key }}</td>
                   <td style="width:15%; text-align:center">{{$item->first_name.' '.$item->last_name}}</td>
                    <td style="width:10%; text-align:center">{{ $item->email }}</td>
                    <td style="text-align:center">{{$item->phone ?? 'N/A'}}</td>
                    <td style="text-align:center">{{$item->user_role}}</td>


                   <td style="text-align:center">
                    <a href="{{ url('edit-user/'.$item->id) }}" class="btn btn-info " >
                        <span  class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span ><strong>Edit</strong></span>
                    </a>



                    </td>

               </tr>


               @empty
                 <td colspan="50" class="text-center" style="color:red; font-size:20px;">No Data Available!</td>
               @endforelse

               </tbody>
        </table>

        {{ $user_role->links() }}
    </div>
</div>



@endsection
