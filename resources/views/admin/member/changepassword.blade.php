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
                                    <li class="breadcrumb-item active">Change Password</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Change Password</h4>
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
                <div class="col-6">
                    <form action="{{  url('admin/members/'.$member->id.'/change-password') }}" method="post">
                        @csrf
                           <div class="card-box ribbon-box">
                            <div class="ribbon ribbon-primary float-left">
                                <i class="mdi mdi-access-point mr-1"></i>
                            {{ $member->name }} | Tracking ID : {{ $member->member_id }}
                            </div>
                            <div class="ribbon-content">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <span class="text-danger">*</span>
                                    <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Enter New Password" required="">
                                     </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <span class="text-danger">*</span>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control mb-2" placeholder="Enter Confirm Password" required="">
                                </div>
                                <div class="text-sm-center">
                                    <button type="submit" class="btn btn-danger text-white"><i class="uil uil-message mr-1"></i>
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
@endsection