@extends('layouts.main')
@section('content')
@include('member.inc.sidebar')
<div class="content-page">
        <div class="content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">KYC Details</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('member/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">
                                        KYC Details :
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ url('/member/kyc') }}" class="filePondForm" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title-wrap">
                                    <h4 class="card-title mb-0">Identity Information</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label for="pan" class="require">Pan Card</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></span>
                                        </div>
                                        <input id="pan" type="text" required="" name="pan_card" class="form-control" placeholder="Enter Pan Card">
                                    </div>
                                                            </div>
                                <div class="form-group mb-2">
                                    <label for="aadhaar" class="required">Aadhaar Card</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span>
                                        </div>
                                        <input id="aadhaar" type="text" required="" name="aadhaar_card" class="form-control" placeholder="Enter Aadhaar Card"  onkeydown="return max_length(this,event,12)" onkeypress="return isNumberKey(event)" pattern=".{12,12}">
                                    </div>
                                                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title-wrap">
                                    <h4 class="card-title mb-0">Bank Information</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-md-4 mb-2">
                                        <label for="account" class="required">Account Holder Name </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></span>
                                            </div>
                                            <input id="account" type="text" required="" name="account_name" class="form-control" placeholder="Enter Account Holder Name">
                                        </div>
                                                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label for="account_number" class="required">Account Number </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span>
                                            </div>
                                            <input id="account_number" type="text" required="" name="account_number" class="form-control" placeholder="Enter Account Number" onkeydown="return max_length(this,event,20)" onkeypress="return isNumberKey(event)">
                                        </div>
                                                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label for="type" class="required">Account Type </label>
                                        <select id="type" class="form-control select2" required="" name="account_type">
                                            <option value="1" selected="" data-select2-id="2">
                                                Saving
                                            </option>
                                            <option value="2">
                                                Current
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label for="bank_ifsc" class="required">IFSC Code</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></span>
                                            </div>
                                            <input type="text" id="bank_ifsc" name="bank_ifsc" required="" class="form-control" placeholder="Enter IFSC Code" >
                                        </div>
                                                                        <span class="text-danger" id="bank_ifsc_error"></span>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label for="bank_name" class="required">Bank Name</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
                                            </div>
                                            <input type="text" id="bank_name" name="bank_name" class="form-control" placeholder="Enter Bank Name"  required="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 mb-2">
                                        <label for="bank_branch" class="required">Bank Branch</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
                                            </div>
                                            <input type="text" id="bank_branch" required="" name="bank_branch" class="form-control" placeholder="Enter Bank Branch">
                                        </div>
                                                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title-wrap">
                                        <h4 class="card-title mb-0">Upload Documents</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-4 col-12 filter-item">
                                            <label for="example-input-large" class="required">
                                                Pan Card Image
                                            </label>
                                            <input type="file" class="filePondInput" name="pan_card_image" 
                                                accept="image/*" required>
                                                                        </div>
                                        <div class="form-group col-lg-4 col-12 filter-item">
                                            <label for="example-input-large" class="required">
                                                Aadhaar Card Image
                                            </label>
                                            <input type="file" class="filePondInput" name="aadhaar_card_image" accept="image/*" required>
                                                                        </div>
                                        <div class="form-group col-lg-4 col-12 filter-item">
                                            <label for="example-input-large" class="required">
                                                Cancel Cheque/Passbook Image
                                            </label>
                                            <input type="file" class="filePondInput" name="cancel_cheque_image"
                                                 accept="image/*" required>
                                                                        </div>
                                                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                                <div class="text-center">
                                    <button type="submit" name="profile" class="btn btn-relief-primary">
                                        <i class="fe-thumbs-up mr-1"></i> Submit
                                    </button>
                                </div>
                            </div>
                </form>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
</div>
             
@endsection
@section('scripts')

@endsection