<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Charts\UserCharts;
use App\Exports\OrderExport;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified','UserRole']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       //for charts

       $admin = User::where('user_role','admin')->count();//admin koyjon ase count hbe
       $user = User::where('user_role','user')->count();

       $chart = new UserCharts; //j charts ta amra creat korsi bole dibo
       $chart->labels(['Admin', 'User']);//ki ki dekhao jemon user r admin
       $chart->dataset('UserReport', 'pie', [$admin, $user])->options([
        'backgroundColor'=> ['#0c9fe8','#e4118b'],
    ]);

        return view('backend.dashboard',compact('chart')); 
    }
   //view report blade page
    function viewreport(){
        $billing = Billing::with('product')->paginate(10); ashbe

        return view('backend.report.report',compact('billing'));
    }

    //export excel dowbload
    function exportexcel(){
        return Excel::download(new OrderExport, 'Orders.xlsx');
    }

    //export pdf download
    function exportpdf(){

        $data['data'] = Billing::with('product')->get();
        $pdf = PDF::loadView('backend.report.pdf',$data);
        return $pdf->download('order.pdf');

    }
}
