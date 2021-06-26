@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
<div class="col-12">
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{  url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Genealogy Tree</li>
            </ol>
        </div>
        <h4 class="page-title">Genealogy Tree</h4>
    </div>
</div>
</div>
<form action="{{ url('admin/genealogy/search') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-12">
        <div class="row mb-4 d-flex justify-content-center">
            <div class="col-sm-4 col-12">
                <div class="form-group mb-2">
                    <label for="inputPassword2" class="sr-only">Search</label>
                    <div class="input-group">
                        <input type="text" id="code" name="code" value="" class="form-control" placeholder="Search By Member ID">
                        <div class="input-group-append">
                            <button class="btn btn-dark waves-effect waves-light" type="button" onclick="goToMember()">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5 d-flex justify-content-center text-center tree">
            <div class="col-lg-3 col-3">
                <img src="{{ asset('img/free-id.svg') }}" class="">
                <p>Free</p>
            </div>
            <div class="col-lg-3 col-3">
                <img src="{{ asset('img/incomplete-kyc.svg') }}" class="">
                <p>Incomplete KYC</p>
            </div>
            <div class="col-lg-3 col-3">
                <img src="{{ asset('img/active.svg') }}" class="">
                <p>Active</p>
            </div>
            <div class="col-lg-3 col-3">
                <img src="{{ asset('img/block.svg') }}" class="">
                <p>Block</p>
            </div>
        </div>
        <div class="row miniReports">
            <div class="col-md-3 col-6">
                <h6 class="text-blue font-weight-600">DIRECT LEFT : {{ Helper::directleft($user) }}</h6>
                <h6 class="text-dark font-weight-600">TOTAL LEFT : {{ Helper::countleftmember($user) }}</h6>
            </div>
            <div class="offset-md-6 col-md-3 col-6 text-right">
                <h6 class="text-blue font-weight-600">DIRECT RIGHT : {{ Helper::directright($user) }}</h6>
                <h6 class="text-dark font-weight-600">TOTAL RIGHT : {{ Helper::countrightmember($user) }}</h6>
            </div>
        </div>
        <section class="management-hierarchy">
            <div class="hv-container">
                <div class="hv-wrapper">
                    <div class="hv-item-child">
                <div class="hv-item">
                            <div class="hv-item-parent">
                                <div class="person">
                                    <?php
                                    $parent=Helper::user($user);
                                    ?>
                                    <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $parent->member_id }}" data-content="<div class='row'>
                                        <div class='col-6'>
                                        <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                                        <p class='mb-1'> {{ $parent->created_at }}</p>
                                        </div>
                                        <div class='col-6'>
                                        <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                                        <p class='mb-1'>{{ $parent->active_at }}</p>
                                        </div>
                                        <div class='col-6'>
                                        <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                                        <p class='mb-1'>
                                            @if(Helper::is_admin($user)!=1)
                                            @if($parent->package_id!=0)
                                            
                                            {{ Helper::orderDetail($parent->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($parent->package_id)->amount }})
                                            @else
                                            'N/A'
                                            @endif
                                            @endif
                                        </p>
                                        </div>
                                        <div class='col-6'>
                                        <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                                        <p class='mb-0'> {{ Helper::countleftmember($user) }} / {{ Helper::countrightmember($user) }}</p>
                                        </div>
                                        
                                        
                                        </div>">
                                        <a href="{{ url('admin/genealogy/show/'.$parent->member_id) }}">
                                            <img src="{{ asset('img/blank.svg') }}" alt="{{ $parent->member_id }}" style="background-color:
                                            @if($parent->status=='2') #38ba4b; @endif
                                            @if($parent->status=='0') #000; @endif
                                            @if($parent->status=='1') #f50114; @endif
                                            ">
                                        </a>
                                    </div>
                                    <p class="name">
                                        {{ $parent->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $parent->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $parent->member_id }}</button>)
                                    </p>
                                </div>
                            </div>
