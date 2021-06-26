<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;

class PackageController extends Controller
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
            $data =Package::select('*');
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $button = '<a href="'.url('admin/packages/'.$row->id.'').'"  class="edit btn btn-primary btn-sm mr-1">View</a>';

                        if($row->status=='1')
                        {
                            $button.= '<a href="'.url('admin/packages/2/change-status?status=0').'" class="btn btn-danger btn-xs">
                            <i class="fe-x"></i> In-Activate</a>';    
                        }else{
                            $button.= '<a href="'.url('admin/packages/2/change-status?status=1').'" class="btn btn-success btn-xs">
                            <i class="fe-check"></i> Activate
                        </a>';    
                        }
                        return $button;
                    })
                    ->addColumn('status', function($row){
                        if($row->status=='1')
                        {
                            $status = '<span class="btn btn-success btn-xs waves-effect waves-light">Active</span>';    
                        }else{
                            $status = '<span class="btn btn-danger btn-xs waves-effect waves-light">Inactive</span>';    
                        }
                        return $status;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    
                    ->rawColumns(['action','status','parent','created_at'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['products']=Product::where('status','1')->get();
        return view('admin.package.create',$data);
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
            'capping' => 'required',
            'apv' => 'required',
            'dp' => 'required',
            'products' => 'required',
        ]);
        $pro=Package::create(['name'=>$request->name,
            'capping'=>$request->capping,
            'dp'=>$request->dp,
            'amount'=>'0',
            'apv'=>$request->apv,
        ]);
        $amount=0;
        $id=$pro->id;
        foreach($request->products as $product)
        {
            
            PackageProducts::create(['package_id'=>$id,
            'product_id'=>$product,
            ]);
            $prod=Product::find($product);
            $amount=$amount+$prod->price;
        }
        $pack=Package::find($id);
        $pack->amount=$amount;
        $pack->save();
        Session::flash('message', 'New Package added successfully');
        return redirect('admin/packages');
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
        $data['pack']=Package::find($id);
        $data['count']=1;
        return view('admin.package.show',$data);
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
        $data['categories']=Package::all();
        $data['cat']=Package::find($id);
        
        return view('admin.package.edit',$data);
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
        $cat=Package::find($id);
        $cat->name=$request->name;
        $cat->parent_id=$request->parent_id;
        $cat->save();
        Session::flash('message', 'Package updated successfully');
        return redirect('admin/packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cat=Package::find($id);
        $cat->delete();
        Session::flash('message', 'Package deleted successfully');
        return redirect('admin/packages');
    }
    function chagestatus(Request $request,$id)
    {
        $package=Package::find($id);
        $package->status=$request->status;
        $package->save();
        Session::flash('message', 'Package deleted successfully');
        return redirect('admin/packages');
    }
}
