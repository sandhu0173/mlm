<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\MemberTotalPayouts;

class MemberController extends Controller
{
    //
    function index(){
        $user_id=Auth::user()->id;
        $data['user']=User::find($user_id);
        $data['total']=MemberTotalPayouts::where('member_id',$user_id)->sum('payable_amount');
        return view('member.dashboard',$data);
    }
    function kyc(Request $request)
    {
        $user_id=Auth::user()->id;
        $data['user']=User::find($user_id);
        
        return view('member.kyc',$data);
    }
}
