{{-- Them Modal --}}

<div class="modal fade" id="myGiacanh" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CHI TIẾT</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('giamtrugiacanh.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Tennguoiquanhe">Tên người quan hệ</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="tennguoiquanhe" name="tennguoiquanhe"
                                    placeholder="Tên người quan hệ" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Loaiquanhe">Loại quan hệ</label>
                            <select name="loaiquanhe" class="form-control show-tick">
                                <option value="" selected>-- Chọn loại quan hệ --</option>
                                @foreach ($quanhe as $item)
                                <option value="{{$item->id}}">{{$item->Ten_quanhe}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label for="Ngaysinh">Ngày sinh</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh"
                                    placeholder="Ngày sinh" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Diachihientai">Địa chỉ hiện tại</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="diachihientai" name="diachihientai"
                                    placeholder="Địa chỉ hiện tại" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Nghenghiep">Nghề nghiệp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="nghenghiep" name="nghenghiep"
                                    placeholder="Địa chỉ hiện tại" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Sodienthoai">Số điện thoại</label>
                            <div class="form-line">
                                <input type="number" class="form-control" id="sodienthoai" name="sodienthoai"
                                    placeholder="Số điện thoại" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="SoCMND">Số CMND</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="socmnd" name="socmnd"
                                    placeholder="Số CMND" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Ngaycap">Ngày cấp</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngaycap" name="ngaycap"
                                    placeholder="Ngày cấp" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Noicap">Nơi cấp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="noicap" name="noicap"
                                    placeholder="Nơi cấp" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Ngaybatdaugiamtru">Ngày bắt đầu giảm trừ</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngaybatdaugiamtru" name="ngaybatdaugiamtru"
                                    placeholder="Ngày bắt đầu giảm trừ" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Ngayketthucgiamtru">Ngày kết thuc giảm trừ</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngayketthucgiamtru" name="ngayketthucgiamtru"
                                    placeholder="Ngày kết thuc giảm trừ" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="MasoNPT">Mã số NPT</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="masonpt" name="masonpt"
                                    placeholder="Mã số NPT" maxlength="255" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="ghichu" name="ghichu"
                                    placeholder="Ghi chú" maxlength="255" required />
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

{{-- Sua Modal --}}
@foreach ($giacanh as $item)
<div class="modal fade" id="fix{{$item->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style='color:#00b0e4' class="modal-title" id="defaultModalLabel">CHI TIẾT</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('giamtrugiacanh.edit',$item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Tennguoiquanhe">Tên người quan hệ</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="tennguoiquanhe" name="tennguoiquanhe"
                                    placeholder="Tên người quan hệ" value="{{$item->Ten_nguoiquanhe}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Loaiquanhe">Loại quan hệ</label>
                            <select name="loaiquanhe" class="form-control show-tick">
                                <option value="" selected>-- Chọn loại quan hệ --</option>
                                @foreach ($quanhe as $item)
                                <option value="{{$item->id}}">{{$item->Ten_quanhe}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label for="Ngaysinh">Ngày sinh</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh"
                                    placeholder="Ngày sinh" value="{{$item->Ngaysinh}}" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Diachihientai">Địa chỉ hiện tại</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="diachihientai" name="diachihientai"
                                    placeholder="Địa chỉ hiện tại" value="{{$item->Diachihientai}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Nghenghiep">Nghề nghiệp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="nghenghiep" name="nghenghiep"
                                    placeholder="Địa chỉ hiện tại" value="{{$item->Nghenghiep}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Sodienthoai">Số điện thoại</label>
                            <div class="form-line">
                                <input type="number" class="form-control" id="sodienthoai" name="sodienthoai"
                                    placeholder="Số điện thoại" value="{{$item->Sodienthoai}}" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="SoCMND">Số CMND</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="socmnd" name="socmnd"
                                    placeholder="Số CMND" maxlength="255" value="{{$item->SoCMND}}" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Ngaycap">Ngày cấp</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngaycap" name="ngaycap"
                                    placeholder="Ngày cấp" value="{{$item->Ngaycap}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Noicap">Nơi cấp</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="noicap" name="noicap"
                                    placeholder="Nơi cấp" value="{{$item->Noicap}}" maxlength="255" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="Ngaybatdaugiamtru">Ngày bắt đầu giảm trừ</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngaybatdaugiamtru" name="ngaybatdaugiamtru"
                                    placeholder="Ngày bắt đầu giảm trừ" value="{{$item->Ngaybatdaugiamtru}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="Ngayketthucgiamtru">Ngày kết thuc giảm trừ</label>
                            <div class="form-line">
                                <input type="date" class="form-control" id="ngayketthucgiamtru" name="ngayketthucgiamtru"
                                    placeholder="Ngày kết thuc giảm trừ" value="{{$item->Ngayketthucgiamtru}}" maxlength="255" required />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label for="MasoNPT">Mã số NPT</label>
                            <div class="form-line">
                                <input type="text" class="form-control" id="masonpt" name="masonpt"
                                    placeholder="Mã số NPT" value="{{$item->SoNPT}}" maxlength="255" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Ghichu">Ghi chú</label>
                            <div class="form-line">
                                <input type="text" class="form-control" name="ghichu"
                                    placeholder="Ghi chú" value="{{$item->Ghichu}}" maxlength="255" required />
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