<!--end parent block-->
                            <div class="hv-item-children">
                                <div class="hv-item-child">
                            <div class="hv-item">
                                <div class="hv-item-parent">
                                    <div class="person">
                                        @if(Helper::getleft($user))
                                        <?php
                                        //get first left member
                                        $lmemberid=Helper::getleft($user)->member_id;
                                        $lmember=Helper::user($lmemberid);
                                        ?>

                        <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $lmember->member_id }}" data-content="<div class='row'>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                            <p class='mb-1'> {{ $lmember->created_at }}</p>
                            </div>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                            <p class='mb-1'>{{ $lmember->active_at }}</p>
                            </div>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                            <p class='mb-1'>
                                @if($lmember->package_id!=0)
                                
                                {{ Helper::orderDetail($lmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($lmember->package_id)->amount }})
                                @else
                                'N/A'
                                @endif
                            </p>
                            </div>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                            <p class='mb-0'> {{ Helper::countleftmember($lmemberid) }} / {{ Helper::countrightmember($lmemberid) }}</p>
                            </div>
                            
                            
                            </div>">
                            <a href="{{ url('admin/genealogy/show/'.$lmember->member_id) }}">
                                <img src="{{ asset('img/blank.svg') }}" alt="{{ $lmember->member_id }}" style="background-color:
                                @if($lmember->status=='2') #38ba4b; @endif
                                @if($lmember->status=='0') #000; @endif
                                @if($lmember->status=='1') #f50114; @endif
                                ">
                            </a>
                        </div>
                        <p class="name">
                            {{ $lmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $lmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $lmember->member_id }}</button>)
                        </p>
                    @else
                        <a href="{{  url('register?code='.$parent->member_id.'&side=1') }}" target="&quot;_blank&quot;">
                        <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                        Empty
                    </p>
                    @endif

            </div>
        </div>
