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
                                    <li class="breadcrumb-item active">Edit Member</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Member</h4>
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
                <div class="col-12">
                    <form method="post" action="{{ url('admin/members/'.$member->id) }}">
                        @csrf
                        @method('PUT')
                                       <div class="card-box ribbon-box">
                            <div class="ribbon ribbon-primary float-left">
                                <i class="mdi mdi-access-point mr-1"></i>
                                {{ $member->name }} | Tracking ID : {{ $member->member_id }}
                            </div>
                            <div class="ribbon-content">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4" class="col-form-label">Name</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" name="name" value="{{ $member->name }}" class="form-control" required="" placeholder="Enter Name">
                                                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4" class="col-form-label">Email</label>
                                        <span class="text-danger">*</span>
                                        <input type="email" name="email" value="{{ $member->email }}" class="form-control" required="" placeholder="Enter Email">
                                                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4" class="col-form-label">Mobile Number</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" name="mobile" value="{{  $member->mobile }}" required="" class="form-control" placeholder="Enter Mobile Number">
                                                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4" class="col-form-label">Gender</label><br>
                                        <div class="radio radio-info form-check-inline">
                                            <input type="radio" id="inlineRadio1" value="1" @if($member->gender=='1'){{ 'checked' }} @endif name="gender">
                                            <label for="inlineRadio1"> Male </label>
                                        </div>
                                        <div class="radio form-check-inline">
                                            <input type="radio" id="inlineRadio2" @if($member->gender=='2'){{ 'checked' }} @endif value="2" name="gender">
                                            <label for="inlineRadio2"> Female </label>
                                        </div>
                                                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4" class="col-form-label">Date Of Birth</label>
                                        <input type="text" name="dob" class="form-control flatpickr-input" id="basic-datepicker" placeholder="Enter DOB" required="" readonly="readonly" value="{{ $member->dob }}">
                                                                    </div>
                                    <div class="form-group col-12 mt-4 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
@endsection