@extends('layouts.master')
@section('title')
    Danh sách nhân viên công ty
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
                                    <a class="btn btn-info btn-lg" href="{{url('/themnhanvien')}}">Thêm Nhân Viên</a>
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
                                        <th>Hình ảnh</th>
                                        <th>ID NV</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Họ và tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Ngày vào làm</th>
                                        <th>Nơi làm việc</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                    </thead>
                                    <?php $i = 1; ?>
                                    <tbody>
                                        @foreach($nhanvien as $item)
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><img src="project_asset/images/image_data/{{$item->Hinhanh}}" width="100px"></td>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->username}}</td>
                                                    <td>{{$item->Hovaten}}</td>
                                                    <td>{{$item->Ngaysinh}}</td>
                                                    <td>{{$item->Ngayvaolam}}</td>
                                                    <td>{{$item->Tenchinhanh}}</td>
                                                    <td>{{$item->Trangthai}}</td>
                                                    <td>
                                                        <a href="{{url('nhanvien/xoa/'.$item->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                                        <a href ="" data-toggle="modal" data-target="#fix{{$item->id}}">
                                                            <i style="font-size:22px" class="material-icons">edit_calendar</i>
                                                            <a>
                                                    </td>
                                                </tr>
                                        @endforeach

                                    <!-- Sửa -->
                                        @include('admin.Nhanvien.suanhanvien')
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Thêm  -->
                        @include('admin.Nhanvien.themnhanvien');

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
                                        <form action = "{{url('nhap')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" name="file" required>
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
    <script src="{{ asset('project_asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>


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
