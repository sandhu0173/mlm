<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\Kyc;
use Carbon\Carbon;
use DB;
class AdminController extends Controller
{
    //
    function  index(){
       
        $today=date('Y-m-d');
        $data['total']=User::where('user_role','2')->count();
        $data['paid']=User::where('package_id','!=','0')->where('user_role','2')->count();
        $data['blocked']=User::where('status','0')->where('user_role','2')->count();
        $data['today_activate']=User::where('activate_at','LIKE',$today.'%')->where('user_role','2')->count();
        $data['pending']=User::where('kyc_status','1')->where('user_role','2')->count();
        $data['actives']= User::where('activate_at', '!=', 'null')->orderBy('activate_at', 'DESC')->take('5')->get();
        $data['orders']= Orders::where('status','1')->count();
        $data['kycs']= Kyc::where('status','1')->count();
        $data['registered']= User::orderBy('created_at', 'DESC')->take('5')->get();
        /*
            get 7 days earning
        */
        $incomes = array();
        $i = 0;
        while ($i < 7) {
           $dayOfWeek = Carbon::today()->subDays($i)->toDateString();
            $amount= Orders::where('created_at', 'LIKE',$dayOfWeek."%")->sum('amount');
            $incomes[$dayOfWeek] = $amount;
            $i++;
        }
        $data['incomes']=$incomes;
        /*
            get 7 days joining
        */
        $users = array();
        $i = 0;
        while ($i < 7) {
           $dayOfWeek = Carbon::today()->subDays($i)->toDateString();
            $total= User::where('created_at', 'LIKE',$dayOfWeek."%")->count();
            $users[$dayOfWeek] = $total;
            $i++;
        }
        $data['users']=$users;
        /*
            get 3 month joining
        */
        $musers = array();
        $i = 0;
        while ($i < 3) {
           $yearmonth = Carbon::today()->subMonth($i)->format('F-Y');;
           $my=Carbon::today()->subMonth($i)->format('Y-m');
            $total= User::where('created_at', 'LIKE',$my."%")->count();
            $musers[$yearmonth] = $total;
            $i++;
        }
        $data['musers']=$musers;

        /*
            get 3 month highest prchased package
        */
        $package = array();
        $i = 0;
        while ($i < 3) {
           $yearmonth = Carbon::today()->subMonth($i)->format('F-Y');;
           $my=Carbon::today()->subMonth($i)->format('Y-m');
            $pack = DB::table('package_orders')
            ->select('packages.name',DB::raw('count(*) as total'))
            ->join('packages','packages.id','=','package_orders.package_id')
            ->groupBy('packages.name','package_orders.package_id')
            ->limit(1)
            ->where('package_orders.created_at','LIKE',$my."%")
            ->orderBy('total', 'desc')
            ->first();
            if( $pack)
            {
                $total= $pack->total;
            }else{
                $total=0;
            }
            $package[$yearmonth] =$total;
            $i++;
        }
        $data['package']=$package;

        return view('admin.dashboard',$data);
    }
}
