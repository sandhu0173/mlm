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
                    <li class="breadcrumb-item active">General Settings</li>
                </ol>
            </div>
            <h4 class="page-title">General Settings</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card-box">
            <form method="post">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Activate Member APV</label>
                    <input type="number" class="form-control" name="apv_limit" value="{{ Helper::setting('apv_limit') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Binary Payout amount (Rs.)</label>
                    <input type="number" class="form-control" name="payout_price" value="{{ Helper::setting('payout_price') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Self Repurchase amount(%)</label>
                    <input type="number" class="form-control" name="repurchase_discount" value="{{ Helper::setting('repurchase_discount') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Team Repurchase amount(%)</label>
                    <input type="number" class="form-control" name="repurchase_parent_commision" value="{{ Helper::setting('repurchase_parent_commision') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Admin charge(%)</label>
                    <input type="number" class="form-control" name="admin_charge" value="{{ Helper::setting('admin_charge') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">TDS With KYC</label>
                    <input type="number" class="form-control" name="tds_with_kyc" value="{{ Helper::setting('tds_with_kyc') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">TDS Without KYC</label>
                    <input type="number" class="form-control" name="tds_without_kyc" value="{{ Helper::setting('tds_without_kyc') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Dashboard Message</label>
                    <input type="" class="form-control" name="message" value="{{ Helper::setting('message') }}">
                </div>
                
                <div class="text-sm-center">
                    <button type="submit" class="btn btn-danger text-white mt-3">
                        <i class="uil uil-message mr-1"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode != 46 && charCode != 45 && charCode > 31
                && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        // 2. Max Length & Prevent Enter Button to Refresh the Page//
        function max_length(obj, e, max) {
            e = e || event;
            max = max;
            if (e.keyCode === 13) {
                event.preventDefault();
            }
            if (obj.value.length >= max && e.keyCode > 46) {
                return false;
            }
            return true;
        }
</script>
@endsection