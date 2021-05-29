@extends('layouts.master')

@section('title')
    Thêm chi nhánh
@endsection

@section('css')

    <!-- Bootstrap Core Css -->
    <link href="{{asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="{{asset('project_asset/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{asset('project_asset/plugins/dropzone/dropzone.css')}}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{asset('project_asset/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{asset('project_asset/plugins/jquery-spinner/css/bootstrap-spinner.css')}}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{asset('project_asset/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{asset('project_asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{asset('project_asset/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('project_asset/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <!-- Color Pickers -->
{{--            <form action="{{url('add-branch')}}" method="post">--}}
{{--                @csrf--}}
{{--                <div class="row clearfix">--}}
{{--                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="header">--}}
{{--                                <h2>--}}
{{--                                    THÊM CHI NHÁNH--}}
{{--                                </h2>--}}
{{--                            </div>--}}
{{--                            <div class="body">--}}
{{--                                <div class="row clearfix">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <b>Tên chi nhánh</b>--}}
{{--                                        <div class="input-group colorpicker">--}}
{{--                                            <div class="form-line">--}}
{{--                                                <input type="text" class="form-control" name="name_branch">--}}
{{--                                            </div>--}}
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i></i>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <b>Email</b>--}}
{{--                                        <div class="input-group colorpicker">--}}
{{--                                            <div class="form-line">--}}
{{--                                                <input type="text" class="form-control" name="email_branch">--}}
{{--                                            </div>--}}
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i></i>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row clearfix">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <b>Giám đốc</b>--}}
{{--                                        <div class="input-group colorpicker">--}}
{{--                                            <div class="form-line">--}}
{{--                                                <input type="text" class="form-control" name="director_branch">--}}
{{--                                            </div>--}}
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i></i>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <b>Phone</b>--}}
{{--                                        <div class="input-group colorpicker">--}}
{{--                                            <div class="form-line">--}}
{{--                                                <input type="number" class="form-control" name="phone_branch">--}}
{{--                                            </div>--}}
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i></i>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row clearfix">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <b>Địa chỉ</b>--}}
{{--                                        <div class="input-group colorpicker">--}}
{{--                                            <div class="form-line">--}}
{{--                                                <input type="text" class="form-control" name="local_branch">--}}
{{--                                                @error('local_branch')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                            <span class="input-group-addon">--}}
{{--                                                <i></i>--}}
{{--                                            </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="header">--}}
{{--                                                <h2>--}}
{{--                                                    CHỌN HÌNH ẢNH--}}
{{--                                                </h2>--}}
{{--                                            </div>--}}
{{--                                            <div class="body">--}}
{{--                                                <div class="dz-message">--}}
{{--                                                    <div class="drag-icon-cph">--}}
{{--                                                        <i class="material-icons">touch_app</i>--}}
{{--                                                    </div>--}}
{{--                                                    <h3>Drop files here or click to upload.</h3>--}}
{{--                                                    <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>--}}
{{--                                                </div>--}}
{{--                                                <div class="fallback">--}}
{{--                                                    <input name="image_branch" type="file" multiple />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <button class="btn btn-primary waves-effect" type="submit">THÊM CHI NHÁNH</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
            <div class="row clearfix">
                <form id="form_validation" action="{{url('add-branch')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Tạo Chi Nhánh Công Ty SkyTech</h2>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_branch" required>
                                        <label class="form-label">Tên chi nhánh</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="director_branch" required>
                                        <label class="form-label">Tên giám đốc</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email_branch" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone_branch" required>
                                        <label class="form-label">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="local_branch" required>
                                        <label class="form-label">Địa chỉ</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    CHỌN HÌNH ẢNH
                                </h2>
                            </div>
                            <div class="body">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Vui lòng bấm dưới đây và chọn hình ảnh</h3>
                                    <!-- <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em> -->
                                </div>
                                <div class="fallback">
                                    <input name="image_branch" type="file" multiple />
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">THÊM CHI NHÁNH</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <!-- Jquery Core Js -->
    <script src="{{asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('project_asset/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('project_asset/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{asset('project_asset/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{asset('project_asset/plugins/dropzone/dropzone.js')}}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{asset('project_asset/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{asset('project_asset/plugins/multi-select/js/jquery.multi-select.js')}}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{asset('project_asset/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('project_asset/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{asset('project_asset/plugins/nouislider/nouislider.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('project_asset/plugins/node-waves/waves.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('project_asset/js/admin.js')}}"></script>
    <script src="{{asset('project_asset/js/pages/forms/form-validation.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('project_asset/js/demo.js')}}"></script>
@endsection
