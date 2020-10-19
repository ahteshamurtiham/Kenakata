<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //use middleware for user role
    public function __construct()
    {
        $this->middleware('UserRole');
    }

    function viewrole(){
        $user_role= User::paginate(6);
        return view('backend.userrole.viewrole',compact('user_role'));
    }

    //edit user
    function editrole($id){

        $role = User::findOrfail($id);
        return view('backend.userrole.edit_user',compact('role'));
    }
    //
    function updaterole(Request $request,$id){
        $up_role= User::findOrfail($id);
        $up_role->user_role = $request->user_role;
        $up_role->created_at = Carbon::now();
        $up_role->save();
        return redirect()->route('view-user')->withSuccessMessage('User Role Successfully Updated!');

    }
}
