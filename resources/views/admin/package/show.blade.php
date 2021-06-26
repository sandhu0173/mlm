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
                        <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Package</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Package</h4>
            </div>
        </div>
    </div>

    
               <div id="app" class="row">
               <div class="col-lg-12">
               <div class="card">
               <div class="card-body">
               <h4 class="header-title">PACKAGE INFORMATION</h4>
                <p class="sub-header"> Adding your package Details</p> 
                <div class="row">
                <div class="col-lg-3 col-12">
                     <div class="form-group mb-3">
                        <label>Package Name</label>
                        <span class="text-danger">*</span> 
                        <input type="text" required="required" name="name" readonly placeholder="Enter Package Name" value="{{$pack->name}}" class="form-control">
                     </div>
                </div> 
                <div class="col-lg-3 col-12">
                    <div class="form-group mb-3">
                        <label>Amount</label>
                         <span class="text-danger">*</span> 
                         <input type="text" required="required" name="name" readonly value="{{$pack->amount}}" class="form-control">
                     </div>
                </div> 
                    
                <div class="col-lg-3 col-12">
                <div class="form-group mb-3">
                <label>AP</label> 
                <span class="text-danger">*</span> 
                <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-rupee-sign"></i></span></div> 
                    <input type="number" required="required" name="capping" readonly placeholder="AP" value="{{$pack->dp}}" class="form-control">
                </div>
                </div>
                </div> 
                <div class="col-lg-3 col-12">
                    <div class="form-group mb-3">
                         <label>APV</label>
                            <span class="text-danger">*</span>
                        <div class="input-group">
                            <input type="number" required="required" readonly name="apv" placeholder="Enter PV" value="{{$pack->apv}}" class="form-control">
                        </div>
                    </div>
                </div>
                
            
        </div> 
            <div class="col-12">
            <table class="table table-hover table-bordered table-striped dataTable no-footer" id="productTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT CODE</th>
                                    <th>MRP</th>
                                    <th>Ap</th>
                                    <th>APV</th>
                                </tr>
                            <thead>
                            <tbody>
                            <?php 
                                $tprice=0;
                                $tdp=0;
                                $tapv=0;
                            ?>
                            @foreach($pack->products as $product)
                            <?php 
                                $tprice=$tprice+$product->price;
                                $tdp=$tdp+$product->dp;
                                $tapv=$tapv+$product->apv;
                            ?>
                            <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->sku}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->dp}}</td>
                                    <td>{{$product->apv}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-right">Total</th>
                                    <th>{{ $tprice }}</th>
                                    <th>{{  $tdp}}</th>
                                    <th>{{ $tapv }}</th>
                                </tr>
                            </tfoot>
                        </table>
              
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection