@extends('Settings.settings')
<!-- # Nội dung tiêu đề -->
@section('title')
Quản lý xã phường
@endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
@push('css-up')
<style class="">
    .row {
        margin-right: 0px !important;
    }

</style>
@endpush

@push('head-script')


@endpush
<!-- #END Nội dung CSS, js -->
@section('content_menu')
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

<!-- # Phần nội dung table-bordered -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            <div class="header">
                <h2>
                    Danh Sách Xã Phường
                    <div style="float:right">
                        @can('Import.TinhThanh')
                        <button type="button" class="btn bg-brown waves-effect" data-toggle="modal"
                            data-target="#importModal"><i class="material-icons">publish</i>Nhập từ file</button>
                        @endcan
                        @can('Export.TinhThanh')
                        <a href="{{route('quanlyxaphuong.export')}}" class="btn btn-success waves-effect">
                            <i class="material-icons">download</i>
                            Xuất file</a>
                        @endcan
                        @can('Create.TinhThanh')
                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal"
                            data-target="#myModal">
                            <i class="material-icons">add</i>
                            Thêm mới</button>
                        @endcan
                    </div>
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã XP</th>
                                <th>Tên Xã Phường</th>
                                <th>Tên Quận Huyện</th>
                                <th>Trạng thái</th>
                                <th>Ghi chú</th>
                                <th width="10%">Chức Năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$value->id}}</td>
                                <td>{{$value->Ten_xaphuong}}</td>

                                <td>{{$value->tenquanhuyen->Ten_quanhuyen}}</td>

                                @if($value->Trangthai=='Hoạt động')
                                <td><span class="label bg-blue">Hoạt động</span></td>
                                @elseif($value->Trangthai=='Tạm ngừng')
                                <td><span class="label bg-orange">Tạm ngừng</span></td>
                                @else
                                <td><span class="label bg-red">Ngừng hoạt động</span></td>
                                @endif
                                <td>{{$value->Ghichu}}</td>
                                <td>
                                    @can('Edit.TinhThanh')
                                    <a href="" type="button" data-toggle="modal" data-target="#fix{{$value->id}}">
                                        <i style="font-size:22px" class="material-icons  bg-light-green ">create</i></a>
                                    @endcan
                                    @can('Delete.TinhThanh')
                                    <a href="{{route('quanlyxaphuong.delete',$value->id)}}"
                                        class="button delete-confirm"><i style="font-size:22px"
                                            class="material-icons bg-brown">delete_forever</i></a>
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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CẬP NHẬP XÃ PHƯỜNG</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('quanlyxaphuong.edit',$value->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="Tenxaphuong">Tên xã phường</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Ten_xaphuong}}" class="form-control" id="Tenxaphuong"
                                name="name" placeholder="Tên xã phường" maxlength="255" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Tenquanhuyen">Tên quận huyện</label>
                        <select name="quanhuyen" class="form-control show-tick" required>
                            <option value="{{$value->ID_quanhuyen}}">--
                                {{$value->tenquanhuyen->Ten_quanhuyen}}
                                --
                            </option>
                            @foreach($danhsach_quanhuyen as $value)
                            <option value="{{$value->id}}">{{$value->Ten_quanhuyen}}</option>
                            @endforeach

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

                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Ghichu}}" class="form-control" id="Ghichu" name="Ghichu"
                                placeholder="Ghi chú" maxlength="255" />
                        </div>
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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI TỈNH/THÀNH PHỐ</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('quanlyxaphuong.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="Tenxaphuong">Tên xã phường</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Tenxaphuong" name="name"
                                placeholder="Tên xã phường" maxlength="255" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Tenquanhuyen">Tên quận huyện</label>
                        <select name="quanhuyen" class="form-control show-tick" required>
                            <option value="">--Vui lòng chọn quận/huyện--</option>
                            @foreach($danhsach_quanhuyen as $value)
                            <option value="{{$value->id}}">{{$value->Ten_quanhuyen}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick">
                            <option value="Hoạt động">Hoạt động</option>
                            <option value="Tạm ngừng">Tạm ngừng</option>
                            <option value="Ngừng hoạt động">Ngừng hoạt động</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Ghichu" name="Ghichu" placeholder="Ghi chú"
                                maxlength="255" />
                        </div>
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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI XÃ PHƯỜNG</h4>
            </div>
            <div class="card bg-light mt-3">
                <div class="card-body">
                    <div class="body">
                        <p>- Tải file mẫu <a style="color: blue"
                                href="{{ asset('project_asset/template/templateImportDanhMucXaPhuong.xlsx')}}">Link</a>
                        </p>
                        <form action="{{ route('quanlyquanhuyen.import') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button style="margin-bottom:10px; margin-left:10px" class="btn btn-success">Import</button>
                        </form>
                    </div>
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
