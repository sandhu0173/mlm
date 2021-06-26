@extends('layouts.auth')

@section('content')
<style>
    .invalid-feedback{
        display:block;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">
                            <div class="text-center justify-content-center">
                                <a href="{{ url('/') }}" class="brand-logo text-center">
                                    <img src="{{ asset(Helper::setting('logo')) }}" alt="Logo" title="Logo">
                                </a>
                            </div>
                            <form action="{{ route('register') }}" method="post" >
                               @csrf
                               <div class="form-group">
                               <div class="row mt-3">
                                   <div class="col-6 text-right">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="left" name="side" value="1" class="custom-control-input" @if ($side==1) checked @endif>
                                                <label class="custom-control-label" for="left">Left</label>
                                            </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="right" name="side" value="2" class="custom-control-input" @if ($side==2) checked @endif>
                                            <label class="custom-control-label" for="right">Right</label>
                                        </div>
                                    </div>
                                    @error('side')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="name" class="required">Name</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            </span>
                                            </div>
                                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Name" name="name" value="{{ old('name') }}" autocomplete="off" required="">
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="mobile" class="required">Mobile Number</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>
                                            </span>
                                            </div>
                                            <input id="mobile" class="form-control @error('mobile') is-invalid @enderror" type="text" placeholder="Enter Mobile Number" name="mobile" value="{{ old('mobile') }}" autocomplete="off" required="" maxlength="10" minlength="10">
                                        </div>
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="email" class="required">Email</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            </span>
                                            </div>
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Enter Email ID" name="email" value="{{ old('email') }}" autocomplete="off" required="">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label for="code" class="required">Sponsor Tracking ID</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                                            </span>
                                            </div>
                                            <input id="tracking_id" class="form-control @error('tracking_id') is-invalid @enderror memberCodeInput" type="text" placeholder="Enter Sponsor Tracking ID" name="tracking_id" value="{{ $code }}" autocomplete="off" required="">
                                        </div>
                                        <span class="help-block memberName text-primary font-weight-bold">{{ $sponsor }}</span>
                                        @error('tracking_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="required">Address</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                            </span>
                                        </div>
                                        <input id="address" class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Enter Address" name="address" value="{{ old('address') }}" autocomplete="off" required="">
                                    </div>
                                    @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4 col-12">
                                        <label for="pincode" class="required">Pincode</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                            </span>
                                            </div>
                                            <input id="pincode" class="form-control @error('pincode') is-invalid @enderror" type="text" placeholder="Enter Pincode" name="pincode" value="{{ old('pincode') }}" autocomplete="off" required="">
                                        </div>
                                        @error('pincode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" required="">
                                        <label class="custom-control-label" for="remember-me">
                                            I agree to the
                                            <a href="javascript:void(0);" class="text-primary" data-toggle="modal" data-target=".bs-example-modal-center">Terms &amp; Condition.
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-float waves-light registerButton" @if($sponsor=="") disabled @endif tabindex="2" name="registerButton">
                                    Sign Up
                                </button>
                            </form>

                            <p class="text-center mt-2">
                                <a href="{{ url('/login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    Back to login
                                </a>
                            </p>
                        </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$('#tracking_id').on('change',function(){
    var sid=$(this).val();
    $.ajax({
        url: "{{ url('getsponsor') }}",
        data:{sid:sid},
        method:"GET",
        success:function(response){
            if(response.success==true)
            {
                $('.memberName').text(response.name);
                $('.registerButton').removeAttr('disabled');
            }else{
                $('.registerButton').attr('disabled',true);
            }
            
        }
    })
})
</script>
@endsection