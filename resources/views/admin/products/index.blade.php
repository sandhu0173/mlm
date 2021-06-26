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
                            <a href="{{ url('admin/products/create') }}" class="btn btn-secondary waves-effect waves-light font-weight-bold">
                                <i class="mdi mdi-plus"></i> Create
                            </a>
                        </div>
                        <a data-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                            <i class="mdi mdi-minus"></i>
                        </a>
                    </div>

                    <h5 class="card-title mb-0 text-white">Products </h5>
                </div>
                <div id="filters" class="collapse show">
                    <div class="card-body">
                        <form action="{{ route('products.index') }}" id="filterForm">
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
                                    <label>Category Name</label>
                                    <input type="text" name="category" class="form-control" placeholder="Category Name">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Product Code</label>
                                    <input type="text" name="sku" class="form-control" placeholder="Product Code">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>MRP</label>
                                    <input type="text" name="price" class="form-control" placeholder="MRP">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>AP</label>
                                    <input type="text" name="dp" class="form-control" placeholder="AP">
                                </div>
                                
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>APV</label>
                                    <input type="text" name="apv" class="form-control" placeholder="APV">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Company Stock</label>
                                    <input type="text" name="stock" class="form-control" placeholder="Company Stock">
                                </div>
                                <div class="form-group col-sm-6 col-md-3 col-lg-2">
                                    <label>Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1"> Active</option>
                                        <option value="0"> In-Active</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('products.index') }}" class="btn btn-danger waves-effect waves-light font-weight-bold">
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
                            <table class="table table-hover table-bordered table-striped dataTable no-footer" id="productTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DATE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                    <th>CATEGORY NAME</th>
                                    <th>IMAGE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT CODE</th>
                                    <th>MRP</th>
                                    <th>AP</th>
                                    <th>APV</th>
                                    <th>STOCK</th>
                                    
                                </tr>
                            <thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="8" style="text-align:right">Total:</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
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

var table= $('#productTable').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
  processing: true,
  serverSide: true,
  ajax: {
   url: "{{ route('products.index') }}",
   data: function (d) {
    d.status=$('select[name=status]').val();
    d.created_at_from=$('input[name=created_at_from]').val();
    d.created_at_to=$('select[name=created_at_to]').val();
    d.name=$('input[name=name]').val();
    d.category=$('input[name=category]').val();
    d.price=$('input[name=price]').val();
    d.sku=$('input[name=sku]').val();
    d.bv=$('input[name=bv]').val();
    d.stock=$('input[name=stock]').val();
    d.apv=$('input[name=apv]').val();
       
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
    data: 'status',
    name: 'status',
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   },
   {
    data: 'cat_name',
    name: 'cat_name'
   },
   {
    data: 'img',
    name: 'img'
   },
   {
    data: 'name',
    name: 'name'
   },
   {
    data: 'sku',
    name: 'sku'
   },
   {
    data: 'price',
    name: 'price'
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
    data: 'stock',
    name: 'stock'
   },
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
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            totalap = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            totalapv = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
            totalstock = api
                .column( 11, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
               
 
            // Update footer
            $( api.column( 8 ).footer() ).html(totalmrp);
            $( api.column( 9 ).footer() ).html(totalap);
            $( api.column( 10 ).footer() ).html(totalapv);
            $( api.column( 11 ).footer() ).html(totalstock);
        }
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