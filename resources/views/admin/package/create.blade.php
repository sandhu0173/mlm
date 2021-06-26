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
                        <li class="breadcrumb-item active">Create Package</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Package</h4>
            </div>
        </div>
    </div>

    <form method="post" action="{{ url('admin/packages') }}">
        @csrf
               <div id="app" class="row">
               <div class="col-lg-12">
               <div class="card">
               <div class="card-body">
               <h4 class="header-title">PACKAGE INFORMATION</h4>
                <p class="sub-header"> Adding your package Details</p> 
                <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="form-group mb-3">
                        <label>Package Name</label>
                        <span class="text-danger">*</span> 
                        <input type="text" required="required" name="name" placeholder="Enter Package Name" value="" class="form-control">
                    </div>
                </div> 
                <div class="col-lg-4 col-12">
                    <div class="form-group mb-3">
                         <input type="hidden" required="required" name="capping" placeholder="Enter Capping Amount" value="0" class="form-control">
                        <label for="dp">AP <small>ASSOCIATE PRICE</small><span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                            </div>
                            <input required="" type="number" class="form-control" placeholder="AP" name="dp" id="dp" value="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="form-group mb-3">
                         <label>APV</label>
                            <span class="text-danger">*</span>
                        <div class="input-group">
                            <input type="number" required="required" name="apv" placeholder="Enter APV" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="form-group mb-3">
                         <label>Products</label>
                            <span class="text-danger">*</span>
                        <div class="input-group">
                            <select class="form-control select2" name="products[]" required multiple>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                            </select>
                        </div>
                </div>
                </div>
            
        </div> 
        <div class="row">
            <div class="col-12">
                <div class="text-sm-center">
                    <button class="btn btn-danger text-white"><i class="uil uil-message mr-1"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
@endsection