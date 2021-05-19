<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title">Thêm Nhân Viên</h4>
            </div>
            <div class="modal-body">
                <form action = "{{url('nhanvien/them')}}" id="form_validation" method="POST">
                    @csrf
                    <div class="col-sm-6">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input  type="text" class="form-control" name="hovanten" placeholder="Họ và tên"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="tenthuonggoi" placeholder="Tên thường gọi"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="gioitinh" placeholder="Giới Tính"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngayvaolam" placeholder="Ngày vào làm"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="sodienthoai" placeholder="Số điện thoại"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="emai" placeholder="Email"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="socmnd" placeholder="Số CMND"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngaycapcmnd" placeholder="Ngày cấp CMND"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="noicapcmnd" placeholder="Nơi cấp CMND"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="noisinh" placeholder="Nơi sinh"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="phongban" placeholder="Phòng ban"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="chucvu" placeholder="Chức vụ"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="noilamviec" placeholder="Nơi làm việc"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="diachithuongtru" placeholder="Địa chỉ thường trú"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="masothue" placeholder="Mã số thuế"  required>
                            </div>

                        </div>
                        <!-- Default radio -->
{{--                        <div class="demo-radio-button">--}}
{{--                            <input value = "active" name="group1" type="radio" id="radio_1" checked />--}}
{{--                            <label name for="radio_1">Hoạt động</label>--}}
{{--                            <input value = "close" name="group1" type="radio" id="radio_2" />--}}
{{--                            <label name for="radio_2">Tạm ngừng</label>--}}
{{--                        </div>--}}
                        <button class="btn btn-primary waves-effect" type="submit">Chấp nhận</button>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input  type="text" class="form-control" name="sotaikhoan" placeholder="Số tài khoản"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="nganhang" placeholder="Ngân hàng"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngayvaocongdoan" placeholder="Ngày vào công đoàn"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngayvaodoan" placeholder="Ngày vào đoàn"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ngayvaodang" placeholder="Ngày vào đảng"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="quoctich" placeholder="Quốc tịch"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="tongiao" placeholder="Tôn giáo"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="dantoc" placeholder="Dân tộc"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="nguoigioithieu" placeholder="Người giới thiệu"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="tinhtranghonnhan" placeholder="Tình trạng hôn nhân"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="hinhthuchonnhan" placeholder="Hình thức nhân viên"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="ghichu" placeholder="Ghi chú"  required>
                            </div>
{{--                            <div class="form-line">--}}
                            <div class="demo-radio-button">
                                <input value = "active" name="group1" type="radio" id="radio_1" checked />
                                <label name for="radio_1">Đang làm việc</label>
                                <input value = "close" name="group1" type="radio" id="radio_2" />
                                <label name for="radio_2">Tạm ngừng việc</label>
                            </div>
                                {{--                                                        <input  type="text" class="form-control" name="diachi" placeholder="Trạng thái"  required>--}}
{{--                            </div>--}}
                            <div class="form-line">
                                <input  type="text" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập"  required>
                            </div>
                            <div class="form-line">
                                <input  type="text" class="form-control" name="matkhau" placeholder="Mật khẩu"  required>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
