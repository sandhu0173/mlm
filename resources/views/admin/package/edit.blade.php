@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
    <div class="content">
            <div class="container-fluid">
                                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ url('admin')}}">Home</a></li>
                                    <li class="breadcrumb-item active">Edit Category</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Category</h4>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ url('admin/categories/'.$cat->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group mb-3">
                                                <label>Parent Name</label>
                                                <select name="parent_id" class="form-control select2">
                                                    <option value="0">Select </option>
                                                    @foreach($categories as $category)
                                                    <option @if($cat->parent_id==$category->id){{ 'selected'}} @endif value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group mb-3">
                                                <label class=>Category Name</label>
                                                <span class="text-danger">*</span>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" value="{{$cat->name}}" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-sm-center">
                                            <button type="submit" class="btn btn-danger text-white"><i class="mdi mdi-send mr-1"></i> Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection