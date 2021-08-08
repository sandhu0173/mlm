
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.5/jquery.bootstrap-touchspin.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.4/flatpickr.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.5.5/css/buttons.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/select/1.2.7/css/select.bootstrap4.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"  crossorigin="anonymous"></script>
    </head>
<body class="loading">
<div id="preloader">
    <div id="status">
        <div class="spinner">Loading...</div>
    </div>
</div>
<div id="wrapper">
    
   
    @yield('content')
    <div class="modal fade bd-example-modal-sm deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Do you want to delete this entity? </h4>
      </div>
      <div class="modal-footer">
      <form class="deleteform" method="POST">
      @csrf
      @method('DELETE')
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button  class="btn btn-primary">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        © Copyright 2021. All Rights Reserved by
                        <a href="http://mytrustlead.com" target="_blank">{{ config('app.name', 'Laravel') }}</a>
                    </div>
                    <div class="col-md-6">
                                                    <span class="text-primary float-right">
                            Last Login :
                                                                {{date('Y-m-d H:i:s')}}
                                                            </span>
                                            </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://unpkg.com/feather-icons"></script>
<!-- add to document <head> -->
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />

<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link
  href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
  rel="stylesheet"
/>

<!-- add before </body> -->
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<!-- add before </body> -->
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<!-- add before </body> -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js"  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.0/js/jquery.nice-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.5/js/bootstrap-select.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.5/jquery.bootstrap-touchspin.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.5.4/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.5/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/keytable/2.5.1/js/dataTables.keyTable.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/datatables.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script src="{{ asset('js/form-pickers.init.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script>
    
    $(function () {

        $(".field-wrapper .field-placeholder").on("click", function () {
            $(this).closest(".field-wrapper").find("input").focus();
        });
        $(".field-wrapper input").on("keyup", function () {
            var value = $.trim($(this).val());
            if (value) {
                $(this).closest(".field-wrapper").addClass("hasValue");
            } else {
                $(this).closest(".field-wrapper").removeClass("hasValue");
            }
        });

    });
</script>
    @yield('scripts')
    <script>
    $('.select2').select2();
    $(document).on('click','.delete',function(e){
        e.preventDefault();
        var href=$(this).attr('href');
        $('.deleteform').attr('action',href);
        $('.deleteModal').modal('show');
    })
   
        @if(Session::has('message'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ Session::get('message') }}",
            })
        @endif
        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops!!!',
            text: "{{ Session::get('error') }}",
            })
        @endif
        
    </script>
    <script>
//const inputElement = document.querySelector('input[type="file"]');
//const pond = FilePond.create( inputElement );

FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginImageEdit
);

// Select the file input and use 
// create() to turn it into a pond
FilePond.create(
 // document.querySelector('input[type="file"]')
);
</script>
</body>
</html>
