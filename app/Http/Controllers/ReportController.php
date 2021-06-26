<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MemberTotalPayouts;
use App\Models\PaidMemeberPayouts;
use Session;
use DataTables;
use Helper;
use DB;
use Auth;
class ReportController extends Controller
{
    //
    function payout(Request $request)
    {
        $user_id=Auth::user()->id;
        if($request->ajax())
        {
            $data =MemberTotalPayouts::select('member_total_payouts.*','users.member_id as mid','users.name')
            ->where('member_total_payouts.member_id',$user_id)
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
                        if($row->is_paid==1)
                        {
                            $action='<form action="'.url('member/report/detail/'.$row->id).'" method="POST">
                           '. csrf_field().'
                            <button class="btn btn-success btn-xs">View</button>
                            </form>';
                        }else{
                            $action="-";
                        }
                       
                        return $action;
                    })
                    ->rawColumns(['status','action','created_at','team_repurchase','self_repurchase','binary_income','paid_status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        
        return view('member.reports.payout');
    }
    function detail($id)
    {
        $member_id=Auth::user()->id;
        $detail=PaidMemeberPayouts::where('member_payout_id',$id)->where('member_id',$member_id)->first();
        return view('member.reports.detail',compact('detail'));
    }
}
