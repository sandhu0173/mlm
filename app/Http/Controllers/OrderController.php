<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\PackageOrders;
use App\Models\ProductOrders;
use App\Models\Banks;
use App\Models\PaymentModes;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //
        $user_id=Auth::user()->id;
        if($request->ajax())
        {
            $data =Orders::select('orders.*','banks.name as bank','payment_modes.name as payment_mode')
            ->join('payment_modes','payment_modes.id','=','orders.payment_mode')
            ->join('banks','banks.id','=','orders.bank_name')
            ->where('orders.member_id',$user_id);
            return DataTables::of($data)
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
                    ->addColumn('package', function($row){
                        return '<a href="'.url('member/order/invoice/'.$row->id).'" class="btn btn-info btn-xs waves-effect waves-light"><i class="fa fa-eye"></i></a>'; 
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
                    ->filter(function ($instance) use ($request) {
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
                    ->rawColumns(['receipt','status','package','created_at','deposit_date'])
                    ->addIndexColumn()
                    ->make(true);
        }
        $data['packages']=Package::where('status','1')->get();
        $data['products']=Product::where('status','1')->get();
        $data['banks']=Banks::where('status','1')->get();
        $data['modes']=PaymentModes::where('status','1')->get();
        return view('member.orders.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['packages']=Package::where('status','1')->get();
        $data['products']=Product::where('status','1')->get();
        $data['banks']=Banks::where('status','1')->get();
        $data['modes']=PaymentModes::where('status','1')->get();
        return view('member.orders.create',$data);
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
            'payment_mode' => 'required',
            'bank_name' => 'required',
            'reference_no' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);
        $totalamount=0;
        $totalapv=0;
        $receipt="N/A";
        if($request->has('receipt'))
        {
         $receiptName =time().'.'.$request->receipt->extension();  
          $request->receipt->move(public_path('uploads/order/receipt/'), $receiptName);
          $receipt="uploads/order/receipt/".$receiptName;
        }
            $user_id=Auth::user()->id;
            $order=Orders::create(['member_id'=>$user_id,
                        'amount'=>$totalamount,
                        'apv'=>$totalapv,
                        'payment_mode'=>$request->payment_mode,
                        'bank_name'=>$request->bank_name,
                        'reference_no'=>$request->reference_no,
                        'date'=>$request->date,
                        'time'=>$request->time,
                        'receipt'=>$receipt,
                        ]);
            $id=$order->id;
          $total=count($request->item);
            for($i=0;$i<$total;$i++)
            {
                //if item is product
                if($request->item[$i])
                {
                    if($request->type[$i]=='1')
                    {
                        ProductOrders::create([
                            'order_id'=>$id,
                            'product_id'=>$request->item[$i],
                            'quantity'=>$request->quantity[$i],
                            'apv'=>$request->apv[$i],
                            'amount'=>$request->amount[$i],
                        ]);
                        
                    }else{
                        PackageOrders::create([
                            'order_id'=>$id,
                            'package_id'=>$request->item[$i],
                            'quantity'=>$request->quantity[$i],
                            'apv'=>$request->apv[$i],
                            'amount'=>$request->amount[$i],
                        ]);
                    }
                    $totalamount=$totalamount+$request->amount[$i];
                    $totalapv=$totalapv+$request->apv[$i];
                }
            }

            $user=User::find($user_id);
            $user->package_id=$id;
            $user->save();
            if($user->status=='2')
            {
                $repurchase=1;
            }else{
                $repurchase=0;
                $user->package_id=$id;
                $user->save();
            }
            $order=Orders::find($id);
            $order->amount=$totalamount;
            $order->apv=$totalapv;
            $order->is_repurchase=$repurchase;
            $order->save();
            Session::flash('message', 'New Order submitted successfully');
            return redirect('member/orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
    function product(Request $request)
    {
        $id=$request->item_id;
        $product=Product::find($id);
        return response()->json($product);
    }
    function package(Request $request)
    {
        $id=$request->item_id;
        $package=Package::find($id);
        return response()->json($package);
    }
    function invoice($id)
    {
        $data['user']=Auth::user();
       // $d=file_get_contents('http://www.postalpincode.in/api/pincode/'.$data['user']->pincode);
       // $response=json_decode($d);
       // $data['address']=$response->PostOffice[0];
        $data['order']=Orders::find($id);
        $data['products']=ProductOrders::where('order_id',$id)->get();
        $data['packages']=PackageOrders::where('order_id',$id)->get();
        $data['count']=1;
        return view('member.orders.invoice',$data);
    }
}
