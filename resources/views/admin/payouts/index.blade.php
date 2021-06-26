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
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                        <i class="mdi mdi-minus"></i>
                    </a>
                </div>
                <h5 class="card-title mb-0 text-white">Payouts</h5>
            </div>
            <div id="filters" class="collapse show">
                <div class="card-body">
                    <form action="{{ url('admin/payouts') }}" id="filterForm">
                        @csrf
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
                                <label>Gross Amount</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="min_total" class="form-control" placeholder="Min">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="max_total" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                <label>Admin Charge</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="min_admin_charge" class="form-control" placeholder="Min">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="max_admin_charge" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                <label>TDS</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="min_tds" class="form-control" placeholder="Min">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="max_tds" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                <label>Payable Amount</label>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="min_payable_amount" class="form-control" placeholder="Min">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="max_payable_amount" class="form-control" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ url('admin/payouts') }}" class="btn btn-danger waves-effect waves-light font-weight-bold">
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
        <div class="card">
            <div class="card-box">
                <div class="btnAlign text-center justify-content-center">
                    <form id="payoutform" action="{{ url('admin/payouts')  }}" method="post">
                        @csrf 
                        <button type="button" class="btn btn-danger btn-lg" onclick="payoutConfirmation(this);">
                            <i class="far fa-money-bill-alt mr-2"></i>
                            Generate Payout
                            <i class="far fa-money-bill-alt ml-2"></i>
                        </button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="payoutTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Gross Amount</th>
                            <th>Admin Charge</th>
                            <th>TDS</th>
                            <th>Payable Amount</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right">Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
   
</div>
@endsection
@section('scripts')
<script>
    var dataTable = $('#payoutTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
  serverSide: true,
        ajax: {
            url: "{{ url('admin/payouts') }}",
            data: function (d) {
        $('#filterForm input, #filterForm select').each(function (i, el) {
                var propertyName =$(this).attr('name'); 
                    d[propertyName] = $(this).val();
            });
        }
        },
        "columns": [
            {data: 'DT_RowIndex', width: '5%' ,orderable: false},
            {name: "created_at", data: "created_at"},
            {name: "amount", data: "amount"},
            {name: "admin_charge", data: "admin_charge"},
            {name: "tds", data: "tds"},
            {name: "payable_amount", data: "payable_amount"},
            {name: "status", data: "status"},
            {name: "detail", data: "detail"},
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
            gross = api
                .column( 2, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            charge = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            tds = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            payable = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
               
 
            // Update footer
            $( api.column( 2 ).footer() ).html(gross);
            $( api.column( 3 ).footer() ).html(charge);
            $( api.column( 4 ).footer() ).html(tds);
            $( api.column( 5 ).footer() ).html(payable);
        }
    });

    function payoutConfirmation(el) {
        var $vm = $(el);

        Swal.fire({
            title: 'Are you sure ?',
            text: "Do you really want to generate Payout ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, generate Payout!'
        }).then((result) => {
            if (result.value) {
                payoutConfirmation1();
            }
        });
    }
    function payoutConfirmation1() {
        

        Swal.fire({
            title: 'Are you sure ?',
            text: "Do you really want to generate Payout ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, generate Payout!'
        }).then((result) => {
            if (result.value) {
                payoutConfirmation2();
            }
        });
    }
    function payoutConfirmation2() {

        Swal.fire({
            title: 'Are you sure ?',
            text: "Do you really want to generate Payout ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, generate Payout!'
        }).then((result) => {
            if (result.value) {
                $('#payoutform').submit();
            }
        });
    }

    $('#filterForm').on('submit',function(e){

e.preventDefault();
dataTable.draw();
setTimeout(() => {
    preloaderOff();    
}, 1000);
});
</script>
@endsection