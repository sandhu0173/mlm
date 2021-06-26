@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
    <div class="content">
        <div class="content-wrapper">
           
    <div class="content-body">
        <section id="responsive-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-dark py-3 text-white">
                            <div class="card-widgets">
                                <a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                                    <i class="mdi mdi-minus"></i>
                                </a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Orders</h5>
                        </div>
                        
                        <div class="card-body mt-2">
                            <form action="{{ url('/admin/orders') }}" id="filterForm">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" class="form-control" placeholder="Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Member ID</label>
                                        <input type="text" name="member_id" class="form-control" placeholder="Member ID">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Member Name</label>
                                        <input type="text" name="member_name" class="form-control" placeholder="Member Name">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Package</label>
                                        <select name="package_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach($packages as $package)
                                            <option value="{{ $package->id }}" >{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Quantity</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="min_no" class="form-control" placeholder="Min">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="max_no" class="form-control" placeholder="Max">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Payment Mode</label>
                                        <select name="payment_mode" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($modes as $mode)
                                            <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Reference No</label>
                                        <input type="text" name="reference_no" class="form-control" placeholder="Reference No">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Bank</label>
                                        <select name="bank_name" class="form-control">
                                            <option value="">Select</option>
                                                @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->name." ". $bank->ac_number }}</option>
                                                @endforeach                           
                                            </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Deposit From Date</label>
                                        <input type="date" name="deposit_from_date" class="form-control" placeholder="Deposit Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Deposit To Date</label>
                                        <input type="date" name="deposit_to_date" class="form-control" placeholder="Deposit Date">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Select</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Approved</option>
                                                <option value="0">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ url('/admin/orders') }}" class="btn btn-outline-danger waves-effect">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg> Reset
                                        </a>
                                        <button type="submit" name="filter" value="filter" onclick="shouldExport = false;" class="btn btn-outline-primary waves-effect">
                                            <i class="uil uil-filter"></i> Apply Filter
                                        </button>
                                        <button type="submit" name="export" value="csv" onclick="shouldExport = true;" class="btn btn-relief-dark float-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg> Export
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card p-2">
                        <div class="col-sm-12">
                        <div class="card-datatable table-responsive">
                            <table class="table" id="pinRequestsTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>MEMBER ID</th>
                                    <th>MEMBER NAME</th>
                                    <th>Package</th>
                                    <th>Payment Mode</th>
                                    <th>Reference No</th>
                                    <th>Bank</th>
                                    <th>Deposit Date</th>
                                    <th>Receipt</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                
                            </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
    var table = $('#pinRequestsTable').DataTable({
        processing: true,
  serverSide: true,
        ajax: {
            url: "{{ url('admin/member/orders/'.$id) }}",
            data: function (d) {
                d.status=$('select[name=status]').val();
                d.package_id=$('select[name=package_id]').val();
                d.payment_mode=$('select[name=payment_mode]').val();
                d.bank_name=$('select[name=bank_name]').val();
                d.from_date=$('input[name=from_date]').val();
                d.to_date=$('select[name=to_date]').val();
                d.min_no=$('input[name=min_no]').val();
                d.max_no=$('input[name=max_no]').val();
                d.reference_no=$('input[name=reference_no]').val();
                d.deposit_from_date=$('input[name=deposit_from_date]').val();
                d.deposit_to_date=$('input[name=deposit_to_date]').val();
                d.member_id=$('input[name=member_id]').val();
                d.member_name=$('input[name=member_name]').val();
            }
            
        },
        "columns": [
            {data: 'DT_RowIndex', width: '5%', orderable: false},
            {name: "created_at", data: "created_at"},
            {name: "member_id", data: "member_id"},
            {name: "member_name", data: "member_name"},
            {name: "package", data: "package"},
            {name: "payment_mode", data: "payment_mode"},
            {name: "reference_no", data: "reference_no"},
            {name: "bank", data: "bank"},
            {name: "deposit_date", data: "deposit_date"},
            {name: "receipt", data: "receipt"},
            {name: "status", data: "status"},
            {name: "action", data: "action"},
        ]
    });
        $('#filterForm').on('submit',function(e){

        e.preventDefault();
        table.draw();
        setTimeout(() => {
            preloaderOff();    
        }, 1000);
        });
 });
</script>
@endsection