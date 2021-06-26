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
                                    <li class="breadcrumb-item active">Create GST Master</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create GST Master</h4>
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
                <form method="post" action="{{ route('gst-type.store') }}">
                    @csrf      
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <div class="row">
                                        <div class="col-lg-3 col-12">
                                            <div class="form-group mb-3">
                                                <label class="required">HSN Code</label>
                                                <input type="text" name="hsn_code" class="form-control" placeholder="Enter HSN Code" value="" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <div class="form-group mb-3">
                                                <label class="required">SGST</label>
                                                <input type="text" name="sgst" id="sgst" class="form-control" placeholder="Enter SGST" value="" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <div class="form-group mb-3">
                                                <label class="required">CGST</label>
                                                <input type="text" name="cgst" id="cgst" class="form-control" placeholder="Enter CGST" value="" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-12">
                                            <div class="form-group mb-3">
                                                <label class="required">IGST</label>
                                                <input type="text" name="igst" id="igst" class="form-control" placeholder="Enter IGST" value="" required="">
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