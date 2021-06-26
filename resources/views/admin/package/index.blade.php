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
                        <div class="btn-group btn-group-md" role="group">
                            <a href="{{ url('admin/packages/create') }}" class="btn btn-secondary waves-effect waves-light font-weight-bold">
                                <i class="mdi mdi-plus"></i> Create
                            </a>
                        </div>
                        <a data-toggle="collapse" href="#cardCollpase8" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                    </div>
                    <h5 class="card-title mb-0 text-white">Packages</h5>
                </div>
        <div class="col-12">
            <div class="card-box">
                <form action="{{ url('admin/categories/status-update') }}" method="post">
                    @csrf
                    <div class="row">
                        
                    <div class="table-responsive">
                        <div id="categoryTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table table-hover table-bordered table-striped dataTable no-footer" id="packageTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DATE</th>
                                    <th>NAME</th>
                                    <th>AMOUNT</th>
                                    <th>AP</th>
                                    <th>APV</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            <thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" style="text-align:right">Total:</th>
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
        </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
var table= $('#packageTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
  processing: true,
  serverSide: true,
  ajax: {
   url: "{{ route('packages.index') }}",
  },
  columns: [
    {
    data: 'DT_RowIndex',
    name: 'DT_RowIndex',
    orderable: false
   },
   {
    data: 'created_at',
    name: 'created_at'
   },
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'amount',
    name: 'amount'
   },
   {
    data: 'dp',
    name: 'dp'
   },
   {
    data: 'apv',
    name: 'apv'
   },
   {
    data: 'status',
    name: 'status'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
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
            totalmrp = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            totalap = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            totalapv = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
           
               
 
            // Update footer
            $( api.column( 3 ).footer() ).html(totalmrp);
            $( api.column( 4 ).footer() ).html(totalap);
            $( api.column( 5 ).footer() ).html(totalapv);
        }
 });
 

});
 </script>
@endsection