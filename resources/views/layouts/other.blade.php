<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin') }} </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/assets/layouts/src/assets/img/favicon.ico')}}"/>
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/light/loader.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/dark/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('backend/assets/layouts/vertical-light-menu/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('backend/assets/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/assets/css/light/authentication/auth-cover.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('backend/assets/layouts/vertical-light-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/src/assets/css/dark/authentication/auth-cover.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
     <!-- Toastr styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
              {{ $slot }}
            </div>
            
        </div>

    </div>
    

 <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="{{ asset('backend/assets/src/plugins/src/global/vendors.min.js')}}"></script>
  <script src="{{ asset('backend/assets/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->
  <script src="{{ asset('backend/assets/src/assets/js/forms/bootstrap_validation/bs_validation_script.js')}}"></script>
  <script src="{{ asset('backend/assets/js/authentication/form-1.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.loginButton').on('click', function () {
            // Show loading spinner
            
            $('#loginSpinner').removeClass('d-none');

            // You may also want to disable the button to prevent multiple clicks
            // $('#loginButton').prop('disabled', true);
        });
    });
</script>
</body>
</html>