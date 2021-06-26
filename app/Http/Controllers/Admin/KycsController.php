<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kyc;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;


class KycsController extends Controller
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
            $data =User::select('users.*')->where('user_role','2');
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $button="";
                        if($row->kyc_status!=0)
                        {
                            $button = '<div class="btn-group">
                                <a href="'.url('admin/kycs/'.$row->id).'">
                                    <span class="btn btn-success btn-xs mr-2">
                                    <i class="fa fa-eye"></i>
                                    </span>
                                </a>
                                <a href="'.url('admin/kycs/'.$row->id.'/edit').'">
                                    <span class="btn btn-info btn-xs">
                                    <i class="fa fa-edit"></i>
                                    </span>
                                </a>
                            </div>';
                        }
                       
                        return $button;
                    })
                    ->addColumn('status', function($row){
                        if($row->kyc_status=='0')
                        {
                            $status = '<span class="btn btn-secondary btn-xs waves-effect waves-light">Not Applied</span>';    
                        }
                        elseif($row->kyc_status=='1')
                        {
                            $status = '<span class="btn btn-warning btn-xs waves-effect waves-light">Pending</span>';    
                        }
                        elseif($row->kyc_status=='2')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Approved</span>';    
                        }
                        else{
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Rejected</span>';    
                        }
                        return $status;
                    })
                    ->addColumn('member_code', function($row){
                            $code = '<button class="btn btn-link p-0" type="button" data-clipboard-text="'.$row->member_id.'" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom">
                            '.$row->member_id.'
                        </button>';    
                        
                        return $code;
                    })
                    ->addColumn('applied_at', function($row){
                        $applied_at="-";
                       if($row->kyc_status!=0)
                       {
                        $kyc=Kyc::where('member_id',$row->id)->first();
                        if($kyc)
                        {
                            $applied_at=$kyc->created_at;
                        }
                            
                       }
                        return $applied_at;
                    })
                    ->addColumn('pan_card', function($row){
                        $pan_card = '-';
                        if($row->kyc_status!=0)
                        {
                            $kyc=Kyc::where('member_id',$row->id)->first();
                        if($kyc)
                        {
                            $pan_card=$kyc->pan_card;
                        }
                            
                        }
                        return $pan_card;
                    })
                    ->addColumn('aadhaar_card', function($row){
                        $aadhaar_card = '-';
                        if($row->kyc_status!=0)
                        {
                            $kyc=Kyc::where('member_id',$row->id)->first();
                            if($kyc)
                            {
                                $aadhaar_card=$kyc->aadhaar_card;
                            }
                            
                        }
                        return $aadhaar_card;
                    })
                    ->addColumn('package', function($row){
                        $package = '-';
                        /*if($row->package_id!='0')
                        {
                            $pack=Package::select('name')->where('id',$row->package_id)->first();
                            if($pack)
                            {
                                $package=$pack->name;
                            }
                        }*/
                        return $package;
                    })

                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->status!="") {
                            $instance->where('kyc_status', $request->get('status'));
                        }
                        if ($request->name!="") {
                            $instance->where('name','LIKE', "%".$request->get('name')."%");
                        }
                        if ($request->member_id!="") {
                            $instance->where('member_id','LIKE', "%".$request->get('member_id')."%");
                        }
                        if ($request->mobile!="") {
                            $instance->where('mobile','LIKE', "%".$request->get('mobile')."%");
                        }
                        if ($request->package_id!="") {
                            $instance->where('package_id','LIKE', $request->get('package_id'));
                        }

                        if ($request->pan_card!="") {
                            $instance->join('member_kyc','member_kyc.member_id','=','users.id')->where('member_kyc.pan_card', $request->get('pan_card'));
                        }
                        if ($request->aadhaar_card!="") {
                            if ($request->pan_card!="") {
                                $instance->where('member_kyc.aadhaar_card', $request->get('aadhaar_card'));
                            }else{
                            $instance->join('member_kyc','member_kyc.member_id','=','users.id')->where('member_kyc.aadhaar_card', $request->get('aadhaar_card'));
                            }
                        }
                        
                        if ($request->approved_from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('approved_from_date')));
                            $instance->where('approved_at','>=', $from);
                        }
                        if ($request->approved_to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('approved_to_date')));
                            $instance->where('approved_at','<=', $to);
                        }

                        if ($request->rejected_from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('rejected_from_date')));
                            $instance->where('rejected_at','>=', $from);
                        }
                        if ($request->rejected_to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('rejected_to_date')));
                            $instance->where('rejected_at','<=', $to);
                        }
                        

                        if ($request->register_from_date!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('register_from_date')));
                            $instance->where('created_at','>=', $from);
                        }
                        if ($request->register_to_date!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('register_to_date')));
                            $instance->where('created_at','<=', $to);
                        }
                    })
                    ->rawColumns(['action','status','package','aadhaar_card','pan_card','created_at','member_code','applied_at'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $data['packages']=Package::where('status','1')->get();
        $data['not_applied']=User::where('kyc_status','0')->where('user_role','2')->count();
        $data['pending']=User::where('kyc_status','1')->where('user_role','2')->count();
        $data['approved']=User::where('kyc_status','2')->where('user_role','2')->count();
        $data['rejected']=User::where('kyc_status','3')->where('user_role','2')->count();
        $data['status']="";
        if($request->has('status'))
        {
            $data['status']=$request->status;
        }
        return view('admin.kyc.index',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data['user']=User::find($id);
        $data['kyc']=Kyc::where('member_id',$id)->first();
        
        return view('admin.kyc.show',$data);
    }
    function approve($id)
    {
        $user=User::find($id);
        $user->kyc_status=2;
        $user->approved_at=date('Y-m-d H:i:s');
        $user->save();
        $kyc=Kyc::where('member_id',$id)->first();
        $user->kyc_status=2;
        $kyc->save();
        Session::flash('message', 'Kyc Approved successfully');
        return redirect('admin/kycs');
    }
    function reject($id)
    {
        $user=User::find($id);
        $user->kyc_status=3;
        $user->rejected_at=date('Y-m-d H:i:s');
        $user->save();
        $kyc=Kyc::where('member_id',$id)->first();
        $user->kyc_status=0;
        $kyc->save();
        Session::flash('message', 'Kyc rejected successfully');
        return redirect('admin/kycs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['user']=User::find($id);
        $data['kyc']=Kyc::where('member_id',$id)->first();
        
        return view('admin.kyc.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kyc=Kyc::find($id);
        if($request->pan_card_image!="")
        {
            $panName =time().'.'.$request->pan_card_image->extension();  
            $request->pan_card_image->move(public_path('uploads/kyc/pan/'), $panName);
            $pan="uploads/kyc/pan/".$panName;
            $kyc->pan_card_image=$pan;
        }
        
        if($request->aadhaar_card_image!="")
        {
            $aadharName =time().'.'.$request->aadhaar_card_image->extension();  
            $request->aadhaar_card_image->move(public_path('uploads/kyc/aadhaar_card/'), $aadharName);
            $aadhar="uploads/kyc/aadhaar_card/".$aadharName;
            $kyc->aadhaar_card_image=$aadhar;
        }
        if($request->cancel_cheque_image!="")
        {
            $checkName =time().'.'.$request->cancel_cheque_image->extension();  
            $request->cancel_cheque_image->move(public_path('uploads/kyc/check/'), $checkName
        );
            $check="uploads/kyc/check/".$checkName;
            $kyc->cancel_cheque_image=$check;
        }
    
        $kyc->pan_card=$request->pan_card;
        $kyc->aadhaar_card=$request->aadhaar_card;
        $kyc->account_name=$request->account_name;
        $kyc->account_number=$request->account_number;
        $kyc->account_type=$request->account_type;
        $kyc->bank_ifsc=$request->bank_ifsc;
        $kyc->bank_name=$request->bank_name;
        $kyc->bank_branch=$request->bank_branch;
        $kyc->save();
        Session::flash('message', 'Kyc updated successfully');
        return redirect('admin/kycs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
