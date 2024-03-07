<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
        $template = App\Models\SiteSetting::find(1);

        $style = STYLES[$template->style] . '.css';
    @endphp
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') </title>
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset($template->favicon) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- All plugins -->
    <link href="{{ asset('frontend/assets/plugins/css/plugins.css') }}" rel="stylesheet">

    <!-- Custom style -->
    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsiveness.css') }}" rel="stylesheet">

    <link type="text/css" rel="stylesheet" id="jssDefault"
        href="{{ asset('frontend/assets/css/colors/' . $style . '') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ asset('frontend/js/html5shiv.min.js') }}"></script>
      <script src="{{ asset('frontend/js/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Scripts -->
 <!-- Toastr styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
</head>

<body class="home-2">
    <div class="wrapper">
        <!-- Start Navigation -->
        @include('layouts.front_nav')
        <!-- End Navigation -->
        <div class="clearfix"></div>
        {{ $slot }}


        @include('frontend.body.footer')


        <!-- Switcher -->
        @if (Auth::check())
            @if (Auth::user()->role == 'admin')
                @if (Auth::user()->roles[0]->name == 'SuperAdmin')
                    <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i
                            class="spin theme-cl fa fa-cog" aria-hidden="true"></i></button>
                    <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;"
                        id="rightMenu">
                        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large theme-bg">Close
                            &times;</button>
                        <div class="title-logo">
                            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt=""
                                class="img-responsive">
                            <h4>Choose Your Color</h4>
                        </div>


                        <ul id="styleOptions" title="switch styling">
                            @foreach (STYLES as $style)
                                @if ($style != 'main')
                                    <li>
                                        <a href="javascript: void(0)" class="cl-box {{ $style }}"
                                            data-theme="colors/{{ $style }}" title="{{ $style }}"></a>
                                    </li>
                                @endif
                            @endforeach


                        </ul>
                @endif
            @endif
        @endif
    </div>
    <!-- /Switcher -->
    <a id="back2Top" class="theme-bg" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    <!-- START JAVASCRIPT -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/bootsnav.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/bootstrap-touch-slider-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/jquery.touchSwipe.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/chosen.jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/datedropper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/dropzone.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/jqueryadd-count.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/jquery-rating.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/timedropper.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/js/waypoints.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.js') }}"></script>

    <!-- Toastr js for this page -->
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
    <!-- Custom Js -->
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
    </script>
    @if (Auth::check())
        @if (Auth::user()->role == 'admin')
            @if (Auth::user()->roles[0]->name == 'admin')
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#styleOptions').styleSwitcher();
                    });
                </script>
            @endif
        @endif
    @endif
    </div>
</body>

</html>
