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
                                Pay Form
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-box">
                <div class="col-6">
                    <form action="{{ url('admin/payouts/member/pay/store/'.$id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                             <label>Payable Amount</label>
                             <input type="text" name="payable_amount" value="{{ $payment->payable_amount }}" class="form-control">
                             <input type="hidden" name="member_id" value="{{ $payment->member_id }}" class="form-control">
                             <input type="hidden" name="payout_id" value="{{ $payment->payout_id }}" class="form-control">
                             <input type="hidden" name="member_payout_id" value="{{ $payment->id }}" class="form-control">

                        </div>
                        <div class="form-group">
                            <label>Member id</label>
                           <input type="text"  value="{{ $user->member_id }}" class="form-control">
                       </div>
                       <div class="form-group">
                          <label>Member Name</label>
                             <input type="text" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Account Name</label>
                               <input type="text" name="account_name" value="{{ $kyc->account_name ?? 'N/A' }} " class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Account Number</label>
                               <input type="text" name="account_number" value="{{ $kyc->account_number ?? 'N/A' }}" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Bank IFSC</label>
                               <input type="text" name="bank_ifsc" value="{{ $kyc->bank_ifsc ?? 'N/A' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bank Name</label>
                               <input type="text" name="bank_name" value="{{ $kyc->bank_name ?? 'N/A' }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Bank Branch</label>
                               <input type="text" name="bank_branch" value="{{ $kyc->bank_branch ?? 'N/A'}}" class="form-control">
                        </div>
                         
                        <div class="form-group">
                            <button class="btn btn-success">Pay</button>
                          </div>



                    </form>
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