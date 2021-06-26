<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\GstMaster;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;

class ProductController extends Controller
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
            $data =Product::select('products.*','categories.name as cat_name')
            ->join('categories','categories.id','=','products.category');

            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $button = '<a href="'.url('admin/products/'.$row->id.'/edit').'"  class="edit btn btn-primary btn-sm mr-1">Edit</a>';
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
                    ->addColumn('parent', function($row){
                        $parent = '-';
                        if($row->parent_id!='0')
                        {
                            $cat=Product::find($row->parent_id);
                            if($cat)
                            {
                                $parent=$cat->name;
                            }
                        }
                        return $parent;
                    })
                    ->addColumn('img', function($row){
                        $img = "<img src='".asset($row->image)."' class='avatar-sm'> ";
                        return $img;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->filter(function ($instance) use ($request) {
                        
                        if ($request->created_at_from!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('created_at_from')));
                            $instance->where('products.created_at','>=', $from);
                        }
                        if ($request->created_at_to!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('created_at_to')));
                            $instance->where('products.created_at','<=', $to);
                        }
                        if ($request->category!="") {
                            $instance->where('categories.name','LIKE', '%'.$request->category.'%');
                        }
                        if ($request->sku!="") {
                            $instance->where('products.sku','LIKE', '%'.$request->sku.'%');
                        }
                        if ($request->price!="") {
                            $instance->where('products.price','LIKE', '%'.$request->price.'%');
                        }
                        if ($request->apv!="") {
                            $instance->where('products.apv','LIKE', '%'.$request->apv.'%');
                        }
                        if ($request->dp!="") {
                            $instance->where('products.dp','LIKE', '%'.$request->dp.'%');
                        }
                        if ($request->bv!="") {
                            $instance->where('products.bv','LIKE', '%'.$request->bv.'%');
                        }
                        if ($request->name!="") {
                            $instance->where('products.name','LIKE', '%'.$request->name.'%');
                        }
                        if ($request->stock!="") {
                            $instance->where('products.stock','LIKE', '%'.$request->stock.'%');
                        }
                        if ($request->status!="") {
                            $instance->where('products.status',$request->status);
                        }
                        
                    })
                    ->rawColumns(['action','status','created_at','img'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['categories']=Categories::where('status','1')->get();
        $data['gsts']=GstMaster::where('status','1')->get();
        return view('admin.products.create',$data);
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
            'category' => 'required',
            'sku' => 'required',
            'apv' => 'required',
            'price' => 'required',
            'dp' => 'required',
            'bv' => 'required',
            'hsn_code' => 'required',
            'stock' => 'required',
            'image' => 'required',
        ]);
        $fileName =time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('uploads'), $fileName);
        $image="uploads/".$fileName;
        Product::create(['name'=>$request->name,
                        'category'=>$request->category,
                        'sku'=>$request->sku,
                        'price'=>$request->price,
                        'dp'=>$request->dp,
                        'bv'=>$request->bv,
                        'hsn_code'=>$request->hsn_code,
                        'stock'=>$request->stock,
                        'description'=>$request->description,
                        'image'=>$image,
                        'apv'=>$request->apv]
                    );
        Session::flash('message', 'New product added successfully');
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['categories']=Categories::where('status','1')->get();
        $data['gsts']=GstMaster::where('status','1')->get();
        $data['product']=Product::find($id);
        return view('admin.products.edit',$data);
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
        $product=Product::find($id);
        
        if($request->image)
        {
            $fileName =time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
            $image="uploads/".$fileName;
            $product->image=$image;
        }
        
        $product->name=$request->name;
        $product->category=$request->category;
        $product->sku=$request->sku;
        $product->price=$request->price;
        $product->dp=$request->dp;
        $product->bv=$request->bv;
        $product->hsn_code=$request->hsn_code;
        $product->stock=$request->stock;
        $product->description=$request->description;
        $product->apv=$request->apv;
        $product->save();
        Session::flash('message', 'Product updated successfully');
        return redirect('admin/products');
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
        $cat=Product::find($id);
        $cat->delete();
        Session::flash('message', 'Product deleted successfully');
        return redirect('admin/products');
    }
}
