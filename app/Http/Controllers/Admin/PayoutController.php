<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;
use Helper;
use DB;

class PayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->ajax())
        {
            $data =Payout::select('*');
            return DataTables::of($data)
                    ->addColumn('status', function($row){
                        $status="";
                        if($row->status=='1')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Completed</span>';    
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('detail', function($row){
                        $receipt='<a href="'.url('admin/payouts/'.$row->id).'" target="_blank" class="btn btn-info btn-sm">
                        View
                    </a>';
                        return $receipt;
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->min_total!="") {
                            $instance->where('amount', '>=',$request->get('min_total'));
                        }
                        if ($request->max_total!="") {
                            $instance->where('amount', '<=',$request->get('max_total'));
                        }



                        if ($request->min_admin_charge!="") {
                            $instance->where('admin_charge', '>=',$request->get('min_admin_charge'));
                        }
                        if ($request->max_admin_charge!="") {
                            $instance->where('admin_charge', '<=',$request->get('max_admin_charge'));
                        }

                        if ($request->min_tds!="") {
                            $instance->where('tds', '>=',$request->get('min_tds'));
                        }
                        if ($request->max_tds!="") {
                            $instance->where('tds', '<=',$request->get('max_tds'));
                        }

                        if ($request->min_payable_amount!="") {
                            $instance->where('payable_amount', '>=',$request->get('min_payable_amount'));
                        }
                        if ($request->max_payable_amount!="") {
                            $instance->where('payable_amount', '<=',$request->get('max_payable_amount'));
                        }



                        
                        
                        
                        
                        
                       
                        if ($request->from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('from_date')));
                            $instance->where('created_at','>=', $from);
                        }
                        if ($request->to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('to_date')));
                            $instance->where('created_at','<=', $to);
                        }
                    })
                    ->rawColumns(['status','detail','created_at'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.payouts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rand=Helper::generateRandomNumber(5);
        $date=date('m/Y');
        $totalpayout=0;
        //create user groups
        $count=Payout::where('date',$date)->count();
        if($count==0)
        {
            DB::transaction(function () {
            $members=User::where('user_role','2')->get();
            foreach($members as $member)
            {
                //save count of member
                $usermember= UserMembers::firstOrNew(['user_id' =>  $member->id]);
                $usermember->left_childs =  Helper::activecountleftmember($member->id);
                $usermember->right_childs =  Helper::activecountrightmember($member->id);
                $usermember->save();

                //create group of user member
                $lefts=Helper::leftmemberfirst($member->id);
                $rights=Helper::rightmemberfirst($member->id);
                $total=count($lefts);
                for($i=0;$i<$total;$i++)
                {
                    $member_id=$member->id;
                    $left=$lefts[$i];
                    if(isset($rights[$i]))
                    {
                        $right=$rights[$i];
                        $usermember= UserMemberGroups::firstOrNew(['user_id' =>  $member_id,'left_child'=>$left]);
                        $usermember->right_child =  $right;
                        $usermember->save();
                    }
                    
                }
            }
            //end create user group loop
            //create payouts for members
            $users= UserMemberGroups::select('user_id','id')->where('status','1')->get();
            //get price on complete 1:1 pair
            $price=Helper::setting('payout_price');
            $pcommision=Helper::setting('repurchase_parent_commision');
            $admin_charge=Helper::setting('admin_charge');
            $tds_with_kyc=Helper::setting('tds_with_kyc');
            $tds_without_kyc=Helper::setting('tds_without_kyc');
        
            foreach($users as $user)
            {
               //multiply number of groups with 1:1 pair price to calculate binary amount
                $payment=$price;

                $me=User::find($user->user_id);
                if($me->kyc_status=='2')
                {
                    $tds=$tds_with_kyc;
                }else{
                    $tds=$tds_without_kyc;
                }
                //calculate tds
                $tdsamount=round(($payment*$tds)/100);
                //calculate admin charge
                $charge=round(($payment*$admin_charge)/100);
                //calculate payable amount
               $payable=$payment-$tdsamount-$charge;

                BinaryCommision::create(['member_id'=>$user->user_id,
                                    'group_id'=>$user->id,
                                    'payout_id'=>$rand,
                                    'amount'=>$payment,
                                    'admin_charge'=>$charge,
                                    'tds'=>$tdsamount,
                                    'payable_amount'=>$payable,
                                   ]);
                //inactive user group
                UserMemberGroups::where('id',$user->id)
                ->update(['status' => 0]);
            }
            //get repurchase orders and create payout
            $orders= Orders::select('member_id','id','amount')->where('is_repurchase','1')->where('payout','0')->where('status','2')->orderBy('id','DESC')->get();
            $discount=Helper::setting('repurchase_discount');
            foreach($orders as $order)
            {
                //create payment for member who purchase the order
                $payment=($order->amount*$discount)/100;

                $me=User::find($order->member_id);
                if($me->kyc_status=='2')
                {
                    $tds=$tds_with_kyc;
                }else{
                    $tds=$tds_without_kyc;
                }
                //calculate tds
                $tdsamount=round(($payment*$tds)/100);
                //calculate admin charge
                $charge=round(($payment*$admin_charge)/100);
                //calculate payable amount
               $payable=$payment-$tdsamount-$charge;

                SelfRepurchaseCommision::create(['member_id'=>$order->member_id,
                                    'order_id'=>$order->id,
                                    'payout_id'=>$rand,
                                    'amount'=>$payment,
                                    'admin_charge'=>$charge,
                                    'tds'=>$tdsamount,
                                    'payable_amount'=>$payable,
                                   ]);

                //get member parent
                $parents=Helper::memberparent($order->member_id);
                foreach($parents as $parent)
                {
                    //check number of meber in left and right
                    $group=UserMembers::where('user_id',$parent)->first();
                    if($group)
                    {
                        $limits=RepurchaseCommissionLimit::orderBy('id','DESC')->get();
                        foreach($limits as $limit)
                        {
                            //if limit of left member and right member is less than 
                            if( ($limit->left_members <= $group->left_childs) && ($limit->right_members <= $group->right_childs) )
                            {
                                $pcommision=$limit->commision;
                            }
                        }
                    }
                    //create payout for payment 
                    $payment=($order->amount*$pcommision)/100;
                    $me=User::find($parent);
                    if($me->kyc_status=='2')
                    {
                        $tds=$tds_with_kyc;
                    }else{
                        $tds=$tds_without_kyc;
                    }
                    //calculate tds
                    $tdsamount=round(($payment*$tds)/100);
                    //calculate admin charge
                    $charge=round(($payment*$admin_charge)/100);
                    //calculate payable amount
                    $payable=$payment-$tdsamount-$charge;

                    TeamRepurchaseCommision::create(['member_id'=>$parent,
                                    'order_id'=>$order->id,
                                    'payout_id'=>$rand,
                                    'amount'=>$payment,
                                    'admin_charge'=>$charge,
                                    'tds'=>$tdsamount,
                                    'payable_amount'=>$payable,
                                   ]);

                }
                Orders::where('id',$order->id)
                ->update(['payout' => '1']);
            }
            //get binary payout
            $binaries=BinaryCommision::select([
            'member_id',
            DB::raw("SUM(amount) as amount"),
            DB::raw("SUM(admin_charge) as admin_charge"),
            DB::raw("SUM(tds) as tds"),
            DB::raw("SUM(payable_amount) as payable_amount"),
                ])
            ->where('status','1')->groupBy('member_id')->get();
            foreach($binaries as $binary)
            {
                MemberPayout::create(['member_id'=>$binary->member_id,
                'payout_id'=>$rand,
                'type'=>'1',
                'amount'=>$binary->amount,
                'admin_charge'=>$binary->admin_charge,
                'tds'=>$binary->tds,
                'payable_amount'=>$binary->payable_amount,
                ]);
                BinaryCommision::where('member_id',$binary->member_id)->where('payout_id',$rand)->update(['status'=>'0']);
            }
            //get self repurchase commision
            $selfs=SelfRepurchaseCommision::select([
                'member_id',
                DB::raw("SUM(amount) as amount"),
                DB::raw("SUM(admin_charge) as admin_charge"),
                DB::raw("SUM(tds) as tds"),
                DB::raw("SUM(payable_amount) as payable_amount"),
                    ])
                ->where('status','1')->groupBy('member_id')->get();
                foreach($selfs as $self)
                {
                    MemberPayout::create(['member_id'=>$self->member_id,
                    'payout_id'=>$rand,
                    'type'=>'2',
                    'amount'=>$self->amount,
                    'admin_charge'=>$self->admin_charge,
                    'tds'=>$self->tds,
                    'payable_amount'=>$self->payable_amount,
                    ]);
                    SelfRepurchaseCommision::where('member_id',$self->member_id)->where('payout_id',$rand)->update(['status'=>'0']);
                }
            //get team repurchase commision
            $teams=TeamRepurchaseCommision::select([
                'member_id',
                DB::raw("SUM(amount) as amount"),
                DB::raw("SUM(admin_charge) as admin_charge"),
                DB::raw("SUM(tds) as tds"),
                DB::raw("SUM(payable_amount) as payable_amount"),
                    ])
                ->where('status','1')->groupBy('member_id')->get();
                foreach($teams as $team)
                {
                    MemberPayout::create(['member_id'=>$team->member_id,
                    'payout_id'=>$rand,
                    'type'=>'3',
                    'amount'=>$team->amount,
                    'admin_charge'=>$team->admin_charge,
                    'tds'=>$team->tds,
                    'payable_amount'=>$team->payable_amount,
                    ]);
                    TeamRepurchaseCommision::where('member_id',$team->member_id)->where('payout_id',$rand)->update(['status'=>'0']);
                }
            //get Member payouts commision
            $mpayouts=MemberPayout::select([
                'member_id',
                DB::raw("SUM(amount) as amount"),
                DB::raw("SUM(admin_charge) as admin_charge"),
                DB::raw("SUM(tds) as tds"),
                DB::raw("SUM(payable_amount) as payable_amount"),
                    ])
                ->where('status','1')->groupBy('member_id')->get();
                foreach($mpayouts as $mpayout)
                {
                    MemberTotalPayouts::create(['member_id'=>$mpayout->member_id,
                    'payout_id'=>$rand,
                    'amount'=>$mpayout->amount,
                    'admin_charge'=>$mpayout->admin_charge,
                    'tds'=>$mpayout->tds,
                    'payable_amount'=>$mpayout->payable_amount,
                    ]);
                    MemberPayout::where('member_id',$mpayout->member_id)->where('payout_id',$rand)->update(['status'=>'0']);
                }
         //create one payout for all members   
         //get Member payouts commision
         $payouts=MemberTotalPayouts::select([
            DB::raw("SUM(amount) as amount"),
            DB::raw("SUM(admin_charge) as admin_charge"),
            DB::raw("SUM(tds) as tds"),
            DB::raw("SUM(payable_amount) as payable_amount"),
                ])
            ->where('status','1')->groupBy('payout_id')->get();
            foreach($payouts as $payout)
            {
                $payout=Payout::create([
                    'date'=>$date,
                    'amount'=>$payout->amount,
                    'admin_charge'=>$payout->admin_charge,
                    'tds'=>$payout->tds,
                    'payable_amount'=>$payout->payable_amount,
                    ]);
                    MemberTotalPayouts::where('payout_id',$rand)->update(['payout_id'=>$payout->id,'status'=>'0']);
                    MemberPayout::where('payout_id',$rand)->update(['payout_id'=>$payout->id]);
                    BinaryCommision::where('payout_id',$rand)->update(['payout_id'=>$payout->id]);
                    SelfRepurchaseCommision::where('payout_id',$rand)->update(['payout_id'=>$payout->id]);
                    TeamRepurchaseCommision::where('payout_id',$rand)->update(['payout_id'=>$payout->id]);
                  
            }
        });
    }
        Session::flash('message', 'New Payout created successfully');
        return redirect('admin/payouts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Payout $payout)
    {
        //
        //
        
        if($request->ajax())
        {
            $data =MemberTotalPayouts::select('member_total_payouts.*','users.member_id as mid','users.name')
            ->where('member_total_payouts.payout_id',$payout->id)
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
                        if($row->is_paid==0)
                        {
                            $action='<form action="'.url('admin/payouts/member/pay/'.$row->id).'" method="POST">
                           '. csrf_field().'
                            <button class="btn btn-success btn-xs">Pay</button>
                            </form>';
                        }else{
                            $action="<a href='".url('admin/payouts/member/paid/'.$row->id)."' class='btn btn-success btn-xs'>View</a>";
                        }
                       
                        return $action;
                    })
                    ->rawColumns(['status','action','created_at','team_repurchase','self_repurchase','binary_income','paid_status'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $id=$payout->id;
        
        return view('admin.payouts.detail',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function edit(Payout $payout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payout $payout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payout $payout)
    {
        //
    }
    function memberpay(Request $request,$id)
    {
        //payment detail
        $payment=MemberTotalPayouts::find($id);
        $user=User::find($payment->member_id);
        $kyc=Kyc::where('member_id',$payment->member_id)->first();
        return view('admin.payouts.memberpay',compact('id','user','kyc','payment'));
    }
    function memberpaystore(Request $request,$id)
    {
        $validated = $request->validate([
            'member_id' => 'required',
            'payout_id' => 'required',
            'payable_amount' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'bank_ifsc' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
        ]);
        PaidMemeberPayouts::create([
            'member_id'=>$request->member_id,
            'payout_id'=>$request->payout_id,
            'member_payout_id'=>$request->member_payout_id,
            'paid_amount'=>$request->payable_amount,
            'account_name'=>$request->account_name,
            'account_number'=>$request->account_number,
            'account_type'=>'1',
            'bank_ifsc'=>$request->bank_ifsc,
            'bank_name'=>$request->bank_name,
            'bank_branch'=>$request->bank_branch,
        ]);
        $payment=MemberTotalPayouts::find($id);
        $payment->is_paid='1';
        $payment->save();
        Session::flash('message', 'New Category added successfully');
        return redirect('admin/payouts/'.$request->payout_id);
    }
    function memberpaid(Request $request,$id)
    {
        $detail=PaidMemeberPayouts::where('member_payout_id',$id)->first();
        return view('admin.payouts.payout',compact('detail'));
    }
}
