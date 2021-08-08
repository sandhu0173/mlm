<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Banks;
use App\Models\PaymentModes;
use App\Models\Package;
use App\Models\ProductOrders;
use App\Models\PackageOrders;
use App\Models\Repurchase;
use Helper;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;
use Carbon\Carbon;

class OrdersController extends Controller
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
            $data =Orders::select('orders.*','banks.name as bank','payment_modes.name as payment_mode','users.name as member_name','users.member_id')
            ->join('payment_modes','payment_modes.id','=','orders.payment_mode')
            ->join('users','users.id','=','orders.member_id')
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
                    ->addColumn('package', function($row){
                        return '<a href="'.url('admin/orders/'.$row->id).'" class="btn btn-info btn-xs waves-effect waves-light"><i class="fa fa-eye"></i></a>'; 
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
                    ->addColumn('receipt', function($row){
                        $receipt='<a href="'.asset($row->receipt).'" target="_blank" class="btn btn-info btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>';
                        return $receipt;
                    })
                    ->addColumn('invoice', function($row){
                        $receipt='<a href="'.url('admin/order/invoice/'.$row->id).'" target="_blank" class="btn btn-info btn-sm">
                        <i class="fa fa-file"></i>
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
                    ->rawColumns(['receipt','status','package','created_at','deposit_date','action','invoice'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $data['packages']=Package::where('status','1')->get();
        $data['banks']=Banks::where('status','1')->get();
        $data['modes']=PaymentModes::where('status','1')->get();
        $data['pending']=Orders::where('status','1')->count();
        $data['approved']=Orders::where('status','2')->count();
        $data['rejected']=Orders::where('status','3')->count();
        $data['status']="";
        if($request->has('status'))
        {
            $data['status']=$request->status;
        }
        return view('admin.orders.index',$data);
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
       
        $data['order']=Orders::find($id);
        $data['totalapv']=0;
        $data['totalamount']=0;
        $data['totalqty']=0;
        $data['products']=ProductOrders::where('order_id',$id)->get();
        $data['packages']=PackageOrders::where('order_id',$id)->get();
        $data['count']=1;
        return view('admin.orders.detail',$data);
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
        //
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
    function approve($id)
    {
        $order=Orders::find($id);
        $order->status=2;
        $order->save();
        $user=User::where('id',$order->member_id)->where('status','1')->first();
        //get orders
        if($user)
        {
            $totalapv=0;
            $apv_limit=Helper::setting('apv_limit');
            $orders=Orders::where('member_id',$order->member_id)->get();
            //get total apv
            foreach($orders as $or)
            {
                 $ap1=ProductOrders::where('order_id',$or->id)->sum('apv');
                 $ap2=PackageOrders::where('order_id',$or->id)->sum('apv');
                 $apv=$ap1+$ap2;
                 $totalapv=$totalapv+$apv;
            }
            
            if($apv_limit<=$totalapv)
            {
                $user->status='2';
                $user->activate_at= date('Y-m-d H:i:s');
                $user->save();
            }
        }else{
            $ap1=Repurchase::create([
                'user_id'=>$order->member_id,
                'order_id'=>$order->id,
                ]);
        }
        Session::flash('message', 'Order approved successfully');
        return redirect('admin/orders');
    }
    function reject($id)
    {
        $order=Orders::find($id);
        $order->status=0;
        $order->save();
        Session::flash('message', 'Order rejected successfully');
        return redirect('admin/orders');
    }
    function invoice(Request $request,$id)
    {
        $data['order']=Orders::find($id);
       // $d=file_get_contents('http://www.postalpincode.in/api/pincode/'.$data['order']->user->pincode);
        //$response=json_decode($d);
        //$data['address']=$response->PostOffice[0];
        $data['count']=1;
        return view('admin.orders.invoice',$data);
    }
}
