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
                            <a href="{{ url('admin/categories/create') }}" class="btn btn-secondary waves-effect waves-light font-weight-bold">
                                <i class="mdi mdi-plus"></i> Create
                            </a>
                        </div>
                        <a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                            <i class="mdi mdi-minus"></i>
                        </a>
                    </div>

                    <h5 class="card-title mb-0 text-white">Category </h5>
                </div>
                <div id="filters" class="collapse show">
                    <div class="card-body">
                        <form action="{{ url('/categories') }}" id="filterForm">
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
                                    <label>Parent Name</label>
                                    <input type="text" name="parent.name" class="form-control" placeholder="Parent Name">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Category Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category Name">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1"> Active</option>
                                        <option value="0"> In-Active</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ url('/admin/categories') }}" class="btn btn-danger waves-effect waves-light font-weight-bold">
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
                <form action="{{ url('admin/categories/status-update') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-3">
                            <label>Status</label>
                            <select name="changeStatus" class="form-control select2" >
                                <option value="" data-select2-id="3">Select Status</option>
                                <option value="1"> Active</option>
                                <option value="0"> In-Active</option>
                            </select>

                        </div>
                        <div class="form-group col-4">
                            <label for="">&nbsp;</label><br>
                            <button type="submit" class="btn btn-primary waves-effect waves-light" disabled="" data-toggle="modal" data-target="#large-modal" id="disableButton" style="cursor: not-allowed;">
                                Submit
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="categoryTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <table class="table table-hover table-bordered table-striped dataTable no-footer" id="categoryTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DATE</th>
                                    <th>PARENT NAME</th>
                                    <th>CATEGORY NAME</th>
                                    <th>STATUS</th>
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

var table= $('#categoryTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
  processing: true,
  serverSide: true,
  ajax: {
   url: "{{ route('categories.index') }}",
   data: function (d) {
    d.status=$('select[name=status]').val();
    d.created_at_from=$('input[name=created_at_from]').val();
    d.created_at_to=$('select[name=created_at_to]').val();
    d.name=$('input[name=name]').val();
       
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
    data: 'parent',
    name: 'parent'
   },
   {
    data: 'name',
    name: 'name'
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