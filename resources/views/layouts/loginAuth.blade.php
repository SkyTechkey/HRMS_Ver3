
<?php
use Modules\Platform\Core\Helper\SettingsHelper as SettingsHelper;
use Krucas\Settings\Facades\Settings as Settings;
?>

<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ config('app.name') }}</title>
    <!-- Favicon-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset(config('bap.favicon')) }}" type="image/png">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300&display=swap" rel="stylesheet">

    <!-- Css -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('bap/plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bap/plugins/node-waves/waves.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bap/plugins/animate-css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bap/scss/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bap/scss/auth.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('bap/plugins/font-awesome/css/font-awesome.min.css')}}">
    
    @if(config('bap.google_ga'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('app.google_ga') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ config('bap.google_ga') }}');
        </script>
    @endif

</head>

<body  style="background: url('{{ config('bap.auth_bg') }}'); background-size: cover;" class="login-page ls-closed auth-background">

@yield('content')


    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- Scripts -->
    <script src="{{asset('bap/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bap/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('bap/plugins/node-waves/waves.js')}}"></script>
    <script src="{{asset('bap/js/admin.js')}}"></script>
    <script src="{{asset('bap/js/login.js')}}"></script>
    <script src="{{asset('bap/js/login.js')}}"></script>


</body>
</html>
