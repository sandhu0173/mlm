@extends('layouts.main')
@section('content')
@include('member.inc.sidebar')
<div class="content-page">
        <div class="content">
        <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
            <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <form action="{{ url('member/profile/update') }}" method="post" class="filePondForm" enctype="multipart/form-data" >
            @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title mb-0">Profile</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="name">Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text readonly"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></span>
                                        </div>
                                        <input id="name" type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $user->name }}" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="mobile">Mobile Number</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text readonly"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></span>
                                        </div>
                                        <input id="mobile" type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{ $user->mobile }}" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="email" class="required">Email ID</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                                        </div>
                                        <input id="email" type="text" name="email" class="form-control" placeholder="Enter Email ID" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="basic-datepicker" class="required">Date Of Birth</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text readonly"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                        </div>
                                        <input id="basic-datepicker" type="text" name="dob" class="form-control flatpickr-input" placeholder="Enter Date Of Birth" readonly="readonly" value="{{ $user->dob }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label class="required">Address</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg></span>
                                        </div>
                                        <textarea name="address" class="form-control" placeholder="Enter Address" required="">{{ $user->address }}</textarea>
                                    </div>
                                                                    </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="pincode" class="required">Pincode</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span>
                                        </div>
                                        <input id="pincode" type="text" name="pincode" class="form-control" placeholder="Enter Pincode" value="{{ $user->pincode }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label class="required">Nominee Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg></span>
                                        </div>
                                        <input name="nominee" class="form-control" placeholder="Enter Nominee Name" required="" value="{{ $user->nominee }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="basic-datepicker" class="required">Nominee Date Of Birth</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text readonly"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                        </div>
                                        <input id="basic-datepicker" type="date" name="nominee_dob" class="form-control flatpickr-input" placeholder="Enter Date Of Birth" value="{{ $user->nominee_dob }}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label for="pincode" class="required">Nominee Relationship </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span>
                                        </div>
                                        <input id="pincode" type="text" name="nominee_relation" class="form-control" placeholder="Nominee Relationship" value="{{ $user->nominee_relation }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-2">
                                    <label>Gender</label>
                                    <div class="demo-inline-spacing">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="male" name="gender" value="1" class="custom-control-input" @if($user->gender=='1') {{ 'checked' }} @endif >
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="female" name="gender" value="2" class="custom-control-input" @if($user->gender=='2') {{ 'checked' }} @endif >
                                            <label class="custom-control-label" for="female">FeMale</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group mb-3">
                                    <label>Profile Image</label>
                                    <input type="file" class="filePondInput" name="profile_image"
                                           value="{{$user->image}}"
                                           accept="image/*"/>
                                           <img src="{{ asset($user->image) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="submit" name="profile" class="btn btn-relief-primary">
                                        <i class="fe-thumbs-up mr-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title mb-0">Change Password</h4>
                    </div>
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{ url('member/change-password') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password-icon" class="required">Old Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                        </div>
                                        <input type="password" name="old_password" class="form-control" id="basic-default-password1" placeholder="Enter Old Password" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                        </div>
                                    </div>
                                                                    </div>
                                <div class="form-group">
                                    <label for="password-icon" class="required">New Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" id="basic-default-password1" placeholder="Enter New Password" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                        </div>
                                    </div>
                                                                    </div>
                                <div class="form-group">
                                    <label for="password-icon" class="required">Confirm Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                        </div>
                                        <input type="password" name="password_confirmation" class="form-control" id="basic-default-password1" placeholder="Enter Confirm Password" required="">
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center">
                                    <button type="submit" name="" class="btn btn-relief-primary">
                                        <i class="fe-thumbs-up mr-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         
    </div>
    </div>
</div>
        </div>
</div>
             
@endsection
@section('scripts')

@endsection