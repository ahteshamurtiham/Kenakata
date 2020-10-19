@extends('backend.master')



@section('content')

<div class="page-title " >
    <h3 style="color:black;">User Role Management</h3>
    <div class="page-breadcrumb ">
        <ol class="breadcrumb" >
        <li ><a href="{{ url('/home') }}" style="color:brown">Home</a></li>


            <li class="active" style="color:black">Edit Role </li>
        </ol>
    </div>
</div>

        <div class="col-md-10 col-md-offset-1 " style="margin-top:100px;">
            <h4 class="panel-title" style="font-size:28px; margin-left:300px; color:brown; ">Update Role Management</h4>
            <div>
                <a class="btn btn-warning" style="float:right; color:black; margin-top:20px;" href="{{ route('view-user') }}"><i class="fa fa-list"></i>  View List</a>
              </div>
            <div class="panel panel-white  ">


                <div class="panel-body  " style="margin-top:60px;">
                <form class="form-horizontal" action="{{url('update-role/'.$role->id)}}" method="post">


                    @csrf
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">User Role : </label>
                            <div class="col-sm-10">
                             <select class="form-control" name="user_role" id="role">
                                 <option @if($role->user_role == 'admin') selected @endif value="admin">Admin</option>
                                 <option @if($role->user_role == 'user') selected @endif value="user">User</option>

                             </select>

                            </div>

                        </div>


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
