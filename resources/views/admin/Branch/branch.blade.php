@extends('Settings.settings')

@section('title')
    Chi nhánh
@endsection

@section('css')
    <!-- Bootstrap Core Css -->
    <link href="{{asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{asset('project_asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('project_asset/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />
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
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h4>
                                DANH SÁCH CHI NHÁNH
                                <div style="float:right" >
                                    <a href = "{{url('add-branch')}}" class="btn btn-primary waves-effect" type="submit">Thêm Chi Nhánh</a>
                                </div>
                            </h4>

                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th width="5%">STT</th>
                                        <th>Tên chi nhánh</th>
                                        <th>Hình ảnh</th>
                                        <th>Giám đốc</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th width="10%">Chức năng</th>
                                    </tr>
                                    </thead>
                                    @php
                                    $i=1
                                    @endphp
                                    @foreach($branch as $item)
                                        <tr>
                                            <td>@php echo $i; $i++; @endphp</td>
                                            <td>{{$item->name_branch}}</td>
                                            <td><img src="{{ asset('project_asset/images/image_branch/'.$item->image_branch) }}" height="150px" width="250px"></td>
                                            <td>{{$item->director_branch}}</td>
                                            <td>{{$item->email_branch}}</td>
                                            <td>{{$item->phone_branch}}</td>
                                            <td>{{$item->local_branch}}</td>
                                            <td>
                                                <a  href ="{{url('/delete/'.$item->id)}}" class="button delete-confirm" ><i style="font-size:22px" class="material-icons">delete_forever</i><a>
                                                <a href ="{{url('/update/'.$item->id)}}" ><i style="font-size:25px" class="material-icons">edit_calendar</i><a>

                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
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

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('project_asset/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('project_asset/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('project_asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('project_asset/js/admin.js')}}"></script>
    <script src="{{asset('project_asset/js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('project_asset/js/demo.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Xóa chi nhánh',
                text: 'Bạn có thực sự muốn xóa chi nhánh này?',
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
