@extends('layouts.master')
<!-- # Nội dung tiêu đề -->
@section('title')
Quản lý phòng ban
@endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
@push('css-up')
<link href="{{ asset('project_asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('project_asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('project_asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />

<link href="{{ asset('project_asset/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<!-- JQuery DataTable Css -->
<link href="{{ asset('project_asset/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}"
    rel="stylesheet">

<!-- Custom Css -->
<link href="{{ asset('project_asset/css/style.css')}}" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('project_asset/css/themes/all-themes.css')}}" rel="stylesheet" />
@endpush

@push('head-script')
@endpush
<!-- #END Nội dung CSS, js -->
@section('content')
<!-- #NOTIFICATIONS -->
@if(session('success'))
<div data-notify="container" id="slice-alert"
    class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert"
    data-notify-position="bottom-left"
    style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">
    <span data-notify="icon">
    </span> <span data-notify="title"></span>
    </span> <span data-notify="message">{{session('success')}}</span><a href="#" target="_blank" data-notify="url"></a>
</div>
@elseif(session('error'))
<div data-notify="container" id="slice-alert"
    class="bootstrap-notify-container alert alert-dismissible alert-warning p-r-35 animated fadeInDown" role="alert"
    data-notify-position="bottom-left"
    style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">
    <span data-notify="icon">
    </span> <span data-notify="title"></span>
    </span> <span data-notify="message">{{session('error')}}</span><a href="#" target="_blank" data-notify="url"></a>
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
<!-- #END Thongbao -->

<div class="block-header">
    <h2>Tổng Quát</h2>
</div>

<!-- # Phần nội dung -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            <div class="header">

                <h2>
                    Danh Sách Quản Lý Phòng Ban
                    <div style="float:right">
                        @can('Import.PhongBan')
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#importModal">Nhập từ dữ liệu excel</button>
                        @endcan
                        @can('Export.PhongBan')
                        <a href="{{route('phongban.export')}}" class="btn btn-info btn-lg">Xuất
                            Danh
                            Sách</a>
                        @endcan

                        @can('Create.PhongBan')
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tạo
                            Mới</button>
                        @endcan
                    </div>
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>Mã Phòng Ban</th>
                                <th>Tên Phòng Ban</th>
                                <th>Chi Nhánh</th>
                                <th>Trạng Thái</th>
                                <th width="10%">Chức Năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $value)
                            <tr>

                                <td>{{$value->id}}</td>
                                <td>{{$value->Ten_phongban}}</td>
                                <td>{{$value->Chinhanh}}</td>
                                <td>{{$value->Trangthai}}</td>
                                <td>
                                    @can('Delete.PhongBan')
                                    <a href="{{route('phongban.delete',$value->id)}}" class="button delete-confirm"><i
                                            style="font-size:22px" class="material-icons">delete_forever</i></a>
                                    @endcan

                                    @can('Edit.PhongBan')
                                    <a href="" type="button" data-toggle="modal" data-target="#fix{{$value->id}}"><i
                                            style="font-size:22px" class="material-icons">edit_calendar</i><a>
                                            @endcan
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
<!-- Sửa modal -->
@foreach($danhsach as $value)
<div class="modal fade" id="fix{{$value->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CẬP NHẬP PHÒNG BAN</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('phongban.edit',$value->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="Tenphongban">Tên phòng ban</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Ten_phongban}}" class="form-control" id="Tenphongban"
                                name="name" placeholder="Tên phòng ban" maxlength="255" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Luong">Chi Nhánh</label>
                        <select name="chinhanh" class="form-control show-tick">
                            <option value="{{$value->Chinhanh}}">-- {{$value->Chinhanh}} --</option>

                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Vinh">Vinh</option>
                            <option value="Sài Gòn">Sài Gòn</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick">
                            <option value="{{$value->Trangthai}}">-- {{$value->Trangthai}} --</option>

                            <option value="Hoạt động">Hoạt động</option>
                            <option value="Tạm ngừng">Tạm ngừng</option>
                            <option value="Ngừng hoạt động">Ngừng hoạt động</option>

                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">Lưu</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- #Thêm mới Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI PHÒNG BAN</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('phongban.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="Tenphongban">Tên phòng ban</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Tenphongban" name="name"
                                placeholder="Tên phòng ban" maxlength="255" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Luong">Chi Nhánh</label>
                        <select name="chinhanh" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn chi nhánh --</option>

                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Vinh">Vinh</option>
                            <option value="Sài Gòn">Sài Gòn</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn trạng thái --</option>

                            <option value="Hoạt động">Hoạt động</option>
                            <option value="Tạm ngừng">Tạm ngừng</option>
                            <option value="Ngừng hoạt động">Ngừng hoạt động</option>

                        </select>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">Lưu</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Đóng</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Import -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI PHÒNG BAN</h4>
            </div>
            <div class="card bg-light mt-3">
                <div class="card-body">
                    <form action="{{ route('phongban.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button style="margin-bottom:10px; margin-left:10px" class="btn btn-success">Import</button>


                    </form>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>

@endsection
<!-- # js footer-->
@push('footer-script')
<!-- # Model hỏi xóa -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Xóa dữ liệu',
            text: 'Bạn có thực sự muốn xóa dữ liệu này?',
            icon: 'warning',
            buttons: ["Hủy", "Đồng ý!"],
        }).then(function (value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
<!-- #END MODEL -->
<!-- #JS load thông báo -->
<script type="text/javascript">
    $("#slice-alert").delay(4000).slideUp(200, function () {
        $(this).alert('close');
    });
</script>
<!-- #END js load thông báo -->
@endpush
<!-- #END js -->
