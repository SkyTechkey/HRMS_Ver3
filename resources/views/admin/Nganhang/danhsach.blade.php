@extends('layouts.master')
@section('title')
    Ngân hàng
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
                                Danh Sách Ngân Hàng Công Ty SkyTech
                                <div style="float:right" >
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Ngân Hàng</button>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Import">Import</button>
                                    <a href="{{url('xuat')}}" class="btn btn-info btn-lg">Export</a>
                                </div>
                            </h2>
                        </div>

                        <div  class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Ngân Hàng</th>
                                            <th>Chi Nhánh</th>
                                            <th width="10%" >Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1; ?>
                                    <tbody>
                                    @foreach($nganhang as $item)
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>{{$item->Tennganhang}}</td>
                                            <td>{{$item->Diachi}}</td>
                                            <td>
                                                <a href="{{url('nganhang/xoa/'.$item->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                                <a href =""  type="button" data-toggle="modal" data-target="#fix{{$item->id}}"><i style="font-size:22px" class="material-icons">edit_calendar</i><a>
                                            </td>
                                        </tr>

                                        <!-- Sửa -->
                                        <div class="modal fade" id="fix{{$item->id}}" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 style='color:#00b0e4' class="modal-title">Sửa Phòng Ban {{$item->Tennganhang}}</h4>
                                                    </div>
                                                    <div  class="body">
                                                        <form action = "{{url('nganhang/sua/'.$item->id)}}" id="form_validation" method="POST">
                                                            @csrf
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <input  type="text" class="form-control" name="tennganhang" value ="{{$item->Tennganhang}}"  required>
                                                                </div>
                                                                <div class="form-line">
                                                                    <input  type="text" class="form-control" name="diachi" value ="{{$item->Diachi}}"  required>
                                                                </div>
                                                            </div>
                                                            <!-- Default radio -->
{{--                                                            <div class="demo-radio-button">--}}
{{--                                                                <input value = "active" name="group1" type="radio" id="radio_3" checked />--}}
{{--                                                                <label name for="radio_3">Hoạt động</label>--}}
{{--                                                                <input value = "close" name="group1" type="radio" id="radio_4" />--}}
{{--                                                                <label name for="radio_4">Tạm ngừng</label>--}}
{{--                                                            </div>--}}
                                                            <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Thêm phòng ban Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style='color:#00b0e4' class="modal-title">Thêm ngân hàng</h4>
                                    </div>
                                    <div  class="body">
                                        <form action = "{{url('nganhang/them')}}" id="form_validation" method="POST">
                                            @csrf
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input  type="text" class="form-control" name="tennganhang" placeholder="Tên ngân hàng"  required>
                                                </div>
                                                <div class="form-line">
                                                    <input  type="text" class="form-control" name="diachi" placeholder="Tên chi nhánh"  required>
                                                </div>
                                            </div>
                                            <!-- Default radio -->
{{--                                            <div class="demo-radio-button">--}}
{{--                                                <input value = "active" name="group1" type="radio" id="radio_1" checked />--}}
{{--                                                <label name for="radio_1">Hoạt động</label>--}}
{{--                                                <input value = "close" name="group1" type="radio" id="radio_2" />--}}
{{--                                                <label name for="radio_2">Tạm ngừng</label>--}}
{{--                                            </div>--}}
                                            <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--Import--}}
                        <div class="modal fade" id="Import" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style='color:#00b0e4' class="modal-title">Thêm ngân hàng</h4>
                                    </div>
                                    <div  class="body">
                                        <form action = "{{url('nhap')}}" id="form_validation" method="POST">
                                            @csrf
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" name="file" required>
                                                </div>
                                            </div>
                                            <!-- Default radio -->
                                            {{--<div class="demo-radio-button">--}}
                                            {{--<input value = "active" name="group1" type="radio" id="radio_1" checked />--}}
                                            {{--<label name for="radio_1">Hoạt động</label>--}}
                                            {{--<input value = "close" name="group1" type="radio" id="radio_2" />--}}
                                            {{--<label name for="radio_2">Tạm ngừng</label>--}}
                                            {{--</div>--}}
                                            <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </div>
                </div>
            </div>

        </div>
    </section>
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

    <!-- Custom Js -->
    <script src="{{ asset('project_asset/js/admin.js')}}"></script>
    <script src="{{ asset('project_asset/js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('project_asset/js/demo.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Xóa phòng ban',
                text: 'Bạn có thực sự muốn xóa phòng ban này?',
                icon: 'warning',
                buttons: ["Hủy", "Đồng ý!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>

@endsection
@endsection
