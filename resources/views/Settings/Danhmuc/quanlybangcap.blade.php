@extends('Settings.settings')
<!-- # Nội dung tiêu đề -->
@section('title')
Quản lý Bằng cấp
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
                    Danh Sách Tỉnh/Thành Phố
                    <div style="float:right">
                        @can('Import.TinhThanh')
                        <button type="button" class="btn bg-brown waves-effect" data-toggle="modal"
                            data-target="#importModal"><i class="material-icons">publish</i>Nhập từ file</button>
                        @endcan
                        @can('Export.TinhThanh')
                        <a href="{{route('bangcap.export')}}" class="btn btn-success waves-effect">
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
                                <th>Username</th>
                                <th>Bằng cấp</th>
                                <th>Trình độ chuyên môn</th>
                                <th>Nơi tốt nghiệp</th>
                                <th>Năm tốt nghiệp</th>
                                {{-- <th width="8%">Đính kèm</th> --}}
                                <th>Trạng thái</th>
                                <th width="10%">Chức Năng</th>

                            </tr>
                        </thead>
                        <?php $i=1; ?>
                        <tbody>
                            @foreach($hosobangcap as $item)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>{{$item->Username->Hovaten}}</td>
                                <td>{{$item->loaibangcap->Ten_bangcap}}</td>
                                <td>{{$item->loaitrinhdochuyenmon->Ten_Trinhdochuyenmon}}</td>
                                <td>{{$item->Noitotnghiep}}</td>
                                <td>{{$item->Namtotnghiep}}</td>
                                {{-- <td><i class="material-icons">attachment</i></td> --}}
                                @if($item->Trangthai=='Đã duyệt')
                                <td><span class="label bg-blue">Đã duyệt</span></td>
                                @elseif($item->Trangthai=='Đang duyệt')
                                <td><span class="label bg-orange">Đang duyệt</span></td>
                                @else
                                <td><span class="label bg-red">Đang chờ duyệt</span></td>
                                @endif
                                <td>
                                    {{-- @can('Edit.TinhThanh') --}}
                                    <a href="" type="button" data-toggle="modal" data-target="#fix{{$item->id}}">
                                        <i style="font-size:22px" class="material-icons  bg-light-green ">create</i></a>
                                    {{-- @endcan --}}
                                    {{-- @can('Delete.TinhThanh') --}}
                                    <a href="{{route('bangcap.destroy',$item->id)}}"
                                        class="button delete-confirm"><i style="font-size:22px"
                                            class="material-icons bg-brown">delete_forever</i></a>
                                    {{-- @endcan --}}
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
@foreach($hosobangcap as $item)
<div class="modal fade" id="fix{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CẬP NHẬP BẰNG CẤP</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('bangcap.edit',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Username">Username</label>
                        <select name="username" class="form-control show-tick">
                            <option value="" selected >-- Username --</option>
                            @foreach ($nguoidung as $item)
                            <option value="{{$item->id}}">{{$item->Hovaten}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Bangcap">Bằng cấp</label>
                        <select name="bangcap" class="form-control show-tick">
                            <option value="" selected>-- Chọn bằng cấp --</option>
                            @foreach ($loaibangcap as $item)
                            <option value="{{$item->id}}">{{$item->Ten_bangcap}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Trinhdochuyenmon">Trình độ chuyên môn</label>
                        <select name="trinhdochuyenmon" class="form-control show-tick">
                            <option value="" selected>-- Chọn trình độ chuyên môn --</option>
                            @foreach ($loaitrinhdochuyenmon as $item)
                            <option value="{{$item->id}}">{{$item->Ten_Trinhdochuyenmon}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="Noitotnghiep">Nơi tốt nghiệp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="noitotnghiep" name="noitotnghiep"
                                    value="{{$item->Noitotnghiep}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Namtotnghiep">Năm tốt nghiệp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="namtotnghiep" name="namtotnghiep"
                                    value="{{$item->Namtotnghiep}}" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="Ghichu">Ghi chú</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="ghichu" name="ghichu"
                                    value="{{$item->Ghichu}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="file">Đính kèm</label>
                            <div class="form-line">
                                <input type="file" class="form-control" id="file" name="file" maxlength="255" required multiple/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="trangthai" class="form-control show-tick">
                            <option value="" selected>-- Chọn trạng thái --</option>
                            <option value="Đã duyệt">Đã duyệt</option>
                            <option value="Đang duyệt">Đang duyệt</option>
                            <option value="Đang chờ duyệt">Đang chờ duyệt</option>
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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI BẰNG CẤP</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('bangcap.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Username">Username</label>
                        <select name="username" class="form-control show-tick">
                            <option value="" selected>-- Chọn người dùng --</option>
                            @foreach ($nguoidung as $item)
                            <option value="{{$item->id}}">{{$item->Hovaten}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Bangcap">Bằng cấp</label>
                        <select name="bangcap" class="form-control show-tick">
                            <option value="" selected>-- Chọn bằng cấp --</option>
                            @foreach ($loaibangcap as $item)
                            <option value="{{$item->id}}">{{$item->Ten_bangcap}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Trinhdochuyenmon">Trình độ chuyên môn</label>
                        <select name="trinhdochuyenmon" class="form-control show-tick">
                            <option value="" selected>-- Chọn trình độ chuyên môn --</option>
                            @foreach ($loaitrinhdochuyenmon as $item)
                            <option value="{{$item->id}}">{{$item->Ten_Trinhdochuyenmon}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="Noitotnghiep">Nơi tốt nghiệp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="noitotnghiep" name="noitotnghiep"
                                    placeholder="Nơi tốt nghiệp" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="Namtotnghiep">Năm tốt nghiệp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="namtotnghiep" name="namtotnghiep"
                                    placeholder="Năm tốt nghiêp" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="Ghichu">Ghi chú</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="ghichu" name="ghichu"
                                    placeholder="Ghi chú" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="file">Đính kèm</label>
                            <div class="form-line">
                                <input type="file" class="form-control" id="file" name="file" maxlength="255" required multiple/>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="trangthai" class="form-control show-tick">
                            <option value="" selected>-- Chọn trạng thái --</option>
                            <option value="Đã duyệt">Đã duyệt</option>
                            <option value="Đang duyệt">Đang duyệt</option>
                            <option value="Đang chờ duyệt">Đang chờ duyệt</option>
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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI BẰNG CẤP</h4>
            </div>
            <div class="card bg-light mt-3">
                <div class="card-body">
                    <div class="body">
                        <p>- Tải file mẫu <a style="color: blue"
                                href="{{ asset('project_asset/template/templateImportDanhMucTinhThanhPho.xlsx')}}">Link</a>
                        </p>
                        <form action="{{ route('bangcap.import') }}" method="POST"
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
