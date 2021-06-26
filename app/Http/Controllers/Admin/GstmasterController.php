<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GstMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;

class GstmasterController extends Controller
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
            $data =GstMaster::select('*');
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $button = '<a href="'.url('admin/gst-type/'.$row->id.'/edit').'"  class="edit btn btn-primary btn-sm mr-1">Edit</a>';
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
                            $cat=GstMaster::find($row->parent_id);
                            if($cat)
                            {
                                $parent=$cat->name;
                            }
                        }
                        return $parent;
                    })
                    ->addColumn('count', function($row){
                        $count = $row->id;
                        return $count;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->filter(function ($instance) use ($request) {
                       
                        if ($request->hsn_code!="") {
                            $instance->where('hsn_code','LIKE', "%".$request->get('hsn_code')."%");
                        }
                        if ($request->cgst!="") {
                            $instance->where('cgst','LIKE', "%".$request->get('cgst')."%");
                        }
                        if ($request->sgst!="") {
                            $instance->where('sgst','LIKE', "%".$request->get('sgst')."%");
                        }
                        if ($request->igst!="") {
                            $instance->where('igst','LIKE', "%".$request->get('igst')."%");
                        }
                        if ($request->created_at_from!="") {
                            $from=date("Y-m-d 00:00:00",strtotime($request->get('created_at_from')));
                            $instance->where('created_at','>=', $from);
                        }
                        if ($request->created_at_to!="") {
                            $to=date("Y-m-d 23:59:59",strtotime($request->get('created_at_to')));
                            $instance->where('created_at','<=', $to);
                        }
                        
                    })
                    ->rawColumns(['action','status','created_at'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.gst.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gst.create');
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
            'hsn_code' => 'required',
            'igst' => 'required',
            'sgst' => 'required',
            'cgst' => 'required',
        ]);
        GstMaster::create(['hsn_code'=>$request->hsn_code,'igst'=>$request->igst,'cgst'=>$request->cgst,'sgst'=>$request->sgst]);
        Session::flash('message', 'New Gst Type added successfully');
        return redirect('admin/gst-type');
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
        $data['gst']=GstMaster::find($id);
        return view('admin.gst.edit',$data);
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
        $gst=GstMaster::find($id);
        $gst->hsn_code=$request->hsn_code;
        $gst->cgst=$request->cgst;
        $gst->sgst=$request->sgst;
        $gst->igst=$request->igst;
        $gst->save();
        Session::flash('message', 'GST Type updated successfully');
        return redirect('admin/gst-type');
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
        $cat=GstMaster::find($id);
        $cat->delete();
        Session::flash('message', 'GST Type deleted successfully');
        return redirect('admin/gst-type');
    }
}
