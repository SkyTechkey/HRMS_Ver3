@extends('layouts.auth')
@section('css')
<link href="{{asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{asset('project_asset/css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin<b>HRMS</b></a>
        <small>Human Resource Management Systems - SkyTech</small>
    </div>
    <div class="card">
        <div class="body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="msg">Sign in to start your session</div>
                @if (session('warning'))
                    <span class="alert alert-warning help-block">
                        <strong>{{ session('warning') }}</strong>
                    </span>
                @endif
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input id="username" type="username" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username"  placeholder="Username" required autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input id="password" type="password" class="form-control  form-control-user @error('password') is-invalid @enderror" name="password"  autocomplete="current-password"  placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input class="form-check-input custom-control-user" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="{{url('register')}}">Register Now!</a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection
@section('js')
<!-- Jquery Core Js -->
<script src="{{asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('project_asset/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('project_asset/plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{asset('project_asset/plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('project_asset/js/admin.js')}}"></script>
<script src="{{asset('project_asset/js/pages/examples/sign-up.js')}}"></script>
@endsection
