<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payout;
use App\Models\User;
use App\Models\UserMembers;
use App\Models\UserMemberGroups;
use App\Models\MemberPayout;
use App\Models\MemberTree;
use App\Models\Orders;
use App\Models\BinaryCommision;
use App\Models\SelfRepurchaseCommision;
use App\Models\TeamRepurchaseCommision;
use App\Models\MemberTotalPayouts;
use App\Models\RepurchaseCommissionLimit;
use App\Models\Kyc;
use App\Models\PaidMemeberPayouts;

use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;
use Helper;
use DB;

class ReportController extends Controller
{
    //
    function topearner(Request $request)
    {
        
        if($request->ajax())
        {
            $data =MemberTotalPayouts::select('member_total_payouts.*','users.member_id as mid','users.name','payouts.id as payid')
            ->join('payouts','payouts.id','=','member_total_payouts.payout_id')
            ->orderBy('member_total_payouts.payable_amount','DESC')
            ->groupBy('payid')
            ->join('users','users.id','member_total_payouts.member_id');
            return DataTables::of($data)
                    ->addColumn('paid_status', function($row){
                        $status="";
                        if($row->is_paid=='1')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Paid</span>';    
                        }else{
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Unpaid</span>'; 
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('binary_income', function($row){
                        return $row->binary_income;
                    })
                    ->addColumn('self_repurchase', function($row){
                        return $row->self_repurchase;
                    })
                    ->addColumn('team_repurchase', function($row){
                        return $row->team_repurchase;
                    })
                    ->addColumn('action', function($row){                       
                        return "";
                    })
                    ->rawColumns(['status','action','created_at','team_repurchase','self_repurchase','binary_income','paid_status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        
        return view('admin.reports.topearner');
    }
    function charge(Request $request)
    {
        
        if($request->ajax())
        {
            $data =MemberTotalPayouts::select('member_total_payouts.*','users.member_id as mid','users.name','payouts.id as payid')
            ->join('payouts','payouts.id','=','member_total_payouts.payout_id')
            ->orderBy('member_total_payouts.payable_amount','DESC')
            ->join('users','users.id','member_total_payouts.member_id');
            return DataTables::of($data)
                    ->addColumn('paid_status', function($row){
                        $status="";
                        if($row->is_paid=='1')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Paid</span>';    
                        }else{
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Unpaid</span>'; 
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('binary_income', function($row){
                        return $row->binary_income;
                    })
                    ->addColumn('self_repurchase', function($row){
                        return $row->self_repurchase;
                    })
                    ->addColumn('team_repurchase', function($row){
                        return $row->team_repurchase;
                    })
                    ->addColumn('action', function($row){                       
                        return "";
                    })
                    ->rawColumns(['status','action','created_at','team_repurchase','self_repurchase','binary_income','paid_status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        
        return view('admin.reports.charge');
    }
    function tds(Request $request)
    {
        
        if($request->ajax())
        {
            $data =MemberTotalPayouts::select('member_total_payouts.*','users.member_id as mid','users.name','payouts.id as payid')
            ->join('payouts','payouts.id','=','member_total_payouts.payout_id')
            ->join('users','users.id','member_total_payouts.member_id');
            return DataTables::of($data)
                    ->addColumn('paid_status', function($row){
                        $status="";
                        if($row->is_paid=='1')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Paid</span>';    
                        }else{
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Unpaid</span>'; 
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('binary_income', function($row){
                        return $row->binary_income;
                    })
                    ->addColumn('self_repurchase', function($row){
                        return $row->self_repurchase;
                    })
                    ->addColumn('team_repurchase', function($row){
                        return $row->team_repurchase;
                    })
                    ->addColumn('action', function($row){                       
                        return "";
                    })
                    ->rawColumns(['status','action','created_at','team_repurchase','self_repurchase','binary_income','paid_status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        
        return view('admin.reports.tds');
    }
}
