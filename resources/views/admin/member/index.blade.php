@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card mt-2">
                <div class="card-header bg-dark py-3 text-white">
                    

                    <h5 class="card-title mb-0 text-white">Members </h5>
                </div>
                <div id="filters" class="collapse show">
                    <div class="card-body">
                    <form action="{{ url('admin/members') }}" id="filterForm">
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Joining From Date</label>
                                    <input type="date" name="joining_from_date" class="form-control" placeholder="Joining Date">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Joining To Date</label>
                                    <input type="date" name="joining_to_date" class="form-control" placeholder="Joining Date">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Activation From Date</label>
                                    <input type="date" name="activated_from_date" class="form-control" placeholder="Activation Date" value="">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Activation To Date</label>
                                    <input type="date" name="activated_to_date" class="form-control" placeholder="Activation Date" value="">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Member ID</label>
                                    <input type="text" name="code" class="form-control" placeholder="Member ID">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Member Name</label>
                                    <input type="text" name="user_name" class="form-control" placeholder="Member Name">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Mobile</label>
                                    <input type="text" name="user_mobile" class="form-control" placeholder="Mobile">
                                </div>
                                
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Sponsor ID</label>
                                    <input type="text" name="sponsor_code" class="form-control" placeholder="Sponsor ID">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Sponsor Name</label>
                                    <input type="text" name="sponsor_name" class="form-control" placeholder="Sponsor Name">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Sponsor Mobile</label>
                                    <input type="text" name="sponsor_mobile" class="form-control" placeholder="Sponsor Mobile">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>KYC Status</label>
                                    <select name="kyc_status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="0">Not Applied</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Approved</option>
                                        <option value="3">Rejected</option>
                                </select>
                                </div>
                                
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Member Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="1">Free</option>
                                        <option value="2">Active</option>
                                        <option value="3">Blocked</option>
                                </select>
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Member Paid</label>
                                    <select name="is_paid" class="form-control">
                                        <option value=""> Select</option>
                                        <option value="1">
                                            Un Paid
                                        </option>
                                        <option value="2">
                                            Paid
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ url('admin/members') }}" class="btn btn-danger waves-effect waves-light font-weight-bold">
                                        Reset
                                    </a>
                                    <button type="submit" name="filter" value="filter" onclick="shouldExport = false;" class="btn btn-primary waves-effect waves-light font-weight-bold">
                                        Apply Filter
                                    </button>
                                    <button type="submit" name="export" value="csv" onclick="shouldExport = true;" class="btn btn-secondary waves-effect waves-light font-weight-bold float-right">
                                        Export
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
                    <div class="table-responsive">
                        <div id="categoryTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table table-hover table-bordered table-striped dataTable no-footer" id="memberTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ACTION</th>
                                    <th>JOINING DATE</th>
                                    <th>ACTIVATION  DATE</th>
                                    <th>MEMBER ID	</th>
                                    <th>Password	</th>
                                    <th>MEMBER NAME</th>
                                    <th>MOBILE</th>
                                    <th>SPONSOR ID</th>
                                    <th>SPONSOR NAME</th>
                                    <th>SPONSOR MOBILE</th>
                                    <th>KYC</th>
                                    <th>PACKAGE</th>
                                    <th>MEMBER STATUS</th>
                                    <th>MEMBER PAID</th>
                                    <th>Invoice</th>
                                    
                                </tr>
                            <thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
    var filter={};
var table= $('#memberTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],  
  processing: true,
  serverSide: true,
  ajax: {
   url: "{{ route('members.index') }}",
   data: function (d) {
    $('#filterForm input, #filterForm select').each(function (i, el) {
            var propertyName =$(this).attr('name'); 
                d[propertyName] = $(this).val();
        });
    }
  },
  columns: [
    {
    data: 'DT_RowIndex',
    name: 'DT_RowIndex',
    orderable: false
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   },
   {
    data: 'created_at',
    name: 'created_at'
   },
   {
    data: 'activate_at',
    name: 'activate_at'
   },
   {
    data: 'member_id',
    name: 'member_id'
   },
   {
    data: 'passkey',
    name: 'passkey'
   },
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'mobile',
    name: 'mobile'
   },
   {
    data: 'tracking_id',
    name: 'tracking_id'
   },
   {
    data: 'sponsor_name',
    name: 'sponsor_name'
   },
   {
    data: 'sponsor_mobile',
    name: 'sponsor_mobile'
   },
   {
    data: 'kyc',
    name: 'kyc'
   },
   {
    data: 'package',
    name: 'package'
   },
   {
    data: 'status',
    name: 'status'
   },
   {
    data: 'paid_status',
    name: 'paid_status'
   },
   {
    data: 'invoice',
    name: 'invoice'
   },
  ]
 });

 
 $('#filterForm').on('submit', function (e) {
     e.preventDefault();
        table.draw();
        setTimeout(() => {
          preloaderOff();    
       }, 1000);
   
});


});
 </script>
@endsection