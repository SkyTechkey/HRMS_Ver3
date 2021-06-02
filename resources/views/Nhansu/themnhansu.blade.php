@extends('Settings.settings')
<!-- # Nội dung tiêu đề -->
@section('title')
Thêm nhân sự
@endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
@push('css-up')
<style class="">
    .row{
        margin-right:0px!important;
    }
</style>
@endpush

@push('head-script')


@endpush
<!-- #END Nội dung CSS, js -->
@section('content_menu')
    <!-- #NOTIFICATIONS -->
    @if(session('success'))
       <!-- <div data-notify="container" id="slice-alert"
            class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert"
            data-notify-position="bottom-left"
            style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">
            <span data-notify="icon">
            </span> <span data-notify="title"></span>
            </span> <span data-notify="message">{{session('success')}}</span><a href="#" target="_blank" data-notify="url"></a>
        </div>
    -->

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
    <div class="row clearfix" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Thêm nhân sự
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">THÊM MỚI NHÂN SỰ</h4>
                                    </div> --}}
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
                                                        maxlength="255"  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ghichu">Username</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                                                        maxlength="255"  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ghichu">Nhập mật khẩu</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="Mật khẩu"
                                                        maxlength="255"  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ghichu">Ngày vào làm</label>
                                                <div class="form-line">
                                                    <input type="date" class="form-control" id="ngayvaolam" name="ngayvaolam" placeholder="Ngày vào làm"
                                                        maxlength="255"  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ghichu">Số điện thoại</label>
                                                <div class="form-line">
                                                    <input type="number" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại"
                                                        maxlength="255"  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                                        maxlength="255"  />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Ghichu">Ghi chú</label>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="ghichu" name="ghichu" placeholder="Ghi chú"
                                                        maxlength="255"  />
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
                                    {{-- </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </div>

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


