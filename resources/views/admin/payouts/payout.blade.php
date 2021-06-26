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
                            <th>Paid Amount</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>IFSC</th>
                            <th>Bank Name</th>
                            <th>Branch</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{  $detail->created_at }}</td>
                            <td>{{  $detail->paid_amount }}</td>
                            <td>{{  $detail->account_name }}</td>
                            <td>{{  $detail->account_number }}</td>
                            <td>{{  $detail->bank_ifsc }}</td>
                            <td>{{  $detail->bank_name }}</td>
                            <td>{{  $detail->bank_branch }}</td>
                        </tr>    
                    </tbody>
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

@endsection