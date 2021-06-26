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
                    <li class="breadcrumb-item active">Change Logo</li>
                </ol>
            </div>
            <h4 class="page-title">Change Logo</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card-box">
            <form method="post" action="{{ url('admin/websetting/change-logo') }}" class="filePondForm" enctype="multipart/form-data">
                @csrf                   <div class="form-group">
                    <img class="img-fluid" width="260" height="80" src="{{ asset(Helper::setting('logo')) }}">
                    <label>Logo <span class="text-danger">*</span> <span class="text-danger"> (Width: 260px x Height: 80px)</span></label>
                    <input type="file" name="logo" class="filePondInput"
                           value=""
                           required accept="image/*">
                                        </div>
                <div class="form-group">
                    <img class="img-fluid" width="32" height="32" src="{{ asset(Helper::setting('logo')) }}">

                    <label>Favicon<span class="text-danger">*</span> <span class="text-danger"> (Width: 32px x Height: 32px)</span></label>
                    <input type="file" name="favicon" class="filePondInput"
                           value=""
                           required accept="image/*">
                                        </div>

                <div class="form-group  mt-4">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
