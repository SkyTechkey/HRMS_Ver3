<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset(config('bap.favicon')) }}" type="image/png">

    <link href="{{ asset('bap/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,latin-ext,cyrillic-ext"
        rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <link href="{{ asset('project_asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('project_asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}"
        rel="stylesheet">

    <!-- Custom Css-->
    <link href="{{ asset('project_asset/css/style.css')}}" rel="stylesheet">

    <!-- <link href="{{ asset('bap/scss/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/bap/plugins/animate-css/animate.css')}}" rel="stylesheet">
    -->
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />
    @stack('css-up')
    @stack('head-script')
    <!-- <script type="text/javascript" src="{{ asset('bap/js/admin.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('bap/plugins/jquery/jquery.min.js')}}"></script>
</head>

<body class="theme-red">
    <!-- Page Loader class=theme-indigo sidebar-small -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- #Top Bar -->
    @include('layouts.header')
    <!-- #END Top Bar -->
    <section>
        @include('layouts.left-sidebar')
        @include('layouts.right-sidebar')
    </section>
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    @include('layouts.bottom_js')

    <!-- #js footer -->
    @stack('footer-script')
    <!-- #Dành cho Pjax
        <script>
            var csrf_token = '{{ csrf_token() }}';
        </script>
        <script type="text/javascript" src="{{ asset('js/jquery.pjax.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.pjax.min.js')}}"></script>
    -->
</body>

</html>
