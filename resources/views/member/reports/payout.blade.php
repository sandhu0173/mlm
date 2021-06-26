@extends('layouts.main')
@section('content')
@include('member.inc.sidebar')
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
                            <h5 class="card-title mb-0 text-white">
                                Payout
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-box">
                
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped" id="payoutMemberTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Member Id</th>
                            <th>Member Name</th>
                            <th>Binary Income</th>
                            <th>Self Repurchase</th>
                            <th>Team Repurchase</th>
                            <th>Gross Amount</th>
                            <th>Admin Charge</th>
                            <th>TDS</th>
                            <th>Payable Amount</th>
                            <th>Paid Status</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-right">Total</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
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
    var dataTable = $('#payoutMemberTable').DataTable({
            ajax: {
                url: "{{ url('member/reports/') }}",
            },
            "columns": [
                {data: 'DT_RowIndex', width: '5%'},
                {name: "created_at", data: "created_at"},
                {name: "mid", data: "mid"},
                {name: "name", data: "name"},
                {name: "binary_income", data: "binary_income"},
                {name: "self_repurchase", data: "self_repurchase"},
                {name: "team_repurchase", data: "team_repurchase"},
                {name: "amount", data: "amount"},
                {name: "admin_charge", data: "admin_charge"},
                {name: "tds", data: "tds"},
                {name: "payable_amount", data: "payable_amount"},
                {name: "paid_status", data: "paid_status"},
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
                binary = api
                    .column( 4, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                
                self = api
                    .column( 5, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                team = api
                    .column( 6, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                gross = api
                    .column( 7, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                charge = api
                    .column( 8, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                tds = api
                    .column( 9, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                payable = api
                    .column( 10, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
            
                
    
                // Update footer
                $( api.column( 4 ).footer() ).html(binary);
                $( api.column( 5 ).footer() ).html(self);
                $( api.column( 6 ).footer() ).html(team);
                $( api.column( 7 ).footer() ).html(gross);
                $( api.column( 8 ).footer() ).html(charge);
                $( api.column( 9 ).footer() ).html(tds);
                $( api.column( 10 ).footer() ).html(payable);
            }
        });
</script>
@endsection