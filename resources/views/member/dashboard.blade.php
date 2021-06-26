@extends('layouts.main')
@section('content')
@include('member.inc.sidebar')
<div class="content-page">
        <div class="content">
            <div class="container-fluid">
<div class="content-wrapper">
            <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('member') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        @if(Helper::setting('message'))
        <p class="alert alert-success">{{ Helper::setting('message') }}</p>
        @endif
        <section class="app-user-view">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card user-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6  d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <img class="img-fluid rounded" src="https://d3oormgpearxmk.cloudfront.net/f0f657fd-c979-4e74-9ed6-dd5a95b960bf/images/user.png" alt="User avatar">
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0">{{Auth::user()->name}}</h4>
                                                    <span class="card-text"><button class="btn btn-link p-0 waves-effect waves-float waves-light" type="button" data-clipboard-text="30001236" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">
                                                    {{Auth::user()->member_id}}
    </button>
</span>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <a href="{{ url('member/profile') }}" class="btn btn-primary waves-effect waves-float waves-light">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center user-total-numbers">
                                    @if($user->package)
                                        <div class="d-flex align-items-center mr-2">
                                            <div class="color-box bg-light-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package text-primary"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                            </div>
                                                 <div class="ml-1">
                                                    <h5 class="mb-0">{{$user->package->name }}</h5>
                                                    <small>{{ $user->package->apv}} PV</small>
                                                </div>
                                        </div>
                                        @endif
                                        <div class="d-flex align-items-center">
                                        @if($user->kyc_status=='2')
                                            <div class="color-box bg-light-success">
                                                    <i class="text-success uil uil-check"></i>
                                                </div>
                                                @endif
                                                <div class="ml-1">
                                                    <h5 class="mb-0">KYC</h5>
                                                    @if($user->kyc_status=='1')
                                                        <small>Pending</small>    
                                                    @elseif($user->kyc_status=='2')
                                                        <small>Approved</small>    
                                                    @elseif($user->kyc_status=='3')
                                                        <small>Rejected</small>    
                                                    @else
                                                        <small>Not Applied</small>    
                                                    @endif
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6  mt-2 mt-xl-0">
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td class="custom-width">
                                                <i class="uil uil-mobile-android"></i>
                                                <span class="font-weight-bold">Mobile</span>
                                            </td>
                                            <td class="text-truncate custom-width">{{Auth::user()->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <td class="custom-width">
                                                <i class="uil uil-envelope-minus"></i>
                                                <span class="font-weight-bold">Email</span>
                                            </td>
                                            <td class="text-truncate custom-width">{{Auth::user()->email}}</td>
                                        </tr>
                                        <tr>
                                            <td class="custom-width">
                                                <i class="uil uil-check-circle"></i>
                                                <span class="font-weight-bold">Status</span>
                                            </td>
                                            <td class="text-truncate custom-width">
                                            @if($user->status=='0')
                                            Blocked
                                            @else
                                             Active
                                             @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="custom-width">
                                                <i class="uil uil-calendar-alt"></i>
                                                <span class="font-weight-bold">Registration Date</span>
                                            </td>
                                            <td class="text-truncate custom-width">
                                            {{date('d M Y',strtotime(Auth::user()->created_at))}}
                                            </td>
                                        </tr>
                                        @if($user->activate_at)
                                        <tr>
                                            <td class="custom-width">
                                                <i class="uil uil-calendar-alt"></i>
                                                <span class="font-weight-bold">Activation Date</span>
                                            </td>
                                            <td class="text-truncate custom-width">
                                             {{date('d M Y',strtotime($user->activate_at))}}
                                            </td>
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="profile-info">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        
                        <div class="col-xl-4 col-sm-6">
                            <a href="{{ url('member/wallet-transactions') }}">
                                <div class="widget-stat card bg-warning">
                                    <div class="card-body p-2">
                                        <div class="media">
                                            <span class="mr-3">
                                                <i class="uil uil-rupee-sign"></i>
                                            </span>
                                            <div class="media-body text-white text-right">
                                                <p class="mb-1">Total Earning</p>
                                                <h3 class="text-white">{{ $total }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                        
                                    </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="form-section text-capitalize">
                                <i class="fe-credit-card"></i> Referral Link
                            </h4>
                            <p class="sub-header mb-2"> You can share registration details</p>
                            <div class="input-group">
                                <input type="text" class="form-control font-weight-600 text-primary" value="{{ url('register?code='.$user->member_id) }}" readonly="">
                                <div class="input-group-append">
                                    <button class="btn btn-primary waves-effect waves-light" type="button" data-clipboard-text="{{ url('register?code='.$user->member_id) }}" data-original-title="Click to Copy">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="social">
                                <span class="title">Share This Link:</span>
                                <div id="social-links"><ul><li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('register?code='.$user->member_id) }}" class="social-button social-link" id="" title="Referral Link"><span class="fab fa-facebook-square"></span></a></li><li><a target="_blank" href="https://wa.me/?text={{ url('member/register?code='.$user->member_id) }}" class="social-button social-link" id="" title="Referral Link"><span class="fab fa-whatsapp"></span></a></li></ul></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            </div>
             
@endsection
@section('scripts')

@endsection