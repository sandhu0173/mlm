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
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Product</h4>
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
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="filePondForm">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div id="app">
                        <div class="row">
                            <div class="form-group mb-2 col-lg-4 col-12">
                                <label for="name">Product Name <span class="text-danger">*</span></label>
                                <input required="" type="text" id="name" class="form-control" placeholder="e.g : Apple iMac" name="name" value="">
                                                            </div>

                            <div class="form-group mb-2 col-lg-4 col-12">
                                <label for="category">Categories <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="category" id="category" >
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    </select>
                            </div>

                            <div class="form-group mb-2 col-lg-4 col-12">
                                <label for="sku">Product Code <span class="text-danger">*</span></label>
                                <input required="" type="text" id="sku" class="form-control" placeholder="e.g : SKU1564" name="sku" value="">
                                                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group mb-3 col-lg-4 col-12">
                                <label for="mrp">MRP <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                    </div>
                                    <input required="" type="number" class="form-control" placeholder="MRP" id="price" name="price" value="">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-4 col-12">
                                <label for="dp">AP <small>ASSOCIATE PRICE</small><span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                    </div>
                                    <input required="" type="number" class="form-control" placeholder="DP" name="dp" id="dp" value="">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" placeholder="BV" id="bv" name="bv" value="0">
                            <div class="form-group mb-3 col-lg-4 col-12">
                                <div class="form-group mb-3">
                                    <label for="apv">APV <small>(Activation Point Value)</small> <span class="text-danger">*</span></label>
                                    <input required="" type="number" class="form-control" placeholder="APV" id="apv" name="apv" value="">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-3 col-12">
                                <div class="form-group mb-3">
                                    <label for="hsn">HSN Code <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="hsn_code" required="" name="hsn_code">
                                    <option value="">Select</option>
                                    @foreach($gsts as $gst)
                                    <option value="{{$gst->id}}">{{$gst->hsn_code}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-3 col-12">
                                <label for="stock">Opening Stock <span class="text-danger">*</span></label>
                                <input required="" type="number" id="stock" class="form-control" placeholder="e.g :15" name="stock" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-lg-6 mb-0">
                            <label for="comment">Description</label>
                            <textarea class="form-control" rows="6" placeholder="Please enter description" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group col-12 col-lg-6 mb-3">
                            <label>Product Images <span class="text-danger">*</span></label>
                            <input  type="file"  name="image" required="" accept="image/*">

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Create
                            </button>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </form>
            </div>
        </div>
@endsection