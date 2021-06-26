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
                    <li class="breadcrumb-item active">Contact Info</li>
                </ol>
            </div>
            <h4 class="page-title">Contact Info</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card-box">
            <form method="post">
                @csrf
                <div class="form-group mb-2">
                    <label for="">Company Name</label>
                    <input type="text" class="form-control" name="title" value="{{ Helper::setting('title') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">GST No</label>
                    <input type="text" class="form-control" name="gst_no" value="{{ Helper::setting('gst_no') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Address Line 1</label>
                    <input type="text" class="form-control" name="address" value="{{ Helper::setting('address') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="">Address Line 2</label>
                    <input type="text" class="form-control" name="address_line_2" value="{{ Helper::setting('address_line_2') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="state">State</label>
                    <input name="state" type="text" class="form-control" value="{{ Helper::setting('state') }}">
                                        </div>
                <div class="form-group mb-2">
                    <label for="city_id">City</label>
                    <input name="city" type="text" class="form-control" value="{{ Helper::setting('city') }}">

                </div>
                <div class="form-group mb-2">
                    <label>Pincode</label>
                    <input type="text" class="form-control" name="pincode" value="{{ Helper::setting('pincode') }}"
                           autocomplete="off"
                           onkeypress="return isNumberKey(event)">
                                        </div>
                <div class="form-group mb-2">
                    <label>Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile"
                           value="{{ Helper::setting('mobile') }}" onkeydown="return max_length(this,event,10)"
                           autocomplete="off"
                           onkeypress="return isNumberKey(event)" >
                                        </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" name="email"
                           value="{{ Helper::setting('email') }}">
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