<!--end first left member-->

    <div class="hv-item-children">
        <div class="hv-item-child">
    <div class="hv-item">
        <div class="hv-item-parent">
           <div class="person">
            @if (isset($lmember))
            @if(Helper::getleft($lmember->id))
            <?php

            $llmemberid=Helper::getleft($lmember->id)->member_id;
            $llmember=Helper::user($llmemberid);
            ?>

            <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $llmember->member_id }}" data-content="<div class='row'>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
            <p class='mb-1'> {{ $llmember->created_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
            <p class='mb-1'>{{ $llmember->active_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
            <p class='mb-1'>
                @if($llmember->package_id!=0)
                
                {{ Helper::orderDetail($llmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($llmember->package_id)->amount }})
                @else
                'N/A'
                @endif
            </p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
            <p class='mb-0'> {{ Helper::countleftmember($llmemberid) }} / {{ Helper::countrightmember($llmemberid) }}</p>
            </div>


            </div>">
            <a href="{{ url('admin/genealogy/show/'.$llmember->member_id) }}">
                <img src="{{ asset('img/blank.svg') }}" alt="{{ $llmember->member_id }}" style="background-color:
                @if($llmember->status=='2') #38ba4b; @endif
                @if($llmember->status=='0') #000; @endif
                @if($llmember->status=='1') #f50114; @endif
                ">
            </a>
            </div>
            <p class="name">
            {{ $llmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $llmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $llmember->member_id }}</button>)
            </p>
            @else
            <a href="{{  url('register?code='.$lmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
            <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
            </a>
            <p class="name">
            Empty
            </p>
            @endif
            @else
            <a href="javascript:void(0)" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>     
            @endif
            </div>
    </div>
    <!--End left's left block---->
    <div class="hv-item-children">
        <div class="hv-item-child">
            <div class="person">
                @if (isset($llmember))
               
            @if(Helper::getleft($llmember->id))
            <?php
            $lllmemberid=Helper::getleft($llmember->id)->member_id;
            $lllmember=Helper::user($lllmemberid);
            ?>

            <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $lllmember->member_id }}" data-content="<div class='row'>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
            <p class='mb-1'> {{ $lllmember->created_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
            <p class='mb-1'>{{ $lllmember->active_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
            <p class='mb-1'>
                @if($lllmember->package_id!=0)
               
                {{ Helper::orderDetail($lllmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($lllmember->package_id)->amount }})
                @else
                'N/A'
                @endif
            </p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
            <p class='mb-0'> {{ Helper::countleftmember($lllmemberid) }} / {{ Helper::countrightmember($lllmemberid) }}</p>
            </div>


            </div>">
            <a href="{{ url('admin/genealogy/show/'.$lllmember->member_id) }}">
                <img src="{{ asset('img/blank.svg') }}" alt="{{ $lllmember->member_id }}" style="background-color:
                @if($lllmember->status=='2') #38ba4b; @endif
                @if($lllmember->status=='0') #000; @endif
                @if($lllmember->status=='1') #f50114; @endif
                ">
            </a>
            </div>
            <p class="name">
            {{ $lllmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $lllmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $lllmember->member_id }}</button>)
            </p>
            @else
            <a href="{{  url('register?code='.$llmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
            <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
            </a>
            <p class="name">
            Empty
            </p>
            @endif
            @else
            <a href="javascript:void(0)" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>     
            @endif
            </div>
        </div>
        <!--End left's left's left block-->
        <div class="hv-item-child">
            <div class="person">
                @if (isset($llmember))
               
            @if(Helper::getright($llmember->id))
            <?php
            //left left right member
            $llrmemberid=Helper::getright($llmember->id)->member_id;
            $llrmember=Helper::user($llrmemberid);
            ?>

            <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $llrmember->member_id }}" data-content="<div class='row'>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
            <p class='mb-1'> {{ $llrmember->created_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
            <p class='mb-1'>{{ $llrmember->active_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
            <p class='mb-1'>
                @if($llrmember->package_id!=0)
                
                {{ Helper::orderDetail($llrmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($llrmember->package_id)->amount }})
                @else
                'N/A'
                @endif
            </p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
            <p class='mb-0'> {{ Helper::countleftmember($llrmemberid) }} / {{ Helper::countrightmember($llrmemberid) }}</p>
            </div>


            </div>">
            <a href="{{ url('admin/genealogy/show/'.$llrmember->member_id) }}">
                <img src="{{ asset('img/blank.svg') }}" alt="{{ $llrmember->member_id }}" style="background-color:
                @if($llrmember->status=='2') #38ba4b; @endif
                @if($llrmember->status=='0') #000; @endif
                @if($llrmember->status=='1') #f50114; @endif
                ">
            </a>
            </div>
            <p class="name">
            {{ $llrmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $llrmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $llrmember->member_id }}</button>)
            </p>
            @else
            <a href="{{  url('register?code='.$llmember->member_id.'&side=2') }}" target="&quot;_blank&quot;">
            <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
            </a>
            <p class="name">
            Empty
            </p>
            @endif
            @else
            <a href="javascript:void(0)" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>     
            @endif
            </div>
        </div>
        </div>
        <!--End left left right end-->
    </div>
</div>
<div class="hv-item-child">
    <div class="hv-item">
        <div class="hv-item-parent">
            <div class="person">
                @if (isset($lmember))
               
            @if(Helper::getright($lmember->id))
            <?php
            $lrmemberid=Helper::getright($lmember->id)->member_id;
            $lrmember=Helper::user($lrmemberid);
            ?>

            <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $lrmember->member_id }}" data-content="<div class='row'>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
            <p class='mb-1'> {{ $lrmember->created_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
            <p class='mb-1'>{{ $lrmember->active_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
            <p class='mb-1'>
                @if($lrmember->package_id!=0)
              
                {{ Helper::orderDetail($lrmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($lrmember->package_id)->amount }})
                @else
                'N/A'
                @endif
            </p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
            <p class='mb-0'> {{ Helper::countleftmember($lrmemberid) }} / {{ Helper::countrightmember($lrmemberid) }}</p>
            </div>


            </div>">
            <a href="{{ url('admin/genealogy/show/'.$lrmember->member_id) }}">
                <img src="{{ asset('img/blank.svg') }}" alt="{{ $lrmember->member_id }}" style="background-color:
                @if($lrmember->status=='2') #38ba4b; @endif
                @if($lrmember->status=='0') #000; @endif
                @if($lrmember->status=='1') #f50114; @endif
                ">
            </a>
            </div>
            <p class="name">
            {{ $lrmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $lrmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $lrmember->member_id }}</button>)
            </p>
            @else
            <a href="{{  url('register?code='.$lmember->member_id.'&side=2') }}" target="&quot;_blank&quot;">
            <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
            </a>
            <p class="name">
            Empty
            </p>
            @endif
            @else
            <a href="javascript:void(0)" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>     
            @endif
            </div>
        </div>
        <!--enf left right-->
    <div class="hv-item-children">
        <div class="hv-item-child">
            <div class="person">
                @if (isset($lrmember))
               
            @if(Helper::getleft($lrmember->id))
            <?php
            $lrlmemberid=Helper::getleft($lrmember->id)->member_id;
            $lrlmember=Helper::user($lrlmemberid);
            ?>

            <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $lrlmember->member_id }}" data-content="<div class='row'>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
            <p class='mb-1'> {{ $lrlmember->created_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
            <p class='mb-1'>{{ $lrlmember->active_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
            <p class='mb-1'>
                @if($lrlmember->package_id!=0)
                
                {{ Helper::orderDetail($lrlmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($lrlmember->package_id)->amount }})
                @else
                'N/A'
                @endif
            </p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
            <p class='mb-0'> {{ Helper::countleftmember($lrlmemberid) }} / {{ Helper::countrightmember($lrlmemberid) }}</p>
            </div>


            </div>">
            <a href="{{ url('admin/genealogy/show/'.$lrlmember->member_id) }}">
                <img src="{{ asset('img/blank.svg') }}" alt="{{ $lrlmember->member_id }}" style="background-color:
                @if($lrlmember->status=='2') #38ba4b; @endif
                @if($lrlmember->status=='0') #000; @endif
                @if($lrlmember->status=='1') #f50114; @endif
                ">
            </a>
            </div>
            <p class="name">
            {{ $lrlmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $lrlmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $lrlmember->member_id }}</button>)
            </p>
            @else
            <a href="{{  url('register?code='.$lrmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
            <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
            </a>
            <p class="name">
            Empty
            </p>
            @endif
            @else
            <a href="javascript:void(0)" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>     
            @endif
            </div>
        </div>
        <!--End left right left-->
        <div class="hv-item-child">
            <div class="person">
            @if (isset($lrmember))
            @if(Helper::getright($lrmember->id))
            <?php
            $llrmemberid=Helper::getright($lrmember->id)->member_id;
            $llrmember=Helper::user($llrmemberid);
            ?>

            <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $llrmember->member_id }}" data-content="<div class='row'>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
            <p class='mb-1'> {{ $llrmember->created_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
            <p class='mb-1'>{{ $llrmember->active_at }}</p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
            <p class='mb-1'>
                @if($llrmember->package_id!=0)
                
                {{ Helper::orderDetail($llrmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($llrmember->package_id)->amount }})
                @else
                'N/A'
                @endif
            </p>
            </div>
            <div class='col-6'>
            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
            <p class='mb-0'> {{ Helper::countleftmember($llrmemberid) }} / {{ Helper::countrightmember($llrmemberid) }}</p>
            </div>


            </div>">
            <a href="{{ url('admin/genealogy/show/'.$llrmember->member_id) }}">
                <img src="{{ asset('img/blank.svg') }}" alt="{{ $llrmember->member_id }}" style="background-color:
                @if($llrmember->status=='2') #38ba4b; @endif
                @if($llrmember->status=='0') #000; @endif
                @if($llrmember->status=='1') #f50114; @endif
                ">
            </a>
            </div>
            <p class="name">
            {{ $llrmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $llrmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $llrmember->member_id }}</button>)
            </p>
            @else
            <a href="{{  url('register?code='.$lrmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
            <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
            </a>
            <p class="name">
            Empty
            </p>
            @endif
            @else
            <a href="javascript:void(0)" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>     
            @endif
            </div>
        </div>
        <!--end left right right--->
    </div>
</div>
</div>
    </div>
</div>
</div>
        <div class="hv-item-child">
    <div class="hv-item">
        <div class="hv-item-parent">
            <div class="person">
                @if(Helper::getright($user))
                <?php
                //get first right member
                $rmemberid=Helper::getright($user)->member_id;
                $rmember=Helper::user($rmemberid);
                ?>

                        <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rmember->member_id }}" data-content="<div class='row'>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                            <p class='mb-1'> {{ $rmember->created_at }}</p>
                            </div>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                            <p class='mb-1'>{{ $rmember->active_at }}</p>
                            </div>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                            <p class='mb-1'>
                                @if($rmember->package_id!=0)
                                
                                {{ Helper::orderDetail($rmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rmember->package_id)->amount }})
                                @else
                                'N/A'
                                @endif
                            </p>
                            </div>
                            <div class='col-6'>
                            <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                            <p class='mb-0'> {{ Helper::countleftmember($rmemberid) }} / {{ Helper::countrightmember($rmemberid) }}</p>
                            </div>
                            
                            
                            </div>">
                            <a href="{{ url('admin/genealogy/show/'.$rmember->member_id) }}">
                                <img src="{{ asset('img/blank.svg') }}" alt="{{ $rmember->member_id }}" style="background-color:
                                @if($rmember->status=='2') #38ba4b; @endif
                                @if($rmember->status=='0') #000; @endif
                                @if($rmember->status=='1') #f50114; @endif
                                ">
                            </a>
                        </div>
                        <p class="name">
                            {{ $rmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rmember->member_id }}</button>)
                        </p>
                    @else
                        <a href="{{  url('register?code='.$parent->member_id.'&side=2') }}" target="&quot;_blank&quot;">
                        <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                        Empty
                    </p>
                    @endif
            </div>
        </div>
        <!--End right child block-->
        <div class="hv-item-children">
            <div class="hv-item-child">
        <div class="hv-item">
            <div class="hv-item-parent">
               <div class="person">
                @if (isset($rmember))
                   
                @if(Helper::getleft($rmember->id))
                <?php
                $rlmemberid=Helper::getleft($rmember->id)->member_id;
                $rlmember=Helper::user($rlmemberid);
                ?>
    
                <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rlmember->member_id }}" data-content="<div class='row'>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                <p class='mb-1'> {{ $rlmember->created_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                <p class='mb-1'>{{ $rlmember->active_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                <p class='mb-1'>
                    @if($rlmember->package_id!=0)
                    
                    {{ Helper::orderDetail($rlmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rlmember->package_id)->amount }})
                    @else
                    'N/A'
                    @endif
                </p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                <p class='mb-0'> {{ Helper::countleftmember($rlmemberid) }} / {{ Helper::countrightmember($rlmemberid) }}</p>
                </div>
    
    
                </div>">
                <a href="{{ url('admin/genealogy/show/'.$rlmember->member_id) }}">
                    <img src="{{ asset('img/blank.svg') }}" alt="{{ $rlmember->member_id }}" style="background-color:
                    @if($rlmember->status=='2') #38ba4b; @endif
                    @if($rlmember->status=='0') #000; @endif
                    @if($rlmember->status=='1') #f50114; @endif
                    ">
                </a>
                </div>
                <p class="name">
                {{ $rlmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rlmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rlmember->member_id }}</button>)
                </p>
                @else
                <a href="{{  url('register?code='.$rmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>
                @endif
                @else
                <a href="javascript:void(0)" target="&quot;_blank&quot;">
                    <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                    Empty
                    </p>     
                @endif
                </div>
        </div>
        <!--End right's left block---->
        <div class="hv-item-children">
            <div class="hv-item-child">
                <div class="person">
                    @if (isset($rlmember))
                   
                @if(Helper::getleft($rlmember->id))
                <?php
                $rllmemberid=Helper::getleft($rlmember->id)->member_id;
                $rllmember=Helper::user($rllmemberid);
                ?>
    
                <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rllmember->member_id }}" data-content="<div class='row'>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                <p class='mb-1'> {{ $rllmember->created_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                <p class='mb-1'>{{ $rllmember->active_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                <p class='mb-1'>
                    @if($rllmember->package_id!=0)
                    
                    {{ Helper::orderDetail($rllmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rllmember->package_id)->amount }})
                    @else
                    'N/A'
                    @endif
                </p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                <p class='mb-0'> {{ Helper::countleftmember($rllmemberid) }} / {{ Helper::countrightmember($rllmemberid) }}</p>
                </div>
    
    
                </div>">
                <a href="{{ url('admin/genealogy/show/'.$rllmember->member_id) }}">
                    <img src="{{ asset('img/blank.svg') }}" alt="{{ $rllmember->member_id }}" style="background-color:
                    @if($rllmember->status=='2') #38ba4b; @endif
                    @if($rllmember->status=='0') #000; @endif
                    @if($rllmember->status=='1') #f50114; @endif
                    ">
                </a>
                </div>
                <p class="name">
                {{ $rllmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rllmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rllmember->member_id }}</button>)
                </p>
                @else
                <a href="{{  url('register?code='.$rlmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>
                @endif
                @else
                <a href="javascript:void(0)" target="&quot;_blank&quot;">
                    <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                    Empty
                    </p>     
                @endif
                </div>
            </div>
            <!--End right's left's left block-->
            <div class="hv-item-child">
                <div class="person">
                    @if (isset($rlmember))
                   
                @if(Helper::getright($rlmember->id))
                <?php
                //right left right member
                $rlrmemberid=Helper::getright($rlmember->id)->member_id;
                $rlrmember=Helper::user($rlrmemberid);
                ?>
    
                <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rlrmember->member_id }}" data-content="<div class='row'>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                <p class='mb-1'> {{ $rlrmember->created_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                <p class='mb-1'>{{ $rlrmember->active_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                <p class='mb-1'>
                    @if($rlrmember->package_id!=0)
                    
                    {{ Helper::orderDetail($rlrmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rlrmember->package_id)->amount }})
                    @else
                    'N/A'
                    @endif
                </p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                <p class='mb-0'> {{ Helper::countleftmember($rlrmemberid) }} / {{ Helper::countrightmember($rlrmemberid) }}</p>
                </div>
    
    
                </div>">
                <a href="{{ url('admin/genealogy/show/'.$rlrmember->member_id) }}">
                    <img src="{{ asset('img/blank.svg') }}" alt="{{ $rlrmember->member_id }}" style="background-color:
                    @if($rlrmember->status=='2') #38ba4b; @endif
                    @if($rlrmember->status=='0') #000; @endif
                    @if($rlrmember->status=='1') #f50114; @endif
                    ">
                </a>
                </div>
                <p class="name">
                {{ $rlrmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rlrmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rlrmember->member_id }}</button>)
                </p>
                @else
                <a href="{{  url('register?code='.$rlmember->member_id.'&side=2') }}" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>
                @endif
                @else
                <a href="javascript:void(0)" target="&quot;_blank&quot;">
                    <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                    Empty 
                    </p>     
                @endif
                </div>
            </div>
            </div>
            <!--End right left right end-->
        </div>
    </div>
    <div class="hv-item-child">
        <div class="hv-item">
            <div class="hv-item-parent">
                <div class="person">
                    @if (isset($rmember))
                   
                @if(Helper::getright($rmember->id))
                <?php
                $rrmemberid=Helper::getright($rmember->id)->member_id;
                $rrmember=Helper::user($rrmemberid);
                ?>
    
                <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rrmember->member_id }}" data-content="<div class='row'>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                <p class='mb-1'> {{ $rrmember->created_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                <p class='mb-1'>{{ $rrmember->active_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                <p class='mb-1'>
                    @if($rrmember->package_id!=0)

                    {{ Helper::orderDetail($rrmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rrmember->package_id)->amount }})
                    @else
                    'N/A'
                    @endif
                </p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                <p class='mb-0'> {{ Helper::countleftmember($rrmemberid) }} / {{ Helper::countrightmember($rrmemberid) }}</p>
                </div>
    
    
                </div>">
                <a href="{{ url('admin/genealogy/show/'.$rrmember->member_id) }}">
                    <img src="{{ asset('img/blank.svg') }}" alt="{{ $rrmember->member_id }}" style="background-color:
                    @if($rrmember->status=='2') #38ba4b; @endif
                    @if($rrmember->status=='0') #000; @endif
                    @if($rrmember->status=='1') #f50114; @endif
                    ">
                </a>
                </div>
                <p class="name">
                {{ $rrmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rrmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rrmember->member_id }}</button>)
                </p>
                @else
                <a href="{{  url('register?code='.$rmember->member_id.'&side=2') }}" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>
                @endif
                @else
                <a href="javascript:void(0)" target="&quot;_blank&quot;">
                    <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                    Empty 
                    </p>     
                @endif
                </div>
            </div>
            <!--end right right-->
        <div class="hv-item-children">
            <div class="hv-item-child">
                <div class="person">
                    @if (isset($rrmember))
                   
                @if(Helper::getleft($rrmember->id))
                <?php
                $rrlmemberid=Helper::getleft($rrmember->id)->member_id;
                $rrlmember=Helper::user($rrlmemberid);
                ?>
    
                <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rrlmember->member_id }}" data-content="<div class='row'>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                <p class='mb-1'> {{ $rrlmember->created_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                <p class='mb-1'>{{ $rrlmember->active_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                <p class='mb-1'>
                    @if($rrlmember->package_id!=0)
                    
                    {{ Helper::orderDetail($rrlmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rrlmember->package_id)->amount }})
                    @else
                    'N/A'
                    @endif
                </p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                <p class='mb-0'> {{ Helper::countleftmember($rrlmemberid) }} / {{ Helper::countrightmember($rrlmemberid) }}</p>
                </div>
    
    
                </div>">
                <a href="{{ url('admin/genealogy/show/'.$rrlmember->member_id) }}">
                    <img src="{{ asset('img/blank.svg') }}" alt="{{ $rrlmember->member_id }}" style="background-color:
                    @if($rrlmember->status=='2') #38ba4b; @endif
                    @if($rrlmember->status=='0') #000; @endif
                    @if($rrlmember->status=='1') #f50114; @endif
                    ">
                </a>
                </div>
                <p class="name">
                {{ $rrlmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rrlmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rrlmember->member_id }}</button>)
                </p>
                @else
                <a href="{{  url('register?code='.$rrmember->member_id.'&side=1') }}" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>
                @endif
                @else
                <a href="javascript:void(0)" target="&quot;_blank&quot;">
                    <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                    Empty 
                    </p>     
                @endif
                </div>
            </div>
            <!--End right right left-->
            <div class="hv-item-child">
                <div class="person">
                @if (isset($rrmember))
                @if(Helper::getright($rrmember->id))
                <?php
                $rrrmemberid=Helper::getright($rrmember->id)->member_id;
                $rrrmember=Helper::user($rrrmemberid);
                ?>
    
                <div tabindex="0" data-html="true" data-container="body" title="" data-toggle="popover" data-trigger="hover" data-original-title="{{ $rrrmember->member_id }}" data-content="<div class='row'>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Joining Date :</h6>
                <p class='mb-1'> {{ $rrrmember->created_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Activation Date :</h6>
                <p class='mb-1'>{{ $rrrmember->active_at }}</p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Package :</h6>
                <p class='mb-1'>
                    @if($rrrmember->package_id!=0)
                    
                    {{ Helper::orderDetail($rrrmember->package_id)->name }}<br/>(Rs. {{ Helper::orderDetail($rrrmember->package_id)->amount }})
                    @else
                    'N/A'
                    @endif
                </p>
                </div>
                <div class='col-6'>
                <h6 class='text-primary font-weight-600 text-uppercase mb-1'>Members(L/R) :</h6>
                <p class='mb-0'> {{ Helper::countleftmember($rrrmemberid) }} / {{ Helper::countrightmember($rrrmemberid) }}</p>
                </div>
    
    
                </div>">
                <a href="{{ url('admin/genealogy/show/'.$rrrmember->member_id) }}">
                    <img src="{{ asset('img/blank.svg') }}" alt="{{ $rrrmember->member_id }}" style="background-color:
                    @if($rrrmember->status=='2') #38ba4b; @endif
                    @if($rrrmember->status=='0') #000; @endif
                    @if($rrrmember->status=='1') #f50114; @endif
                    ">
                </a>
                </div>
                <p class="name">
                {{ $rrrmember->name }} (<button class="btn btn-link p-0" type="button" data-clipboard-text="{{ $rrrmember->member_id }}" data-title="Click To Copy" data-toggle="tooltip" data-placement="bottom" data-original-title="" title="">{{ $rrrmember->member_id }}</button>)
                </p>
                @else
                <a href="{{  url('register?code='.$rrmember->member_id.'&side=2') }}" target="&quot;_blank&quot;">
                <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                </a>
                <p class="name">
                Empty
                </p>
                @endif
                @else
                <a href="javascript:void(0)" target="&quot;_blank&quot;">
                    <img src="{{ asset('img/add.png') }}" alt="Empty" class="" style="background-color: gray">
                    </a>
                    <p class="name">
                        Empty 
                    </p>     
                @endif
                </div>
            </div>
    </div>
</div>
</div>
    </div>
</div>
</div>
    </div>
</div>
</div>
                </div>
            </div>
        </section>
    </div>
</div>
</form>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function goToMember() {
        var trackingCode = $('#code').val();
        if (trackingCode.length) {
            window.location = "{{  url('admin/genealogy/show/') }}/"+trackingCode;
        }
    }

    $('form').submit(function (e) {
        e.preventDefault();
        goToMember();
    });

    $("[data-toggle=popover]").popover({
        html: true,
        trigger: 'show',
        content: function () {
            return $('#popover-tour-content').html();
        }
    });
</script>
@endsection