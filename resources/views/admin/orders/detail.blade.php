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
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <section class="invoice-preview-wrapper">
        <div class="invoice-preview">
            <div style="padding: 40px;line-height: 16px;color: #514d6a;background-color: #fff;font-size: 11pt">
    <div class="header table-responsive">
        <table style="width: 100%;">
            <tbody>
            
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
                            @foreach($packages as $package)
                                                    <tr>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $count++ }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $package->package->name }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs {{ $package->package->dp }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $package->quantity }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs. {{ $package->amount }}</td>
                                <td  style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $package->apv }}</td>
                            </tr>
                            <?php $totalamount=$totalamount+$package->amount;
                            $totalapv=$totalapv+$package->apv;
                            ?>
                            @endforeach
                            @foreach($products as $product)
                                                    <tr>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $count++ }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $product->product->name }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs {{ $product->product->dp }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $product->quantity }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">Rs. {{ $product->amount }}</td>
                                <td style="border: 1px solid #dee2e6; padding: .85rem; vertical-align: top;font-size: 14px;white-space:nowrap;">{{ $product->apv }}</td>
                            </tr>
                            <?php $totalamount=$totalamount+$product->amount;
                            $totalapv=$totalapv+$product->apv;
                            ?>
                            @endforeach
                           
                        </tbody>

                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="text-right">Total Amount</th>
                            <td>{{ $totalamount }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Total Apv</th>
                                <td>{{ $totalapv }}</td>
                                </tr>
                        </thead>
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