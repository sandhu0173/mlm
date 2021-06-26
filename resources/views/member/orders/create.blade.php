@extends('layouts.main')
@section('content')
@include('member.inc.sidebar')
<div class="content-page">
    <div class="content">
        <div class="content-wrapper">
            <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/member/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ url('/member/orders') }}" class="filePondForm" enctype="multipart/form-data" >
        @csrf
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-1">
                                    <label for="Package" class="required">Package/ Products </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-1">
                                    <label for="pin" class="required">Quantity </label>
                                    
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group mb-1">
                                    <label for="pin" class="required">Apv </label>
                                    
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group mb-1">
                                    <label for="pin" class="required">Amount </label>
                                </div>
                            </div>
                            <div class="col-lg-1 add_block">
                                
                            </div>
                        </div>
                        <div class="order_detail">

                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <select id="item" class="form-control select2 item" name="item[]" required="">
                                            <option value="">Select</option>
                                            <optgroup label="Packages">
                                            @foreach($packages as $package)
                                            <option value="{{ $package->id }}" >{{ $package->name }} {{ $package->dp }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="Products">
                                            @foreach($products as $product)
                                            <option value="{{ $product->id }}" >{{ $product->name }} {{ $product->dp }}</option>
                                            @endforeach
                                        </optgroup>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span>
                                        </div>
                                        <input id="name" type="hidden" name="name[]" class="form-control name" value="" min="1" required="">
                                        <input id="type" type="hidden" name="type[]" class="form-control type" value="" required="">
                                        <input id="quantity" type="number" name="quantity[]" class="form-control quantity" value="" min="1" placeholder="Enter Quantity" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span>
                                        </div>
                                        <input id="sapv" readonly type="hidden" name="sapv[]" class="form-control sapv" value="" min="1" placeholder="" required="">
                                        <input id="apv" readonly type="number" name="apv[]" class="form-control apv" value="" min="1" placeholder="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span>
                                        </div>
                                        <input readonly id="samount" type="hidden" name="samount[]" class="form-control samount" value="" placeholder="" required="">
                                        <input readonly id="amount" name="amount[]" class="form-control amount" value="" placeholder="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 add_block">
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm add" type="button"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="payment_mode" class="required">Select Payment Mode</label>
                                    <select id="payment_mode" name="payment_mode" class="form-control" required="" >
                                        <option value="" data-select2-id="4">Select Payment mode</option>
                                        @foreach ($modes as $mode)
                                            <option value="{{ $mode->id }}">{{ $mode->name }}</option>
                                        @endforeach
                                         
                                    </select>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="required" for="bank_name">Select Bank</label>
                                    <select id="bank_name" name="bank_name" class="form-control" required="" >
                                        <option value="" >Please Select Bank</option>
                                        @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name." ". $bank->ac_number }}</option>
                                        @endforeach
                                        <option value="N/A" >N/A</option>

                                    </select>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="reference_no" class="required">Reference Number</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slack"><path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"></path><path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"></path><path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"></path><path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"></path><path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"></path><path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"></path><path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"></path><path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"></path></svg></span>
                                        </div>
                                        <input id="reference_no" type="text" name="reference_no" class="form-control" value="" placeholder="Reference Number" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="date" class="required">Deposit Date </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                                        </div>
                                        <input id="date" type="date" name="date" class="form-control" value="" max="{{ date('Y-m-d') }}" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="time" class="required">Deposit Time </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
                                        </div>
                                        <input id="time" type="time" name="time" autocomplete="off" class="form-control" value="" placeholder="Deposit Time" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="required">Upload Receipt</label>
                                    <input type="file" id="receipt" name="receipt" class="filePondInput" value="" required>
                                    </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-relief-primary" type="submit">
                                <i class="fe-thumbs-up mr-1"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $("#item").on('change', function () {
            var selected = $("option:selected", this);
            var item_id=$(this).val();
            var row=$(this).parent().closest('.row');
           // $(".div_to_show").show();
            if (selected.parent()[0].label != "Packages") {
               // console.log('Product');
                //$(".div_to_show").hide();
                $.ajax({
                    url:"{{ url('member/order/product/') }}",
                    method:"GET",
                    data:{item_id:item_id},
                    success:function(response){
                        //console.log(response);
                        row.find('.quantity').val(1);
                        row.find('.type').val(1);
                        row.find('.name').val(response.name);
                        row.find('.sapv').val(response.apv);
                        row.find('.apv').val(response.apv);
                        row.find('.amount').val(response.dp);
                        row.find('.samount').val(response.dp);
                    }
                })
            }
            else {
                
                $.ajax({
                    url:"{{ url('member/order/package/') }}",
                    method:"GET",
                    data:{item_id:item_id},
                    success:function(response){
                        //console.log(response);
                        row.find('.quantity').val(1);
                        row.find('.type').val(2);
                        row.find('.name').val(response.name);
                        row.find('.sapv').val(response.apv);
                        row.find('.apv').val(response.apv);
                        row.find('.amount').val(response.dp);
                        row.find('.samount').val(response.dp);
                    }
                })
                //$(".div_to_show").show();
               
            }
        });
        $(document).on('change','.quantity',function(){
            var quantity=$(this).val();
            var apv=$(this).parent().closest('.row').find('.sapv').val();
            var amount=$(this).parent().closest('.row').find('.samount').val();
            //$('#')
            $(this).parent().closest('.row').find('.apv').val(quantity*apv);
            $(this).parent().closest('.row').find('.amount').val(amount*quantity);
        })
        $(document).on('click','.remove',function(){
            $(this).parent().closest('.row').remove();
        })
        $(document).on('click','.add',function(){
            var item=$('#item').val();
            var name=$('#name').val();
            var type=$('#type').val();
            var quantity=$('#quantity').val();
            var apv=$('#apv').val();
            var sapv=$('#sapv').val();
            var samount=$('#samount').val();
            var amount=$('#amount').val();
            var html= '<div class="row"><div class="col-lg-4"><div class="form-group"> <div class="input-group input-group-merge"><input readonly type="" name="name[]" class="form-control name" value="'+name+'" min="1" required=""><input type="hidden" name="item[]" class="form-control item" value="'+item+'"></div></div></div>';
            html+='<div class="col-lg-3"><div class="form-group"> <div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span></div>';
        
            html+='<input  type="hidden" name="type[]" class="form-control type" value="'+type+'" required="">';
            html+='<input type="number" name="quantity[]" class="form-control quantity" value="'+quantity+'" min="1" placeholder="Enter Quantity" required=""></div></div></div>';
            html+='<div class="col-lg-2"><div class="form-group"><div class="input-group input-group-merge"><div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span></div>';
            html+='<input  readonly type="hidden" name="sapv[]" class="form-control sapv" value="'+sapv+'" min="1" placeholder="" required="">';
            html+='<input readonly type="number" name="apv[]" class="form-control apv" value="'+apv+'" min="1" placeholder="" required="">';
            html+='</div></div></div>';
            html+='<div class="col-lg-2">';
            html+='<div class="form-group">';
            html+='<div class="input-group input-group-merge">';
            html+='<div class="input-group-prepend">';
            html+='<span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg></span>';
            html+='</div>';
            html+='<input readonly type="hidden" name="samount[]" class="form-control samount" value="'+samount+'" placeholder="" required="">';
            html+='<input readonly name="amount[]" class="form-control amount" value="'+amount+'" placeholder="" required="">';
            html+='</div></div></div>';
            html+='<div class="col-lg-1 add_block">';
            html+='<div class="form-group">';
                html+='<button class="btn btn-danger btn-sm remove" type="button"><i class="fa fa-times"></i></button></div></div></div>';
            //console.log(html);
            $('.order_detail').append(html);
            resetform();
        })
        function resetform()
        {
            $("#item").val("");
            $("#item").trigger("change");
            $('#name').val('');
            $('#type').val('');
            $('#quantity').val('');
            $('#apv').val('');
            $('#sapv').val('');
            $('#samount').val('');
            $('#amount').val('');
        }
        $('#payment_mode').on('change',function(){
            if($(this).val()=="1")
            {
                $('#bank_name').val('N/A');
                $('#reference_no').val('N/A');
                $('#receipt').attr('required',false);
            }else{
                $('#bank_name').val();
                $('#reference_no').val();
                $('#receipt').attr('required',true);
            }
        })
</script>
@endsection