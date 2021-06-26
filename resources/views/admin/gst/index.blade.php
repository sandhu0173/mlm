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
                            <a href="{{ url('admin/gst-type/create') }}" class="btn btn-secondary waves-effect waves-light font-weight-bold">
                                <i class="mdi mdi-plus"></i> Create
                            </a>
                        </div>
                        <a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                            <i class="mdi mdi-minus"></i>
                        </a>
                    </div>

                    <h5 class="card-title mb-0 text-white">GST Master Report </h5>
                </div>
                <div id="filters" class="collapse show">
                    <div class="card-body">
                        <form action="{{ route('gst-type.index') }}" id="filterForm">
                            <div class="row">
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>From Date</label>
                                    <input type="date" name="created_at_from" class="form-control" placeholder="Date">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>To Date</label>
                                    <input type="date" name="created_at_to" class="form-control" placeholder="Date">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>HSN Code</label>
                                    <input type="text" name="hsn_code" class="form-control" placeholder="HSN Code">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>SGST</label>
                                    <input type="text" name="sgst" class="form-control" placeholder="SGST">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>CGST</label>
                                    <input type="text" name="cgst" class="form-control" placeholder="CGST">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>IGST</label>
                                    <input type="text" name="igst" class="form-control" placeholder="IGST">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('gst-type.index') }}" class="btn btn-danger waves-effect waves-light font-weight-bold">
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
                            <table class="table table-hover table-bordered table-striped dataTable no-footer" id="gstTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DATE</th>
                                    <th>HSN Code</th>
                                    <th>SGST</th>
                                    <th>CGST</th>
                                    <th>IGST</th>
                                    <th>ACTION</th>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){

var table= $('#gstTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
  processing: true,
  serverSide: true,
  ajax: {
   url: "{{ route('gst-type.index') }}",
   data: function (d) {
    d.status=$('select[name=status]').val();
    d.created_at_from=$('input[name=created_at_from]').val();
    d.created_at_to=$('select[name=created_at_to]').val();
    d.cgst=$('input[name=cgst]').val();
    d.sgst=$('input[name=sgst]').val();
    d.igst=$('input[name=igst]').val();
    d.hsn_code=$('input[name=hsn_code]').val();
       
    }
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
    data: 'hsn_code',
    name: 'hsn_code'
   },
   {
    data: 'sgst',
    name: 'sgst'
   },
   {
    data: 'cgst',
    name: 'cgst'
   },
   {
    data: 'igst',
    name: 'igst'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });
 $('#filterForm').on('submit',function(e){
     e.preventDefault();
    table.draw();
    setTimeout(() => {
        preloaderOff();    
       }, 1000);
    
 })

});
 </script>
@endsection