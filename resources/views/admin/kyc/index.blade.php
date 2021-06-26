@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header bg-dark py-3 text-white">
    
                        <div class="card-widgets">
                            <a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                                <i class="mdi mdi-minus"></i>
                            </a>
                        </div>
                        <h5 class="card-title mb-0 text-white">
                            KYCs
                        </h5>
                    </div>
                    <div id="filters" class="collapse show">
                        <div class="card-body">
                            <form action="{{  url('admin/kycs') }}" id="filterForm">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Register From Date</label>
                                        <input type="date" name="register_from_date" class="form-control" placeholder="Register Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Register To Date</label>
                                        <input type="date" name="register_to_date" class="form-control" placeholder="Register Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Applied From Date</label>
                                        <input type="date" name="applied_from_date" class="form-control" placeholder="Applied Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Applied To Date</label>
                                        <input type="date" name="applied_to_date" class="form-control" placeholder="Applied Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Member ID</label>
                                        <input type="text" name="member_id" class="form-control" placeholder="Member ID">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Member Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Member Name">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                    </div>
                                    
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Pan Card</label>
                                        <input type="text" name="pan_card" class="form-control" placeholder="Pan Card">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Aadhaar Card</label>
                                        <input type="text" name="aadhaar_card" class="form-control" placeholder="Aadhaar Card">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Approved From Date</label>
                                        <input type="date" name="approved_from_date" class="form-control" placeholder="Approved Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Approved To Date</label>
                                        <input type="date" name="approved_to_date" class="form-control" placeholder="Approved Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Rejected From Date</label>
                                        <input type="date" name="rejected_from_date" class="form-control" placeholder="Rejected Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Rejected To Date</label>
                                        <input type="date" name="rejected_to_date" class="form-control" placeholder="Rejected Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="" >Select</option>
                                            <option @if($status=='0'){{ 'selected' }} @endif value="0">Not Applied</option>
                                            <option @if($status=='1'){{ 'selected' }} @endif value="1">Pending</option>
                                            <option @if($status=='2'){{ 'selected' }} @endif value="2">Approved</option>
                                            <option @if($status=='3'){{ 'selected' }} @endif value="3">Rejected</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ url('admin/kycs') }}" class="btn btn-danger waves-effect waves-light font-weight-bold">
                                            Reset
                                        </a>
                                        <button type="submit" name="filter" value="filter" onclick="shouldExport = false;" class="btn btn-primary waves-effect waves-light font-weight-bold">
                                            Apply Filter
                                        </button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="btnAlign text-center justify-content-center">
                        <button class="btn btn-primary mr-1 ml-1 sort" value="0"> Not Applied : {{ $not_applied }}  </button>
                        <button class="btn btn-warning mr-1 sort" value="1"> Pending : {{ $pending }} </button>
                        <button class="btn btn-success mr-1 sort" value="2"> Approved : {{ $approved }} </button>
                        <button class="btn btn-danger mr-1 sort" value="3"> Rejected : {{ $rejected }} </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped" id="kycsTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Status</th>
                                <th>Register Date</th>
                                <th>Applied Date</th>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Mobile</th>
                                <th>Package</th>
                                <th>Pan Card</th>
                                <th>Aadhaar Card</th>
                                <th>Approved Date</th>
                                <th>Rejected Date</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){

var table= $('#kycsTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{  url('admin/kycs') }}",
                data: function (d) {
                    $('#filterForm input, #filterForm select').each(function (i, el) {
                        var propertyName =$(this).attr('name'); 
                            d[propertyName] = $(this).val();
                    });
                }
            },
            "columns": [
                {data: 'DT_RowIndex', width: '5%', orderable: false},
                {name: "action", data: "action"},
                {name: "status", data: "status"},
                {name: "created_at", data: "created_at"},
                {name: "applied_at", data: "applied_at"},
                {name: "member_code", data: "member_code"},
                {name: "name", data: "name"},
                {name: "mobile", data: "mobile"},
                {name: "package", data: "package"},
                {name: "pan_card", data: "pan_card"},
                {name: "aadhaar_card", data: "aadhaar_card"},
                {name: "approved_at", data: "approved_at"},
                {name: "rejected_at", data: "rejected_at"},
            ]
        });
 $('#filterForm').on('submit',function(e){
     e.preventDefault();
    table.draw();
    setTimeout(() => {
        preloaderOff();    
       }, 1000);
    
 })
 $('.sort').on('click',function(){
            var status=$(this).val();
            $('select[name=status]').val(status);
            $('#filterForm').submit();
        })
});
 </script>
@endsection