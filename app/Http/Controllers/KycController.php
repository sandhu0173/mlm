<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;

class KycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id=Auth::user()->id;
        $data['user']=User::find($user_id);
        $data['kyc']=Kyc::where('member_id',$user_id)->first();
        if($data['kyc'])
        {
            return view('member.kyc.edit',$data);
        }else{
            return view('member.kyc.create',$data);
        }
        
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
        $validated = $request->validate([
            'pan_card' => 'required',
            'aadhaar_card' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'bank_ifsc' => 'required',
            'bank_name' => 'required',
            'bank_branch' => 'required',
            'pan_card_image' => 'required',
            'aadhaar_card_image' => 'required',
            'cancel_cheque_image' => 'required',
        ]);
        $panName =time().'.'.$request->pan_card_image->extension();  
        $request->pan_card_image->move(public_path('uploads/kyc/pan/'), $panName);
        $pan="uploads/kyc/pan/".$panName;

        $aadharName =time().'.'.$request->aadhaar_card_image->extension();  
        $request->aadhaar_card_image->move(public_path('uploads/kyc/aadhaar_card/'), $aadharName);
        $aadhar="uploads/kyc/aadhaar_card/".$aadharName;

        $checkName =time().'.'.$request->cancel_cheque_image->extension();  
        $request->cancel_cheque_image->move(public_path('uploads/kyc/check/'), $checkName);
        $check="uploads/kyc/check/".$checkName;

        $user_id=Auth::user()->id;
        Kyc::create(['member_id'=>$user_id,
                        'pan_card'=>$request->pan_card,
                        'aadhaar_card'=>$request->aadhaar_card,
                        'account_name'=>$request->account_name,
                        'account_number'=>$request->account_number,
                        'account_type'=>$request->account_type,
                        'bank_ifsc'=>$request->bank_ifsc,
                        'bank_name'=>$request->bank_name,
                        'bank_branch'=>$request->bank_branch,
                        'pan_card_image'=>$pan,
                        'aadhaar_card_image'=>$aadhar,
                        'cancel_cheque_image'=>$check,
                        ]);
            $user=User::find($user_id);
            $user->kyc_status='1';
            $user->save();
        Session::flash('message', 'Kyc uploaded successfully');
        return redirect('member/kyc');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function show(Kyc $kyc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function edit(Kyc $kyc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kyc $kyc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kyc  $kyc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kyc $kyc)
    {
        //
    }
}
