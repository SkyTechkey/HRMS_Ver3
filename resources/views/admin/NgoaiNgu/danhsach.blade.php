@extends('layouts.master')
@section('title')
    Ngoại ngữ
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
    @if(session('success'))
        <div data-notify="container" class="bootstrap-notify-container alert alert-dismissible bg-black p-r-35 animated fadeInDown" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1031; top: 20px; right: 20px;">
            <button type="submit" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1033;">×</button>
            <span data-notify="message">{{session('success')}}</span>
        </div>
    @endif
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
        <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Danh Sách Dân Tộc
                                <div style="float:right" >
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#importModal">Nhập từ dữ liệu excel</button>
                                    <a href="{{url('xuat')}}" class="btn btn-info btn-lg">Xuất Danh Sách</a>
                                    <a href="{{url('xoahet')}}"  class="btn btn-info btn-lg button delete-all">Xóa Tất Cả</a>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm Ngoại Ngữ</button>
                                </div>
                            </h2>
                        </div>

                        <div  class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <?php $i=1; ?>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Ngoại Ngữ</th>
                                        <th>Tên Tín Chỉ</th>
                                        <th width="10%" >Chức Năng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ngoaingu as $item)
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>{{$item->ten_ngoai_ngu}}</td>
                                            <td>{{$item->ten_tin_chi}}</td>
                                            <td>
                                                <a href="{{url('xoangoaingu/'.$item->id)}}"  class="button delete-confirm"><i style="font-size:22px" class="material-icons">delete_forever</i></a>
                                                <a href =""  type="button" data-toggle="modal" data-target="#fix{{$item->id}}"><i style="font-size:22px" class="material-icons">edit_calendar</i><a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- Thêm ngoại ngữ -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style='color:#00b0e4' class="modal-title">Thêm Ngoại Ngữ</h4>
                                    </div>
                                    <div  class="body">
                                        <form action = "{{url('themngoaingu')}}" id="form_validation" method="POST">
                                            @csrf
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input  type="text" class="form-control" name="ten_ngoai_ngu" placeholder="Tên Ngoại Ngữ"  required>
                                                </div>
                                                <div class="form-line">
                                                    <input  type="text" class="form-control" name="ten_tin_chi" placeholder="Tên Tín Chỉ"  required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block waves-effect" data-placement-from="top" data-placement-align="right"
                                                    data-animate-enter="" data-animate-exit="" data-color-name="bg-black">
                                                CHẤP NHẬN
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Sửa ngoại ngữ -->
                        @foreach($ngoaingu as $item)
                            <div class="modal fade" id="fix{{$item->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 style='color:#00b0e4' class="modal-title">Sửa Ngoại Ngữ</h4>
                                        </div>
                                        <div  class="body">
                                            <form action = "{{url('suangoaingu/'.$item->id)}}" id="form_validation" method="POST">
                                                @csrf
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input  type="text" class="form-control" name="ten_ngoai_ngu" value="{{$item->ten_ngoai_ngu}}" placeholder="Tên Ngoại Ngữ"  required>
                                                    </div>
                                                    <div class="form-line">
                                                        <input  type="text" class="form-control" name="ten_tin_chi" value="{{$item->ten_tin_chi}}" placeholder="Tên Tín Chỉ"  required>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block waves-effect" data-placement-from="top" data-placement-align="right"
                                                        data-animate-enter="" data-animate-exit="" data-color-name="bg-black">
                                                    CHẤP NHẬN
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                        <!-- Import Excel -->
                        <div class="modal fade" id="importModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style='color:#00b0e4' class="modal-title">Nhập dữ liệu Excel</h4>
                                    </div>
                                    <div class="card bg-light mt-3">
                                        <div class="card-body">
                                            <form action="{{ url('nhap') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="file" class="form-control">
                                                <br>
                                                <button style="margin-bottom:10px; margin-left:10px" class="btn btn-success">Import</button>
                                            </form>
                                        </div>
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
    <script async src="https://www.google-analytics.com/analytics.js"></script>
    <script src="{{ asset('project_asset/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>


    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('project_asset/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('project_asset/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>


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
    <script src="{{ asset('project_asset/js/pages/ui/notifications.js')}}"></script>
    <script src="{{ asset('project_asset/js/demo.js')}}"></script>
    <script src="{{ asset('project_asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Xóa dân tộc',
                text: 'Bạn có thực sự muốn tên dân tộc này?',
                icon: 'warning',
                buttons: ["Hủy", "Đồng ý!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
        $('.delete-all').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Xóa tất cả',
                text: 'Bạn có thực sự muốn xóa tất cả danh sách này?',
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