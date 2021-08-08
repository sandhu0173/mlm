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
                                                <option @if($status=='1'){{ 'selected' }} @endif value="1">Pending</option>
                                                <option @if($status=='2'){{ 'selected' }} @endif value="2">Approved</option>
                                                <option @if($status=='0'){{ 'selected' }} @endif value="0">Rejected</option>
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
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card p-2">
                        <div class="col-sm-12">
                        <div class="card-body">
                            <div class="btnAlign text-center justify-content-center">
                                <button class="btn btn-warning mr-1 sort" value="1"> Pending : {{ $pending }} </button>
                                <button class="btn btn-success mr-1 sort" value="2"> Approved : {{ $approved }} </button>
                                <button class="btn btn-danger mr-1 sort" value="0"> Rejected : {{ $rejected }} </button>
                            </div>
                        <div class="card-datatable table-responsive">
                            <table class="table" id="pinRequestsTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>MEMBER ID</th>
                                    <th>MEMBER NAME</th>
                                    <th>Package</th>
                                    <th>APV</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Reference No</th>
                                    <th>Bank</th>
                                    <th>Deposit Date</th>
                                    <th>Receipt</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th></th>
                                        <th colspan="5"></th>
                                    </tr>
                                </tfoot>
                                
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
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
  serverSide: true,
        ajax: {
            url: "{{ url('admin/orders') }}",
            data: function (d) {
                $('#filterForm input, #filterForm select').each(function (i, el) {
                var propertyName =$(this).attr('name'); 
                    d[propertyName] = $(this).val();
            });
            console.log(d);
            }
            
        },
        "columns": [
            {data: 'DT_RowIndex', width: '5%', orderable: false},
            {name: "created_at", data: "created_at"},
            {name: "member_id", data: "member_id"},
            {name: "member_name", data: "member_name"},
            {name: "package", data: "package"},
            {name: "apv", data: "apv"},
            {name: "amount", data: "amount"},
            {name: "payment_mode", data: "payment_mode"},
            {name: "reference_no", data: "reference_no"},
            {name: "bank", data: "bank"},
            {name: "deposit_date", data: "deposit_date"},
            {name: "receipt", data: "receipt"},
            {name: "status", data: "status"},
            {name: "invoice", data: "invoice"},
            {name: "action", data: "action"},
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            
            // Total over this page
            totalapv = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
                // Total over this page
            totalamount = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(totalapv);
            $( api.column( 6 ).footer() ).html(totalamount);
        }
    });
        $('#filterForm').on('submit',function(e){

        e.preventDefault();
        table.draw();
        setTimeout(() => {
            preloaderOff();    
        }, 1000);
        });
        $('.sort').on('click',function(){
            var status=$(this).val();
            $('select[name=status]').val(status);
            $('#filterForm').submit();
        })
 });
</script>
@endsection