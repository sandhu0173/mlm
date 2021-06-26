<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use App\Models\Package;
use App\Models\Orders;
use App\Models\Banks;
use App\Models\PaymentModes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use DataTables;
use DB;
use Auth;
class MemberController extends Controller
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
            $data =DB::table('users as first')->select('first.*','second.name as sponsor_name','second.mobile as sponsor_mobile')
            ->join('users as second','first.tracking_id','=','second.member_id')
            ->where('first.user_role','2');
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $button = '<div class="btn-group">
                        <button type="button" class="btn btn-xs btn-default dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-ellipsis-h font-18"></i>
                        </button>
                        <div class="dropdown-menu">';
                        if($row->status==0)
                        {
                            $button.='<form action="'.url('admin/members/'.$row->id.'/unblock').'" method="post">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <button class="dropdown-item" href="#">
                                <i class="fa fa-check-circle"></i>&nbsp;Un Block
                            </button>
                        </form>';
                        }else{
                        $button.='<a class="dropdown-item" href="'.url('admin/members/'.$row->id.'/edit').'">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="'.url('admin/members/'.$row->id.'/impersonate').'" method="post" target="_blank" class="noLoader">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <a href="#" class="dropdown-item" onclick="$(this).parent(`form`).submit();">
                                    <i class="fas fa-sign-in-alt"></i> Login Member
                                    </a>
                                </form>
                                <a class="dropdown-item" href="'.url('admin/members/'.$row->id.'/change-password').'">
                                    <i class="fa fa-cog"></i> Change Password
                                </a>
                                
                                <form action="'.url('admin/members/'.$row->id.'/block').'" method="post">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                    <button class="dropdown-item" href="#">
                                        <i class="fa fa-ban"></i>&nbsp;Block
                                    </button>
                                </form>
                                <a class="dropdown-item" href="'.url('admin/genealogy/show/'.$row->member_id).'">
                                    <i class="uil uil-channel-add"></i> Tree
                                </a>';
                        }
                        $button.='</div>
                    </div>';
                        
                        return $button;
                    })
                    ->addColumn('status', function($row){
                        if($row->status=='1')
                        {
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Free</span>';    
                        }elseif($row->status=='0'){
                            $status = '<span class="btn btn-secondary btn-xs waves-effect waves-light">Blocked</span>';    
                        }
                        else{
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Active</span>';    
                        }
                        return $status;
                    })
                    ->addColumn('kyc', function($row){
                        if($row->kyc_status=='1')
                        {
                            $status = '<span class="btn btn-info btn-xs waves-effect waves-light">Pending</span>';    
                        }elseif($row->kyc_status=='2'){
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Approved</span>';    
                        }
                        elseif($row->kyc_status=='3'){
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Rejected</span>';    
                        }
                        else{
                            $status = '<span class="btn btn-secondary btn-xs waves-effect waves-light">Not Applied</span>';    
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return date("d/m/Y",strtotime($row->created_at));
                    })
                    ->addColumn('invoice', function($row){
                        return '<a class="btn btn-info btn-sm" href="'.url('admin/member/invoice/'.$row->member_id).'" target="_blank">Invoice</a>';
                    })
                    ->addColumn('activate_at', function($row){
                        if($row->activate_at=="")
                        {
                            $activate_at="N/A";
                        }else{
                            $activate_at=date("Y-m-d",strtotime($row->activate_at));
                        }
                        return $activate_at;
                    })
                    ->addColumn('package', function($row){
                        if($row->package_id=="")
                        {
                            $package="N/A";
                        }else{
                            /*$pack=Package::find($row->package_id);
                            $package=$pack->name;*/

                            $package='<a class="btn btn-info btn-sm btn-xs" href="'.url('admin/member/orders/'.$row->id).'">
                                    <i class="fa fa-eye"></i>
                                </a>';
                        }
                        return $package;
                    })
                    ->addColumn('paid_status', function($row){
                        if($row->package_id=="0")
                        {
                            $paid_status="Un paid";
                        }else{
                            $paid_status="Paid";
                        }
                        return $paid_status;
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->status!="") {
                            $instance->where('first.status', $request->get('status'));
                        }
                        if ($request->kyc_status!="") {
                            $instance->where('first.kyc_status', $request->get('kyc_status'));
                        }
                        if ($request->is_paid!="") {
							if($request->is_paid==1)
							{
								$instance->where('first.package_id','0');
							}else{
								$instance->where('first.package_id','!=','0');
							}
                            
                        }
                        if ($request->user_name!="") {
                            $instance->where('first.name','LIKE', "%".$request->get('user_name')."%");
                        }
                        if ($request->code!="") {
                            $instance->where('first.member_id','LIKE', "%".$request->get('code')."%");
                        }
                        if ($request->user_mobile!="") {
                            $instance->where('first.mobile','LIKE', "%".$request->get('user_mobile')."%");
                        }
                        if ($request->sponsor_code!="") {
                            $instance->where('first.tracking_id','LIKE', "%".$request->get('sponsor_code')."%");
                        }
                        if ($request->sponsor_name!="") {
                            $instance->where('second.name','LIKE', "%".$request->get('sponsor_name')."%");
                        }
                        if ($request->sponsor_mobile!="") {
                            $instance->where('second.mobile','LIKE', "%".$request->get('sponsor_mobile')."%");
                        }

                        if ($request->joining_from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('joining_from_date')));
                            $instance->where('first.created_at','>=', $from);
                        }
                        if ($request->joining_to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('joining_to_date')));
                            $instance->where('first.created_at','<=', $to);
                        }
                        if ($request->activated_from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('activated_from_date')));
                            $instance->where('first.activate_at','>=', $from);
                        }
                        if ($request->activated_to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('activated_to_date')));
                            $instance->where('first.activate_at','<=', $to);
                        }
                    })
                    ->rawColumns(['action','status','activate_at','created_at','paid_status','kyc','package','invoice'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$data['member']=Member::all();
        //return view('admin.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
        ]);
        Member::create(['name'=>$request->name,'parent_id'=>$request->parent_id]);
        Session::flash('message', 'New Category added successfully');
        return redirect('admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\f  $f
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\f  $f
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['member']=Member::find($id);
        return view('admin.member.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\f  $f
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=Member::find($id);
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->gender=$request->gender;
        $user->save();
       
        Session::flash('message', 'Member updated successfully');
        return redirect('admin/members/'.$id.'/edit');
    }
    function changepassword(Request $request,$id)
    {
        
        if($request->method()=="POST")
        {
            $validated = $request->validate([
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6'
            ]);
            $user=User::find($id);
            
                $user->password=Hash::make($request->password);
                $user->passkey=$request->password;
                $user->save();
                Session::flash('message', 'Password updated successfully');
                return redirect('admin/members/2/change-password');
        }
        $data['member']=Member::find($id);
        return view('admin.member.changepassword',$data);
    }
    function block($id)
    {
        $member=Member::find($id);
        $member->balance=$member->status;
        $member->status=0;
        $member->save();
        Session::flash('message', 'Member blocked successfully');
        return redirect('admin/members');
    }
    function unblock($id)
    {
        $member=Member::find($id);
        $member->status=$member->balance;
        $member->save();
        Session::flash('message', 'Member unblocked successfully');
        return redirect('admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\f  $f
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cat=Member::find($id);
        $cat->delete();
        Session::flash('message', 'Category deleted successfully');
        return redirect('admin/members');
    }
    
    public function impersonate($id)
    {
        $user = User::find($id);
        // Auth::loginUsingId($id);
      // Auth::user()->impersonate($user);
       //session()->put('impersonate',$user->id);
        //session()->put('impersonate',$user->id);
       // return redirect('member');

        // Guard against administrator impersonate
        if(! $user->isAdministrator())
        {
            Auth::user()->setImpersonating($user->id);
            return redirect('member');
        }
        else
        {
            Session::flash('error', 'Impersonate disabled for this user.');
        }

        return redirect()->back();
    }

    public function stopImpersonate()
    {
        Auth::user()->stopImpersonating();

        //flash()->success('Welcome back!');
        Session::flash('success', 'Welcome back');

        return redirect()->back();
    }
    function invoices(Request $request,$id)
    {
        $user=User::where('member_id',$id)->first();
        $data['count']=1;
        $data['orders']=Orders::where('member_id',$user->id)->get();
        return view('admin.member.invoices',$data);
    }
    function orders(Request $request,$id)
    {
        if($request->ajax())
        {
            $data =Orders::select('orders.*','banks.name as bank','payment_modes.name as payment_mode','users.name as member_name','users.member_id')
            ->join('payment_modes','payment_modes.id','=','orders.payment_mode')
            ->join('users','users.id','=','orders.member_id')
            ->where('users.id',$id)
            ->join('banks','banks.id','=','orders.bank_name');
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        if($row->status=='1')
                        {
                            $button = '<a href="'.url('admin/orders/'.$row->id.'/approve').'"  class="btn btn-success btn-sm mr-1">Approve</a>';
                            $button .= '<a href="'.url('admin/orders/'.$row->id.'/reject').'" class="btn btn-danger btn-sm">Reject</a>';
                        }else{
                            $button='N/A';
                        }
                        return $button;
                    })
                    ->addColumn('status', function($row){
                        if($row->status=='2')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Approved</span>';    
                        }elseif($row->status=='0')
                        {
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Rejected</span>';    
                        }else{
                            $status = '<span class="btn btn-secondary btn-xs waves-effect waves-light">Pending</span>';    
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->addColumn('deposit_date', function($row){
                        return $row->date." ".$row->time;
                    })
                    ->addColumn('package', function($row){
                        return '<a href="'.url('admin/orders/'.$row->id).'" class="btn btn-info btn-xs waves-effect waves-light"><i class="fa fa-eye"></i></a>'; 
                    })
                    ->addColumn('receipt', function($row){
                        $receipt='<a href="'.asset($row->receipt).'" target="_blank" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>';
                        return $receipt;
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->member_name!="") {
                            $instance->where('users.name','LIKE', "%".$request->get('member_name')."%");
                        }
                        if ($request->member_id!="") {
                            $instance->where('users.member_id','LIKE', "%".$request->get('member_id')."%");
                        }
                        if ($request->status!="") {
                            $instance->where('orders.status', $request->get('status'));
                        }
                        if ($request->package_id!="") {
                            $instance->where('orders.package_id', $request->get('package_id'));
                        }
                        if ($request->min_no!="") {
                            $instance->where('orders.quantity', '>',$request->get('min_no'));
                        }
                        if ($request->max_no!="") {
                            $instance->where('orders.quantity', '<',$request->get('max_no'));
                        }

                        if ($request->payment_mode!="") {
                            $instance->where('orders.payment_mode', $request->get('payment_mode'));
                        }
                        if ($request->reference_no!="") {
                            $instance->where('orders.reference_no', $request->get('reference_no'));
                        }
                        if ($request->bank_name!="") {
                            $instance->where('orders.bank_name', $request->get('bank_name'));
                        }

                        if ($request->deposit_from_date!="") {
                            $instance->where('orders.date','>=', $request->deposit_from_date);
                        }
                        if ($request->deposit_to_date!="") {
                            $instance->where('orders.date','<=', $request->deposit_to_date);
                        }
                        
                        if ($request->from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('from_date')));
                            $instance->where('orders.created_at','>=', $from);
                        }
                        if ($request->to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('to_date')));
                            $instance->where('orders.created_at','<=', $to);
                        }
                    })
                    ->rawColumns(['receipt','status','package','created_at','deposit_date','action'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $data['packages']=Package::where('status','1')->get();
        $data['banks']=Banks::where('status','1')->get();
        $data['modes']=PaymentModes::where('status','1')->get();
        $data['id']=$id;
        return view('admin.member.orders',$data);
    }
}
