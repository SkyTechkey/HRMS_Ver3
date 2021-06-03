@extends('Settings.settings')
<!-- # Nội dung tiêu đề -->
@section('title')
Quản lý khóa đào tạo
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
                    Danh Sách Khóa Đào Tạo
                    <div style="float:right">
                        @can('Import.KhoaDaoTao')
                        <button type="button" class="btn bg-brown waves-effect" data-toggle="modal"
                            data-target="#importModal"><i class="material-icons">publish</i>Nhập từ file</button>
                        @endcan
                        @can('Export.KhoaDaoTao')
                        <a href="{{route('quanlykhoadaotao.export')}}" class="btn btn-success waves-effect">
                            <i class="material-icons">download</i>
                            Xuất file</a>
                        @endcan
                        @can('Create.KhoaDaoTao')
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
                                <th>Mã KDT</th>
                                <th>Tên Khóa Đào Tạo</th>
                                <th>Người Lập</th>
                                <th>Hình Thức</th>
                                <th>Kỹ Năng Đào Tạo</th>
                                <th>Nội Dung</th>
                                <th>Trạng Thái</th>
                                <th>Ghi Chú</th>
                                <th width="10%">Chức Năng</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$value->id}}</td>
                                <td>{{$value->Ten_khoadaotao}}</td>
                                <td>{{$value->nhanvien->Hovaten}}</td>
                                <td>{{$value->Hinhthuc_khoadaotao}}</td>
                                <td>{{$value->Kynang_khoadaotao}}</td>
                                <td>{{$value->Noidung}}</td>

                                @if($value->Trangthai=='Đã duyệt')
                                <td><span class="label bg-blue">Đã duyệt</span></td>
                                @elseif($value->Trangthai=='Chờ duyệt')
                                <td><span class="label bg-orange">Chờ duyệt</span></td>
                                @else
                                <td><span class="label bg-red">Không duyệt</span></td>
                                @endif
                                <td>{{$value->Ghichu}}</td>
                                <td>
                                    @can('Edit.KhoaDaoTao')
                                    <a href="" type="button" data-toggle="modal" data-target="#fix{{$value->id}}">
                                        <i style="font-size:22px" class="material-icons  bg-light-green ">create</i></a>
                                    @endcan
                                    @can('Delete.KhoaDaoTao')
                                    <a href="{{route('quanlykhoadaotao.delete',$value->id)}}"
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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CẬP NHẬP KHÓA ĐÀO TẠO</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('quanlykhoadaotao.edit',$value->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="Tenkhoadaotao">Tên khóa đào tạo</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Ten_khoadaotao}}" class="form-control"
                                id="Tenkhoadaotao" name="name" placeholder="Tên khóa đào tạo" maxlength="255"
                                required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Kynangkhoadaotao">Kỹ năng đào tạo</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Kynang_khoadaotao}}" class="form-control"
                                id="Kynangkhoadaotao" name="kynang" placeholder="Tên khóa đào tạo" maxlength="255"
                                required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Quydinhkhoadaotao">Quy định đào tạo</label>
                        <select name="quydinh" class="form-control show-tick">
                            <option value="{{$value->Quydinh_khoadaotao}}">-- {{$value->Quydinh_khoadaotao}} --</option>

                            <option value="Bắt buộc">Bắt buộc</option>
                            <option value="Không bắt buộc">Không bắt buộc</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Hinhthuckhoadaotao">Hình thức đào tạo</label>
                        <select name="hinhthuc" class="form-control show-tick">
                            <option value="{{$value->Hinhthuc_khoadaotao}}">-- {{$value->Hinhthuc_khoadaotao}} --
                            </option>

                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Doituongkhoadaotao">Đối tượng đào tạo</label>
                        <select name="doituong" class="form-control show-tick">
                            <option value="{{$value->Doituong_khoadaotao}}">-- {{$value->Doituong_khoadaotao}} --
                            </option>

                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Ứng viên">Ứng viên</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nhanvien">Nhân viên</label>
                        <select name="iduser" class="form-control show-tick">
                            <option value="{{$value->ID_nhanvien}}">-- {{$value->nhanvien->Hovaten}} --
                            </option>
                            @foreach($danhsach_nhanvien as $nv)
                            <option value="{{$value->id}}">{{$nv->Hovaten}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Phongban">Phòng ban</label>
                        <select name="phongban" class="form-control show-tick">
                            <option value="Phòng abc">-- Phòng abc --
                            </option>

                            <option value="Phòng xyz">Phòng xyz</option>
                            <option value="Phòng xxx">Phòng xxx</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Chucvu">Chức vụ</label>
                        <select name="chucvu" class="form-control show-tick">
                            <option value="Giám đốc A">-- Giám đốc A --
                            </option>

                            <option value="Giám đốc B">Giám đốc B</option>
                            <option value="Giám đốc C">Giám đốc C</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Sobuoidaotao">Số buổi đào tạo</label>
                        <div class="form-line">
                            <input type="number" value="{{$value->Sobuoi_khoadatao}}" class="form-control" id="Ghichu"
                                name="sobuoi" placeholder="Ghi chú" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Noidung">Nội dung</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Noidung}}" class="form-control" id="Noidung"
                                name="noidung" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Muctieu">Mục tiêu</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Muctieu}}" class="form-control" id="Muctieu"
                                name="muctieu" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                        <div class="form-line">
                            <input type="text" value="{{$value->Ghichu}}" class="form-control" id="Ghichu" name="Ghichu"
                                placeholder="Ghi chú" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick">
                            <option value="{{$value->Trangthai}}">-- {{$value->Trangthai}} --
                            </option>

                            <option value="Chờ duyệt">Chờ duyệt</option>
                            <option value="Đã duyệt">Đã duyệt</option>
                            <option value="Không duyệt">Không duyệt</option>

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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI KHÓA ĐÀO TẠO</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('quanlykhoadaotao.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="Tenkhoadaotao">Tên khóa đào tạo</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Tenkhoadaotao" name="name"
                                placeholder="Tên khóa đào tạo" maxlength="255" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Kynangkhoadaotao">Kỹ năng đào tạo</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Kynangkhoadaotao" name="kynang"
                                placeholder="Tên khóa đào tạo" maxlength="255" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Quydinhkhoadaotao">Quy định đào tạo</label>
                        <select name="quydinh" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn quy định --</option>

                            <option value="Bắt buộc">Bắt buộc</option>
                            <option value="Không bắt buộc">Không bắt buộc</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Hinhthuckhoadaotao">Hình thức đào tạo</label>
                        <select name="hinhthuc" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn hình thức --
                            </option>

                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="Doituongkhoadaotao">Đối tượng đào tạo</label>
                        <select name="doituong" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn đối tượng --
                            </option>

                            <option value="Nhân viên">Nhân viên</option>
                            <option value="Ứng viên">Ứng viên</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nhanvien">Nhân viên</label>
                        <select name="iduser" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn nhân viên --</option>
                            @foreach($danhsach_nhanvien as $nv)
                            <option value="{{$nv->id}}">{{$nv->Hovaten}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Phongban">Phòng ban</label>
                        <select name="phongban" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn phòng ban --
                            </option>

                            <option value="Phòng xyz">Phòng xyz</option>
                            <option value="Phòng xxx">Phòng xxx</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Chucvu">Chức vụ</label>
                        <select name="chucvu" class="form-control show-tick">
                            <option value="">--Vui lòng chọn chức vụ --
                            </option>

                            <option value="Giám đốc B">Giám đốc B</option>
                            <option value="Giám đốc C">Giám đốc C</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Sobuoidaotao">Số buổi đào tạo</label>
                        <div class="form-line">
                            <input type="number" class="form-control" id="Ghichu" name="sobuoi" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Noidung">Nội dung</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Noidung" name="noidung" placeholder="Nội dung"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Muctieu">Mục tiêu</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Muctieu" name="muctieu" placeholder="Mục tiêu"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="Ghichu" name="Ghichu" placeholder="Ghi chú"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick">
                            <option value="">-- Vui lòng chọn trạng thái --
                            </option>

                            <option value="Chờ duyệt">Chờ duyệt</option>
                            <option value="Đã duyệt">Đã duyệt</option>
                            <option value="Không duyệt">Không duyệt</option>

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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI TỈNH/THÀNH PHỐ</h4>
            </div>
            <div class="card bg-light mt-3">
                <div class="card-body">
                    <div class="body">
                        <p>- Tải file mẫu <a style="color: blue"
                                href="{{ asset('project_asset/template/templateImportDanhMucTinhThanhPho.xlsx')}}">Link</a>
                        </p>
                        <form action="{{ route('quanlykhoadaotao.import') }}" method="POST"
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
