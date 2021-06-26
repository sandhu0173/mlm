<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;
use Session;
use Helper;
class SettingController extends Controller
{
    //
    function changelogo(Request $request)
    {
        if($request->method()=="POST")
        {
            //$fileName =time().'.'.$request->logo->extension();  
            $fileName = time().'_'.$request->logo->getClientOriginalName();

             $request->logo->move(public_path('uploads'), $fileName);
             $logo="uploads/".$fileName;
             Settings::where('name','logo')->update(['value'=>$logo]);
             
             $fileName =time().'.'.$request->favicon->extension();  
             $request->favicon->move(public_path('uploads'), $fileName);
             $favicon="uploads/".$fileName;
             Settings::where('name','favicon')->update(['value'=>$favicon]);

             Session::flash('message', 'Settings updated successfully');
             return redirect('admin/websetting/change-logo');
        }
        return view('admin.settings.changelogo');
    }
    function contactinfo(Request $request)
    {
        if($request->method()=="POST")
        {
            
             Settings::where('name','title')->update(['value'=>$request->title]);
             Settings::where('name','gst_no')->update(['value'=>$request->gst_no]);
             Settings::where('name','address_line_2')->update(['value'=>$request->address_line_2]);
             Settings::where('name','address')->update(['value'=>$request->address]);
             Settings::where('name','state')->update(['value'=>$request->state]);
             Settings::where('name','city')->update(['value'=>$request->city]);
             Settings::where('name','pincode')->update(['value'=>$request->pincode]);
             Settings::where('name','mobile')->update(['value'=>$request->mobile]);
             Settings::where('name','email')->update(['value'=>$request->email]);

             Session::flash('message', 'Settings updated successfully');
             return redirect('admin/websetting/contact-info');
        }
        return view('admin.settings.contactinfo');
    }
    function generalsettings(Request $request)
    {
        if($request->method()=="POST")
        {
             Settings::where('name','apv_limit')->update(['value'=>$request->apv_limit]);
             Settings::where('name','payout_price')->update(['value'=>$request->payout_price]);
             Settings::where('name','repurchase_discount')->update(['value'=>$request->repurchase_discount]);
             Settings::where('name','repurchase_parent_commision')->update(['value'=>$request->repurchase_parent_commision]);
             Settings::where('name','admin_charge')->update(['value'=>$request->admin_charge]);
             Settings::where('name','tds_with_kyc')->update(['value'=>$request->tds_with_kyc]);
             Settings::where('name','tds_without_kyc')->update(['value'=>$request->tds_without_kyc]);
             if(Helper::setting('message'))
             {
                Settings::where('name','message')->update(['value'=>$request->message]);
             }else{
                Settings::create(['name'=>'message','value'=>$request->message]);
             }
             

             Session::flash('message', 'Settings updated successfully');
             return redirect('admin/websetting/general-settings');
        }
        return view('admin.settings.generalsettings');
    }
}
