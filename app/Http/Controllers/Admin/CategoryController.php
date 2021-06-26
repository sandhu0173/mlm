<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\f;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use Session;
use DataTables;

class CategoryController extends Controller
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
            $data =Categories::select('*');
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                        $button = '<a href="'.url('admin/categories/'.$row->id.'/edit').'"  class="edit btn btn-primary btn-sm mr-1">Edit</a>';
                        $button .= '<a href="'.url('admin/categories/'.$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
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
                            $cat=Categories::find($row->parent_id);
                            if($cat)
                            {
                                $parent=$cat->name;
                            }
                        }
                        return $parent;
                    })

                    ->addColumn('created_at', function($row){
                        return $row->created_at;
                    })
                    ->filter(function ($instance) use ($request) {
                        if ($request->status!="") {
                            $instance->where('status', $request->get('status'));
                        }
                        if ($request->name!="") {
                            $instance->where('name','LIKE', "%".$request->get('name')."%");
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
                    ->rawColumns(['action','status','parent','created_at'])
                    ->addIndexColumn()
                    ->make(true);
        }
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['categories']=Categories::all();
        return view('admin.category.create',$data);
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
        ]);
        Categories::create(['name'=>$request->name,'parent_id'=>$request->parent_id]);
        Session::flash('message', 'New Category added successfully');
        return redirect('admin/categories');
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
        $data['categories']=Categories::all();
        $data['cat']=Categories::find($id);
        return view('admin.category.edit',$data);
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
        $cat=Categories::find($id);
        $cat->name=$request->name;
        $cat->parent_id=$request->parent_id;
        $cat->save();
        Session::flash('message', 'New Category updated successfully');
        return redirect('admin/categories');
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
        $cat=Categories::find($id);
        $cat->delete();
        Session::flash('message', 'Category deleted successfully');
        return redirect('admin/categories');
    }
}
