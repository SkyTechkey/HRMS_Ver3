@extends('layouts.master')
@section('title')
    Thêm nhân viên
@endsection
@section('css')
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <link href="{{ asset('project_asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('project_asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('project_asset/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class ="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss ="alert" aria-hidden="true"></button>

                    {{session('success')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="header">
                            <h2>
                                Thêm nhân viên Công Ty SkyTech
                            </h2>
                        </div>

                        <div  class="body">
                            <div class="table-responsive">
                                <form action = "{{url('nhanvien/them')}}" id="form_validation" method="POST">
                                    @csrf
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="hovaten" placeholder="Họ và tên"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="tenthuonggoi" placeholder="Tên thường gọi"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="gioitinh" placeholder="Giới Tính"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngayvaolam" placeholder="Ngày vào làm"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="sodienthoai" placeholder="Số điện thoại"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="email" placeholder="Email"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="socmnd" placeholder="Số CMND"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngaycapcmnd" placeholder="Ngày cấp CMND"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="noicapcmnd" placeholder="Nơi cấp CMND"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngaysinh" placeholder="Ngày sinh"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="noisinh" placeholder="Nơi sinh"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="phongban" placeholder="Phòng ban"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="chucvu" placeholder="Chức vụ"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="noilamviec" placeholder="Nơi làm việc"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="diachithuongtru" placeholder="Địa chỉ thường trú"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="diachitamtru" placeholder="Địa chỉ tạm trú"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="masothue" placeholder="Mã số thuế"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="sotaikhoan" placeholder="Số tài khoản"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="nganhang" placeholder="Ngân hàng"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngayvaocongdoan" placeholder="Ngày vào công đoàn"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngayvaodoan" placeholder="Ngày vào đoàn"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngayvaodang" placeholder="Ngày vào đảng"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="quoctich" placeholder="Quốc tịch"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="tongiao" placeholder="Tôn giáo"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="dantoc" placeholder="Dân tộc"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="nguoigioithieu" placeholder="Người giới thiệu"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="tinhtranghonnhan" placeholder="Tình trạng hôn nhân"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="hinhthucnhanvien" placeholder="Hình thức nhân viên"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ghichu" placeholder="Ghi chú"  required>
                                            </div>
                                           {{-- <div class="form-line"> --}}
                                            <div class="demo-radio-button">
                                                Tình trạng làm việc
                                                <input value = "active" name="group1" type="radio" id="radio_3" checked />
                                                <label name for="radio_3">Đang làm việc</label>
                                                <input value = "close" name="group1" type="radio" id="radio_4" />
                                                <label name for="radio_4">Tạm ngừng việc</label>
                                            </div>
                                           {{-- </div> --}}
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="hinhanh" placeholder="Hình ảnh"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="matkhau" placeholder="Mật khẩu"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="tongiao" placeholder="Tôn giáo"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="quoctich" placeholder="Quốc tịch"  required>
                                            </div>
                                            <div class="form-line">
                                                <input  type="text" class="form-control" name="ngoaingu" placeholder="Ngoại ngữ"  required>
                                            </div>
                                        </div>
                                    </div></div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            Địa chỉ thường trú
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selective form-control" name="tinhthanh" id="tinhthanh" aria-label=".form-select-sm" style="wight: ">
                                                <option value="" selected>Chọn tỉnh thành</option>
                                                @foreach ($tinhthanh as $item)
                                                    <option value="{{$item->id}}">{{$item->tentinhthanh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selective form-control" name="quanhuyen" id="quanhuyen" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn quận huyện</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selective form-control" name="xaphuong" id="xaphuong" aria-label=".form-select-sm">
                                                {{-- <option value="" selected>Chọn phường xã</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3">
                                            Địa chỉ tạm trú
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selective form-control" name="tinhthanh" id="tinhthanh1" aria-label=".form-select-sm">
                                                <option value="" selected>Chọn tỉnh thành</option>
                                                @foreach ($tinhthanh as $item)
                                                    <option value="{{$item->id}}">{{$item->tentinhthanh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selective form-control" name="quanhuyen" id="quanhuyen1" aria-label=".form-select-sm">
                                                {{-- <option value="" selected>Chọn quận huyện</option> --}}
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selective form-control" name="xaphuong" id="xaphuong1" aria-label=".form-select-sm">
                                                {{-- <option value="" selected>Chọn phường xã</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    @section('js')
    <!-- Jquery Core Js -->
    <script src="{{ asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('project_asset//plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('project_asset/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('project_asset/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>


    <!-- Custom Js -->
    <script src="{{ asset('project_asset/js/admin.js')}}"></script>
    <script src="{{ asset('project_asset/js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('project_asset/js/demo.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
            $('#tinhthanh').change(function(){
            var cit = $(this).val();
            if (cit) {
                $.ajax({
                    type: "get",
                    url: "{{url('/getQuanHuyen/')}}/"+cit,
                    success:function(res) {
                        if (res) {
                            $("#quanhuyen").empty();
                            $("#xaphuong").empty();
                            // $("#quanhuyen").append('<option value="" selected>Chọn quận huyện</option>');
                            $.each(res, function(key, value) {
                                $("#quanhuyen").append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                    }
                });
                // console.log(cit);
            }
        });
    
        $('#quanhuyen').change(function(){
            var sid = $(this).val();
            if(sid){
            $.ajax({
               type:"get",
               url:"{{url('getXaPhuong/')}}/"+sid,
               success:function(res)
               {       
                    if(res)
                    {
                        $("#xaphuong").empty();
                        $("#xaphuong").append('<option>Chọn phường xã</option>');
                        $.each(res,function(key,value){
                            $("#xaphuong").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }
               }
    
            });
            // console.log(sid);
            }
        });
    </script>
    <script>
        $('#tinhthanh1').change(function(){
            var cit = $(this).val();
            if (cit) {
                $.ajax({
                    type: "get",
                    url: "{{url('/getQuanHuyen/')}}/"+cit,
                    success:function(res) {
                        if (res) {
                            $("#quanhuyen1").empty();
                            $("#xaphuong1").empty();
                            $("#quanhuyen1").append('<option value="" selected>Chọn quận huyện</option>');
                            $.each(res, function(key, value) {
                                $("#quanhuyen1").append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                    }
                });
                // console.log(cit);
            }
        });
    
        $('#quanhuyen1').change(function(){
            var sid = $(this).val();
            if(sid){
            $.ajax({
               type:"get",
               url:"{{url('getXaPhuong/')}}/"+sid,
               success:function(res)
               {       
                    if(res)
                    {
                        $("#xaphuong1").empty();
                        $("#xaphuong1").append('<option>Chọn phường xã</option>');
                        $.each(res,function(key,value){
                            $("#xaphuong1").append('<option value="'+key+'">'+value+'</option>');
                        });
                    }
               }
    
            });
            // console.log(sid);
            }
        });
    </script>
@endsection
