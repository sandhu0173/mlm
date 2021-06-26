<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;
use DB;

class ProfileController extends Controller
{
    //
    function index(Request $request)
    {
        $user_id=Auth::user()->id;
        $data['user']=User::find($user_id);
        return view('member.profile',$data);
    }
    function update(Request $request)
    {
        $id=Auth::user()->id;
        $user=User::find($id);
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->pincode=$request->pincode;
        $user->address=$request->address;
        $user->gender=$request->gender;
        if($request->profile_image)
        {
            $fileName =time().'.'.$request->profile_image->extension();  
            $request->profile_image->move(public_path('uploads/profile/'), $fileName);
            $image="uploads/profile/".$fileName;
            $user->image=$image;
        }
        $user->save();
        Session::flash('message', 'Profile updated successfully');
        return redirect('member/profile');
    }
    function changepassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $id=Auth::user()->id;
        $user=User::find($id);
        if($user->passkey==$request->old_password)
        {
            $user->password=Hash::make($request->password);
            $user->passkey=$request->password;
            $user->save();
            Session::flash('message', 'Password updated successfully');
            return redirect('member/profile');
        }else{
            Session::flash('error', 'Old Password not matched');
            return redirect('member/profile');
        }
    }
}
