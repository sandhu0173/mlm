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
                                    <i class="fa fa-minus"></i>
                                </a>
                            </div>
                            <h5 class="card-title mb-0 text-white">Invoice</h5>
                        </div>
                    </div>
                    <div class="card p-2">
                        <div class="col-sm-12">
                        <div class="card-datatable table-responsive">
                            <table class="table table-bordered" id="invoiceTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Invoice Id</th>
                                    <th>Order Amount </th>
                                    <th>APV</th>
                                    <th>Payment Mode</th>
                                    <th>Bank</th>
                                    <th>Reference No</th>
                                    <th>Deposit Date</th>
                                    <th>Receipt</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->amount }}</td>
                                        <td>{{ $order->apv }}</td>
                                        <td>{{ $order->mode->name }}</td>
                                        <td>{{ $order->bank->name }}</td>
                                        <td>{{ $order->reference_no }}</td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ asset($order->receipt) }}</td>
                                        <td>{!! $order->status_name !!}</td>
                                        <td><a href="{{ url('admin/order/invoice/'.$order->id) }}" class="btn btn-success btn-sm">View</a></td>
                                    </tr>    
                                    @endforeach
                                    
                                <tbody>
                                
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
