@extends('layouts.main')
@section('content')
@include('admin.inc.sidebar')
<div class="content-page">
    <div class="content">
        <div class="content-wrapper">
            <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Invoice</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12">
            <div class="form-group breadcrumb-right">
                <a class="btn btn-relief-primary mb-75 d-print-none" href="javascript:window.print()">
                    Print
                </a>
            </div>
        </div>
    </div>
    <section class="invoice-preview-wrapper">
        <div class="invoice-preview">
            <div style="padding: 40px;line-height: 16px;color: #514d6a;background-color: #fff;font-size: 11pt">
    <div class="header table-responsive">
        <table style="width: 100%;">
            <tbody>
            <tr>
                <td style="width: 50%;">
                    <img src="{{ asset(Helper::setting('logo')) }}" alt="" height="40" style="vertical-align: middle; border-style: none;">
                </td>
                <td style="width: 50%;" align="right">
                    <h1 style="font-size: 1vw;"><strong>Tax Invoice </strong></h1>
                </td>
            </tr>
            <tr style="height: 16px;">
                <td>&nbsp;</td>
                <td style="width: 50%; height: 16px;text-align: right;line-height: 28px">
                    <b>Invoice No :</b>
                    <span class="ml-1">#{{ $order->invoice }}</span> <br>
                    <b class="text-dark">Invoice Date :</b>
                    <span class="ml-1">{{ $order->created_at }}</span>
                </td>
            </tr>
            <tr style="height: 90px;margin-top: 2rem;">
                <td style="width: 50%;">
                    <h6>Company Address</h6>
                    <address style="color: #514d6a;  line-height: 24px;">
                        <b>{{ Helper::setting('address') }}</b><br>
                        {!! Helper::setting('address') !!} <br>
                    </address>
                    <p>
                        <b>Mobile No :</b> {{ Helper::setting('mobile') }}
                    </p>
                </td>
                <td style="width: 50%;">
                    <address style="color: #514d6a;  line-height: 24px;">
                        <h6>Billing Address</h6>
                        <b>
                            {{$order->user->name }}
                        </b>
                        <br>
                        {{ $address->District.','.$address->State.','.$address->Country }}
                        {{ $order->user->pincode }}
                        <p>
                            <b>Mobile No :</b> {{ $order->user->mobile }}
                        </p>
                    </address>
                </td>
            </tr>
            <tr style="height: 16px;">
                <td style="width: 54.8145%; height: 16px;">&nbsp;</td>
                <td style="width: 41.1855%; height: 16px;" align="right">&nbsp;</td>
            </tr>
            <tr>
                <td style="padding: 20px 0px; width: 96%;" colspan="2">
                    <table style="margin-left: auto; margin-right: auto;border: 1px solid #dee2e6; width: 100%; margin-bottom: 0 !important;">
                        <thead style="display: table-header-group; vertical-align: middle; border-color: inherit;">
                        <tr style="display: table-row; vertical-align: inherit; border-color: inherit;">
                            <th style="vertical-align: bottom; border: 1px solid #dee2e6; font-size: 14px;white-space:nowrap;padding: .85rem;">
                                #
                            </th>
                            <th style="vertical-align: bottom; border: 1px solid #dee2e6; font-size: 14px;white-space:nowrap;padding: .85rem;">
                                DESCRIPTION
                            </th>
                            <th style="vertical-align: bottom; border: 1px solid #dee2e6; font-size: 14px;white-space:nowrap;padding: .85rem;">
                                PRICE
                            </th>
                            <th style="vertical-align: bottom; border: 1px solid #dee2e6; font-size: 14px;white-space:nowrap;padding: .85rem;">
                                Quantity
                            </th>
                            <th style="vertical-align: bottom; border: 1px solid #dee2e6; font-size: 14px;white-space:nowrap;padding: .85rem;">
                                TOTAL
                            </th>
                            <th style="vertical-align: bottom; border: 1px solid #dee2e6; font-size: 14px;white-space:nowrap;padding: .85rem;">
                                APV
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($order->packages as $package)
                                                    <tr>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $count++ }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $package->package->name }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs {{ $package->package->dp }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $package->quantity }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs. {{ $package->amount }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $package->apv }}</td>
                            </tr>
                            @endforeach
                            @foreach($order->products as $product)
                                                    <tr>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $count++ }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $product->product->name }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs {{ $product->product->dp }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $product->quantity }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs. {{ $product->amount }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $product->apv }}</td>
                            </tr>
                            @endforeach
                                                    
                                                <tr>
                            <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;line-height: 28px;font-size: 11pt" colspan="6">
                                <b>CUSTOMER ACKNOWLEDGEMENT: </b>     Certified that I am at-least 18 years of age and have completed
                                at-least 10th grade of schooling. I have received complete Silver
                                online immediately after registration. I have carefully read terms &amp;
                                conditions as given on website {{ env('APP_URL') }} and agree to them.
                                Currently I am not working with any other similar Business
                                Operation. I am signing this DECLARATION with complete understanding
                                and with my own WILL, without any PRESSURE / UNDUE INFLUENCE and
                                INDUCEMENT. I am aware that any dispute arising out of this purchase
                                would first be solved as per Terms and Conditions of the company,
                                failing which could be addressed exclusively in competent courts in
                                New delhi,Delhi only.
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;" colspan="6">
                                Invoice was created on a computer and is valid without the signature and seal.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
            <div class="text-center my-3">
                <a class="btn btn-relief-primary mb-75 d-print-none" href="javascript:window.print()">
                    Print
                </a>
            </div>

        </div>
    </section>
    </div>
    </div>
</div>
@endsection