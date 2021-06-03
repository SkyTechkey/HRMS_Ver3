@extends('layouts.master')
<!-- # Nội dung tiêu đề -->
@section('title')
Danh sách nhân sự
@endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
@push('css-up')
<style class="">
    .row {
        margin-right: 0px !important;
    }

    .classimage_avatar {
        max-width: 100%;
        border-radius: 50%;
        width: 80px;
        height: 80px;
        opacity: 0.8;
        display: block;
        vertical-align: middle;
    }

    .ngaytao {
        font-size: 85%;
        font-weight: 500;
        opacity: 0.8;
    }

</style>
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

<!-- # Phần nội dung table-bordered -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Danh Sách Nhân Viên
                    <div style="float:right">

                        <button type="button" class="btn bg-brown waves-effect" data-toggle="modal"
                            data-target="#importModal"><i class="material-icons">publish</i>Nhập từ file</button>


                        <a href="{{route('export.nhansu')}}" class="btn btn-success waves-effect">
                            <i class="material-icons">download</i>
                            Xuất file</a>


                        <button type="button" class="btn btn-primary waves-effect" data-toggle="modal"
                            data-target="#myModal">
                            <i class="material-icons">add</i>
                            Thêm mới</button>

                    </div>
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr style="vertical-align: middle;">
                                <th style="width:30px">STT</th>
                                <th style="width:80px">Ảnh</th>
                                <th>Nhân Viên</th>
                                <th>Phòng Ban</th>
                                <th>Liên Hệ</th>
                                <th>Ngân Hàng</th>
                                <th>Hình Thức NV</th>
                                <th width="10%">Thao Tác</th>



                            </tr>
                        </thead>
                        <?php $i=1; ?>
                        <tbody>
                            @foreach($nhansu as $item)
                            <tr style="vertical-align: middle;">

                                <td style="vertical-align: middle;width:30px">
                                    <?php echo $i++;?>
                                </td>
                                <td style="width:80px"><img class="classimage_avatar"
                                        src="{{ asset('project_asset/images/image_users/'.$item->Hinhanh) }}"
                                        title="Huỳnh Tấn Phát  - Phòng Kỹ Thuật"></td>
                                <td>
                                    <span class="label label-primary">{{$item->username}}</span>
                                    <br />
                                    <span style="line-height: 2.0; ">
                                        <i class="fa fa-user"></i> {{$item->Hovaten}}
                                    </span>
                                    <br />
                                    <span class="ngaytao">
                                        <i class="fa fa-calendar" istooltip="" title="" dacaidat-hronline-tooltip="true"
                                            data-original-title="Ngày vào làm"></i>
                                        {{date('d/m/Y', strtotime($item->Ngayvaolam))}}
                                    </span>
                                </td>
                                <td>
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-building" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        {{$item->username}}
                                    </span>
                                    <br />
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-sitemap" istooltip="" title="" dacaidat-hronline-tooltip="true"
                                            data-original-title="Phòng Ban"></i> HRONLINE GROUP
                                    </span>
                                    <br />
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-address-book-o" aria-hidden="true" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true" data-original-title="Chức Danh"></i> Giám
                                        Đốc Nhân Sự
                                    </span>
                                    <br />
                                    @if($item->Trangthai=='danglamviec')
                                    <span class="label label-success">Đang làm việc</span>
                                    @elseif($item->Trangthai=='tamdungviec')
                                    <span class="label bg-orange">Tạm ngừng việc</span>
                                    @else
                                    <span class="label bg-red">Hết làm việc</span>
                                    @endif

                                </td>
                                <td>
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-phone" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        {{$item->Sodienthoai}}
                                    </span>
                                    <br />
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-envelope-o" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        {{$item->Email}}
                                    </span>
                                    <br />
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-barcode" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        {{$item->id}}
                                    </span>

                                </td>
                                <td>
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-bank" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        Ngân hàng TMCP Công Thương Việt Nam
                                    </span>
                                    <br />
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-credit-card-alt" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        100456586376
                                    </span>
                                </td>
                                <td>
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-graduation-cap" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        Đại học
                                    </span>
                                    <br />
                                    <span class="ngaytao" style="padding:0">
                                        <i class="fa fa-bookmark" istooltip="" title=""
                                            dacaidat-hronline-tooltip="true"></i>
                                        Full time
                                    </span>

                                </td>


                                <td>

                                    <a href="{{url('nhansu/sua/'.$item->id)}}">
                                        <i style="font-size:22px" class="material-icons  bg-light-green ">create</i></a>





                                    <a href="{{route('destroy.nhansu',$item->id)}}" class="button delete-confirm"><i
                                            style="font-size:22px"
                                            class="material-icons bg-brown">delete_forever</i></a>



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
@foreach($nhansu as $item)
<div class="modal fade" id="fix{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CẬP NHẬP NGOẠI NGỮ</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.nhansu',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Tenngoaingu">Chọn hình ảnh</label>
                        <div class="form-line">
                            <input type="file" class="form-control" id="hinhanh" name="hinhanh"
                                placeholder="Chọn hình ảnh" maxlength="255" required multiple />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Họ và tên</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="hovaten" name="hovaten" placeholder="Họ và tên"
                                maxlength="255" value="{{$item->Hovaten}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Username</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                maxlength="255" value="{{$item->username}}" />
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="Ghichu">Nhập mật khẩu</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu"
                                maxlength="255" />
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="Ghichu">Ngày vào làm</label>
                        <div class="form-line">
                            <input type="date" class="form-control" id="ngayvaolam" name="ngayvaolam"
                                placeholder="Ngày vào làm" maxlength="255" value="{{$item->Ngayvaolam}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Số điện thoại</label>
                        <div class="form-line">
                            <input type="number" class="form-control" id="sodienthoai" name="sodienthoai"
                                placeholder="Số điện thoại" maxlength="255" value="{{$item->Sodienthoai}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                maxlength="255" value="{{$item->Email}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Ghi chú"
                                maxlength="255" value="{{$item->Ghichu}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick" required>
                            <option value="">-- Vui lòng chọn trạng thái --</option>

                            <option value="danglamviec">Hoạt động</option>
                            <option value="tamdungviec">Tạm ngừng</option>
                            <option value="hetlamviec">Ngừng hoạt động</option>

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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI NHÂN SỰ</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.nhansu') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="Tenngoaingu">Chọn hình ảnh</label>
                        <div class="form-line">
                            <input type="file" class="form-control" id="hinhanh" name="hinhanh"
                                placeholder="Chọn hình ảnh" maxlength="255" required multiple />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Họ và tên</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="hovaten" name="hovaten" placeholder="Họ và tên"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Username</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Nhập mật khẩu</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Ngày vào làm</label>
                        <div class="form-line">
                            <input type="date" class="form-control" id="ngayvaolam" name="ngayvaolam"
                                placeholder="Ngày vào làm" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Số điện thoại</label>
                        <div class="form-line">
                            <input type="number" class="form-control" id="sodienthoai" name="sodienthoai"
                                placeholder="Số điện thoại" maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                        <div class="form-line">
                            <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Ghi chú"
                                maxlength="255" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Trangthai">Trạng thái</label>
                        <select name="status" class="form-control show-tick" required>
                            <option value="">-- Vui lòng chọn trạng thái --</option>

                            <option value="danglamviec">Hoạt động</option>
                            <option value="tamdungviec">Tạm ngừng</option>
                            <option value="hetlamviec">Ngừng hoạt động</option>

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
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI NGOẠI NGỮ</h4>
            </div>
            <div class="card bg-light mt-3">
                <div class="card-body">
                    <div class="body">
                        <p>- Tải file mẫu <a style="color: blue"
                                href="{{ asset('project_asset/template/templateImportDanhMucNgoaiNgu.xlsx')}}">Link</a>
                        </p>
                        <form action="{{ route('import.nhansu') }}" method="POST" enctype="multipart/form-data">
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
