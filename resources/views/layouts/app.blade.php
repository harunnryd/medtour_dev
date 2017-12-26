<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bubba.css') }}" rel="stylesheet">
    <link href="{{ asset('css/foundation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/foundation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/star.css') }}" rel="stylesheet">


    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') }}" />
    <!-- -->

	<!--- admin--->
<!--	<link href="{{ asset('css/admin/bootastrap.min.css') }}" rel="stylesheet">-->

	<link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/custom_1.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/examples.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet">

	<link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin/swipebox.css') }}" rel="stylesheet">

	<script src="{{ asset('js/jquery.min.js') }}"> </script>

	<script src="{{ asset('js/jquery.metisMenu.js') }}"></script>
	<script src="js/jquery.slimscroll.min.js"> </script>
	<script src="{{ asset('js/skycons.js') }}"> </script>
	<script src="{{ asset('js/jquery.flot.js') }}"> </script>
	<script src="{{ asset('js/underscore-min.js') }}"> </script>
	<script src="{{ asset('js/moment-2.2.1.js') }}"> </script>
	<script src="{{ asset('js/clndr.js') }}"> </script>
	<script src="{{ asset('js/site.js') }}"> </script>
	<script src="{{ asset('js/owl.carousel.js') }}"> </script>
	<script src="{{ asset('js/screenfull.js') }}"> </script>
	<script src="{{ asset('js/custom.js') }}"> </script>
<!--
	<script src="{{ asset('js/jquery.nicescroll.js') }}"> </script>
	<script src="{{ asset('js/scripts.js') }}"> </script>
	<script src="{{ asset('js/bootstrap.min.js') }}"> </script>
-->
	<!--- admin--->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $( "#datepicker" ).datepicker();
        });
    </script>

    <script>
    $(document).ready(function(){
        $("#button").click(function(){
            $("#contact").toggle();
            $("#address").toggle();
            $("#city").toggle();
            $("#province").toggle();
            $("#country").toggle();
        });

        $(document.body).on('click', '.js-submit-confirm', function (event) {
            event.preventDefault()
            var $form = $(this).closest('form')
            var $el = $(this)
            var text = $el.data('confirm-message') ? $el.data('confirm-message') : 'Kamu\
            tidak akan bisa membatalkan proses ini!'
            swal({
                title: 'Kamu yakin?',
                text: text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yap, lanjutkan!',
                cancelButtonText: 'Batal',
                closeOnConfirm: true
            },
            function () {
                $form.submit()
            });
        });
    });
    </script>

    <!-- Styles -->
    <style>
        .separador-vertical{
        border-right:1px solid #bfbdbd;
        }

        .titulo-equipo{
        margin-top:0px;
        }

        .equipo-item{
            border:	1px solid #D1CFCF ;
            padding: 10px;
            border-radius:10px;
            margin-bottom:25px;
        }
    </style>

    <!-- DatePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-fixed-top medtour-navbar">
            <div class="container container-medtour-nav">
                <div class="navbar-header">
					<!-- Branding Image -->

                    <a href="{{ url('/') }}">
						<img src="{{ asset("img/medtour-logo1.svg") }}">
					</a>
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
						<li><a >Overview</a></li>
						<li><a >Mission</a></li>
						<li><a >Innovation</a></li>
						<li><a >Contact</a></li>
                        {{-- tambah comparisons --}}
                        <li><a href="{{ route('guest.comparison.index') }}">Comparison ({{ $comparisons->totalDoctor() }})</a></li>
                        <!-- Authentication Links -->

                        {{-- tambah cek guard --}}
                        @if(Auth::guard('admin')->check())
                            @php
                                $guard = 'admin';
                                $route = 'admin.logout';
                                $method = 'GET';
                            @endphp
                        @else
                            @php
                                $guard = 'web';
                                $route = 'logout';
                                $method = 'POST';
                            @endphp
                        @endif
                        {{-- ----------------- --}}

                        @if (Auth::guard($guard)->guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::guard($guard)->user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>

                                        <a href="{{ route($route) }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route($route) }}" method="{{ $method }}" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        {{-- tambah sweet alert --}}
        @includeIf('sweet::alert')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!--
	  <script>
     $(document).ready(function(){
        $(window).scroll(function(){
            if ($(this).scrollTop() > 50){ // Set position from top to add class
                $(".medtour-navbar").css({"background-color":"#fff"});
                $(".medtour-navbar").css({"box-shadow":"0px 1px 4px #d0d4d9"});
                $(".medtour-navbar").css({"border-color":"#d7d7d7"});
                $(".navbar-nav > li > a").css({"color":"#32404c"});


            }
            else{
                $(".medtour-navbar").css({"background-color":"transparent"});
                $(".medtour-navbar").css({"box-shadow": "none"});
                $(".medtour-navbar").css({"border-color":"transparent"});
                $(".navbar-nav > li > a").css({"color":"#fff"});
            }

    })
})
    </script>
-->

    <!-- Select 2 -->
    <script type="text/javascript" src="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
    <!-- -->

    <!-- DatePicker -->
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
        $(function() {
            $( "#datepicker" ).datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true
            });

            $('#matching-star-specialization').select2();
            $('#matching-star-language').select2();
        });
    </script>
    <!-- -->
</body>
</html>
