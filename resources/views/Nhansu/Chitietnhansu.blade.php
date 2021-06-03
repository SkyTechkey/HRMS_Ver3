@extends('layouts.master')
<!-- # Nội dung tiêu đề -->
@section('title')
Chi tiết nhân sự
@endsection
<!-- #END tiêu đề -->
<!-- # Nội dung CSS, js bổ sung -->
@push('css-up')
<link href="{{ asset('bap/scss/style.css')}}" rel="stylesheet">
<style class="">
    .clsForMrtInPut {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0;
        width: 130px;
        height: auto;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        display: inline-block;
        overflow: hidden;
        width: 100%;
        text-align: center !important;
    }

    .option_noilamviec.bootstrap-select.btn-group .dropdown-toggle .filter-option {
        display: inline-block;
        overflow: hidden;
        width: 100%;
        text-align: left !important;
    }

</style>
@endpush
@push('head-script')
@endpush
<!-- #END Nội dung CSS, js -->
@section('content')
<!-- #NOTIFICATIONS Nếu có không thì k dùng-->
@if(session('success'))
<div data-notify="container" id="slice-alert"
    class="bootstrap-notify-container alert alert-dismissible alert-success p-r-35 animated fadeInDown" role="alert"
    data-notify-position="bottom-left"
    style="display: inline-block; margin: 0px auto; position: fixed; transition: all 5s ease-in-out 0s; z-index: 1031; top: 100px; right: 30px;">
    <span data-notify="icon">
    </span> <span data-notify="title"></span>
    </span> <span data-notify="message">{{session('success')}}</span><a href="#" target="_blank" data-notify="url"></a>
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
    <h2>Hồ sơ Nhân viên</h2>

</div>

<!-- # Phần nội dung -->
<form action="{{ route('update.nhansu',$item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div style="float:right">

        <button type="button" class="btn bg-brown waves-effect" data-toggle="modal" data-target="#importModal"><i
                class="material-icons">publish</i>Nhập từ file</button>


        <a href="{{route('export.nhansu')}}" class="btn btn-success waves-effect">
            <i class="material-icons">download</i>
            Xuất file</a>

        <button type="submit" style="float:right;margin-right:5px;margin-bottom: 10px;"
            class="btn btn-primary waves-effect">
            <i class="material-icons">save</i>
            Lưu
        </button>


    </div>

    <div class="row clearfix">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-vert-padding">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="list-group list-menu card">
                        <div class="row">
                            <!-- #HInhf ảnh -->
                            <div class="col-12">
                                <div class="container-avatar clearfix">
                                    <div style="margin-right: 0;text-align:center;padding-top:15px;">

                                        <img id="mgAvartar" accept="image/*"
                                            src="{{ asset('project_asset/images/image_users/'.$item->Hinhanh) }}"
                                            style="cursor: auto;width: 180px;height:180px;border-radius:50%!important;margin-right:0px;"
                                            onerror="imgError(this)">
                                        <input type="file" name="hinhanh" id="hinhanh" class="clsForMrtInPut"
                                            data-max-size="50" accept="image/*" style="width:200px;height:200px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="width:100%;margin-top:10px;">
                            <div class="row">
                                <div class="col-12" style="text-align:center;">
                                    <span
                                        style="font-size: 18px !important; font-weight: bold !important; color: var(--color-tab) !important">
                                        {{$item->username}}
                                    </span>
                                </div>
                            </div>

                            <div class="row" style="vertical-align: middle;text-align:center!important;">
                                <div class="col-lg-12">
                                    <div class="form-group " style="text-align:center!important;">
                                        <select id="trangThai" style="text-align:center!important;" class="show-tick">
                                            <option value="TTDLV"
                                                style="font-size:16px;text-align:center;color:rgb(10, 123, 4);">Đang làm
                                                việc</option>
                                            <option value="TTDNV"
                                                style="font-size:16px;text-align:center;color:rgb(10, 123, 4);">Đã nghỉ
                                                việc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <!-- #Ho ten -->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-user" style="font-size: 22px;" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Họ và tên"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group">
                                        <div class="form-line " style="display: flex; font-size:14px">
                                            <b> <input style="font-size:14px;color:rgb(10, 123, 4);padding-left:15px"
                                                    type="text" class="form-control" id="hovaten" name="hovaten"
                                                    placeholder="Họ và tên" maxlength="255"
                                                    value="{{$item->Hovaten}}" />
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <!-- #noi làm việc -->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-building" style="font-size: 22px;" istooltip data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Nơi làm việc"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group option_noilamviec">
                                        <select name="noilamviec" id="noilamviec"
                                            class="option_noilamviec form-control show-tick">
                                            @if(empty($item->ID_Noilamviec))
                                            <option value="">Vui lòng chọn nơi làm việc</option>
                                            <option value="Đà nẵng">Đà nẵng</option>
                                            <option value="Hà Nội">Hà Nội</option>
                                            @else
                                            <option value="{{$item->ID_Noilamviec}}">{{$item->ID_Noilamviec}}</option>

                                            <option value="Đà nẵng">Đà nẵng</option>
                                            <option value="Hà Nội">Hà Nội</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <!--# Chi nhánh -->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-sitemap" style="font-size: 22px;" istooltip data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Chi nhánh"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group option_noilamviec">
                                        <select name="chinhanh" id="trangThai"
                                            class="option_noilamviec form-control show-tick">
                                            @if(empty($item->ID_Chinhanh))
                                            <option value="">Vui lòng chọn chi nhánh</option>
                                            @foreach($chinhanh as $value)
                                            <option value="{{$value->id}}">{{$value->Ten_chinhanh}}</option>
                                            @endforeach
                                            @else
                                            <option value="{{$item->ID_Chinhanh}}">{{$item->chinhanh->Ten_chinhanh}}
                                            </option>

                                            @foreach($chinhanh as $value)
                                            <option value="{{$value->id}}">{{$value->Ten_chinhanh}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <!--# Phòng ban-->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-address-book-o" style="font-size: 22px;" istooltip
                                        data-toggle="tooltip" data-placement="right" title=""
                                        data-original-title="Phòng ban"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group option_noilamviec">
                                        <select name="phongban" id="phongban"
                                            class="option_noilamviec form-control show-tick">
                                            @if(empty($item->ID_Phongban))
                                            <option value="">Vui lòng chọn phòng ban</option>
                                            @foreach($phongban as $value)
                                            <option value="{{$value->id}}">{{$value->Ten_phongban}}</option>
                                            @endforeach
                                            @else
                                            <option value="{{$item->ID_Phongban}}">{{$item->phongban->Ten_phongban}}
                                            </option>

                                            @foreach($phongban as $value)
                                            <option value="{{$value->id}}">{{$value->Ten_phongban}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <!--# Chức vụn-->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-address-book-o" style="font-size: 22px;" istooltip
                                        data-toggle="tooltip" data-placement="right" title=""
                                        data-original-title="Chức vụ"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group option_noilamviec">
                                        <select name="chucvu" id="chucvu"
                                            class="option_noilamviec form-control show-tick">
                                            @if(empty($item->ID_Chucvu))
                                            <option value="">Vui lòng chọn chức vụ</option>
                                            @foreach($chucvu as $value)
                                            <option value="{{$value->id}}">{{$value->Ten_chucvu}}</option>
                                            @endforeach
                                            @else
                                            <option value="{{$item->ID_Chucvu}}">{{$item->chucvu->Ten_chucvu}}
                                            </option>

                                            @foreach($phongban as $value)
                                            <option value="{{$value->id}}">{{$value->Ten_phongban}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row clearfix">
                                <!--#SĐT di động-->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-phone" style="font-size: 22px;" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Số điện thoại"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group">
                                        <div class="form-line " style="display: flex; font-size:14px">
                                            <input style="padding-left:15px" type="text" class="form-control"
                                                id="sodienthoai" name="sodienthoai" placeholder="Số điện thoại"
                                                maxlength="255" value="{{$item->Sodienthoai}}" />

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <!--#SĐT cơ quan -->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-phone" style="font-size: 22px;" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="SĐT bàn"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group">
                                        <div class="form-line " style="display: flex; font-size:14px">
                                            <input style="padding-left:15px" type="text" class="form-control"
                                                id="sodienthoaiban" name="sodienthoaiban" placeholder="SĐT bàn"
                                                maxlength="255" value="{{$item->Sodienthoai}}" />

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <!--#Email -->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-envelope-o" style="font-size: 22px;" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Email"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group">
                                        <div class="form-line " style="display: flex; font-size:14px">
                                            <input style="padding-left:15px" type="email" class="form-control"
                                                id="email" name="email" placeholder="Email" maxlength="255"
                                                value="{{$item->Email}}" />

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <!--#Ngay sinh -->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-calendar" style="font-size: 22px;" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Ngày sinh"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input style="padding-left:15px" type="date" class="form-control"
                                                id="ngaysinh" name="ngaysinh" placeholder="Ngày sinh" maxlength="255"
                                                value="{{$item->Ngaysinh}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <!--# Giới tính-->
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-venus-mars" style="font-size: 22px;" istooltip data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Giới tính"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group option_noilamviec">
                                        <select name="gioitinh" id="gioitinh"
                                            class="option_noilamviec form-control show-tick">
                                            <option value="Nam">Nam</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="row clearfix">
                                <!--#Ngay vào làm -->
                                <div class="col-lg-12 " style="vertical-align: middle;text-align:center!important;">
                                    <label for="Ghichu">Ngày vào làm</label>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label"
                                    style="font-size: 22px;">
                                    <i class="fa fa-calendar" style="font-size: 22px;" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Ngày vào làm"></i>
                                </div>
                                <div class="col-lg-9 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input style="padding-left:15px" type="date" class="form-control"
                                                id="ngayvaolam" name="ngayvaolam" placeholder="Ngày vào làm"
                                                maxlength="255" value="{{$item->Ngayvaolam}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-vert-padding">
                <!-- #Bên phải -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="card">

                        <div class="body">

                            <!--# Nav Tab -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#Chitiet" data-toggle="tab"
                                        aria-expanded="true">Chi tiết</a></li>
                                <li role="presentation" class=""><a href="#profile" data-toggle="tab"
                                        aria-expanded="false">Phúc lợi</a></li>
                                <li role="presentation" class=""><a href="#messages" data-toggle="tab"
                                        aria-expanded="false">Hồ sơ</a></li>
                                <li role="presentation" class=""><a href="#daotao" data-toggle="tab"
                                        aria-expanded="false">Đào tạo</a></li>
                                <li role="presentation" class=""><a href="#phanquyen" data-toggle="tab"
                                        aria-expanded="false">Phân quyền - Reset mật khẩu</a></li>
                            </ul>

                            <div class="tab-content">
                                <!-- #NỘI DUNG -->
                                <div role="tabpanel" class="tab-pane fade active in" id="Chitiet">
                                    <!--#Ten thuong goi-->
                                    <input class="getID" type="hidden" value="{{$item->id}}">
                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Tên thường gọi</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="hovaten" name="hovaten" maxlength="255"
                                                    value="{{$item->Hovaten}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Nơi sinh</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="hovaten" name="noisinh" maxlength="255"
                                                    value="{{$item->Noisinh}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Dân tộc</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="dantoc" id="dantoc"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Dantoc))
                                                <option value="">Vui lòng chọn dân tộc</option>
                                                @foreach($dantoc as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_dantoc}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Dantoc}}">{{$item->dantoc->Ten_dantoc}}
                                                </option>
                                                @foreach($dantoc as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_dantoc}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Tôn giáo</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="tongiao" id="tongiao"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Tongiao))
                                                <option value="">Vui lòng chọn tôn giáo</option>
                                                <option value="Ấn độ giáo">Ấn độ giáo</option>
                                                <option value="Hồi giáo">Hồi giáo</option>

                                                @else
                                                <option value="{{$item->ID_Tongiao}}">{{$item->ID_Tongiao}}
                                                </option>

                                                <option value="Ấn độ giáo">Ấn độ giáo</option>
                                                <option value="Hồi giáo">Hồi giáo</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Quốc tịch</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="quoctich" id="quoctich"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Quoctich))
                                                <option value="">Vui lòng chọn quốc tịch</option>
                                                @foreach($quoctich as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_quoctich}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Quoctich}}">{{$item->quoctich->Ten_quoctich}}
                                                </option>
                                                @foreach($quoctich as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_quoctich}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Học vấn</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="hocvan" id="trangThai"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                <option value="">Vui lòng chọn học vấn</option>
                                                <option value="12/12">12/12</option>
                                                <option value="Cao đẳng">Cao đẳng</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Số CMND/CCCD</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="soCMND" name="soCMND" placeholder="Số CMND/CCCD" maxlength="255"
                                                    value="{{$item->Socmnd}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Ngày cấp</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input style="padding-left:15px" type="date" class="form-control"
                                                    id="ngaycapCMND" name="ngaycapCMND" placeholder="Ngày cấp CMND"
                                                    maxlength="255" value="{{$item->ngaycapCMND}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Nơi cấp</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="noicapCMND" name="noicapCMND" placeholder="Nơi cấp CMND"
                                                    maxlength="255" value="{{$item->NoicapCMND}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Mã số thuế</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="masothue" name="masothue" maxlength="255"
                                                    value="{{$item->Masothue}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Tham gia công đoàn</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input style="padding-left:15px" type="date" class="form-control"
                                                    id="ngaythamgiaCĐ" name="ngaythamgiaCĐ"
                                                    placeholder="Ngày vào công đoàn" maxlength="255"
                                                    value="{{$item->Ngayvaocongdoan}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Ngày vào Đoàn</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input style="padding-left:15px" type="date" class="form-control"
                                                    id="ngayvaodoan" name="ngayvaodoan" placeholder="Ngày vào đoàn"
                                                    maxlength="255" value="{{$item->Ngayvaodoan}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Tỉnh thường trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="tinhthuongtru" id="tinhthuongtru"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Tinhthuongtru))
                                                <option value="">Vui lòng chọn tỉnh thường trú</option>
                                                @foreach($tinhthanhpho as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_tinhthanhpho}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Tinhthuongtru}}">
                                                    {{$item->tinhthuongtru->Ten_tinhthanhpho}}
                                                </option>
                                                @foreach($tinhthanhpho as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_tinhthanhpho}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Quận thường trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="quanthuongtru" id="quanthuongtru"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Quanthuongtru))
                                                <option value="">Vui lòng chọn quận thường trú</option>
                                                @foreach($quanhuyen as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_quanhuyen}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Tinhthuongtru}}">
                                                    {{$item->quanthuongtru->Ten_quanhuyen}}
                                                </option>
                                                @foreach($quanhuyen as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_quanhuyen}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Xã thường trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="xathuongtru" id="xathuongtru"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Xathuongtru))
                                                <option value="">Vui lòng chọn xã thường trú</option>
                                                @foreach($xaphuong as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_xaphuong}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Xathuongtru}}">
                                                    {{$item->xathuongtru->Ten_xaphuong}}
                                                </option>
                                                @foreach($xaphuong as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_xaphuong}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Địa chỉ thường trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="diachithuongtru" name="diachithuongtru"
                                                    placeholder="Địa chỉ thường trú" maxlength="255"
                                                    value="{{$item->Diachithuongtru}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Tỉnh tạm trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="tinhtamtru" id="tinhtamtru"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Tinhtamtru))
                                                <option value="">Vui lòng chọn tỉnh tạm trú</option>
                                                @foreach($tinhthanhpho as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_tinhthanhpho}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Tinhtamtru}}">
                                                    {{$item->tinhtamtru->Ten_tinhthanhpho}}
                                                </option>
                                                @foreach($tinhthanhpho as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_tinhthanhpho}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Quận tạm trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="quantamtru" id="quantamtru"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Quantamtru))
                                                <option value="">Vui lòng chọn quận tạm trú</option>
                                                @foreach($quanhuyen as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_quanhuyen}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Quantamtru}}">
                                                    {{$item->quantamtru->Ten_quanhuyen}}
                                                </option>
                                                @foreach($quanhuyen as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_quanhuyen}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Xã tạm trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="xatamtru" id="xatamtru"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                @if(empty($item->ID_Xatamtru))
                                                <option value="">Vui lòng chọn xã tạm trú</option>
                                                @foreach($xaphuong as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_xaphuong}}</option>
                                                @endforeach
                                                @else
                                                <option value="{{$item->ID_Xatamtru}}">
                                                    {{$item->xatamtru->Ten_xaphuong}}
                                                </option>
                                                @foreach($xaphuong as $value)
                                                <option value="{{$value->id}}">{{$value->Ten_xaphuong}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Địa chỉ tạm trú</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input style="padding-left:15px" type="text" class="form-control"
                                                    id="diachitamtru" name="diachitamtru" placeholder="Địa chỉ tạm trú"
                                                    maxlength="255" value="{{$item->Diachitamtru}}" />

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Hình thức nhân viên</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="hinhthucNV" id="hinhthucNV"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                <option value="">Vui lòng chọn hình thức nhân viên</option>
                                                <option value="Full-Time">Full-Time</option>
                                                <option value="Part-Time">Part-Time</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2  form-control-label">
                                        <label for="email_address_2">Tình trạng hôn nhân</label>
                                    </div>
                                    <div class="col-lg-4 " style="margin-bottom: 0px!important;">
                                        <div class="form-group">
                                            <select name="tinhtranghonnhan" tinh id="trangThai"
                                                class="option_noilamviec form-control show-tick" style=" width:100%">
                                                <option value="">Vui lòng chọn tình trạng hôn nhân</option>
                                                <option value="Đã kết hôn">Đã kết hôn</option>
                                                <option value="Độc thân">Độc thân</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#hợp đồng -->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Hợp đồng
                                                </h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th style="width:80px">Số HĐ</th>
                                                                <th>Loại - Tổng lương</th>
                                                                <th>Thời gian</th>
                                                                <th>File</th>
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
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span><span
                                                                            style="color:blue;">Fr:</span>{{$item->username}}</span>
                                                                    <br />
                                                                    <span><span
                                                                            style="color:red;">Fr:</span>{{$item->username}}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="" type="button" data-toggle="modal"
                                                                        data-target="#fix{{$item->id}}">
                                                                        <i style="font-size:22px"
                                                                            class="material-icons  bg-light-green ">download</i></a>
                                                                </td>
                                                                <td>
                                                                    <a href="" type="button" data-toggle="modal"
                                                                        data-target="#fix{{$item->id}}">
                                                                        <i style="font-size:22px"
                                                                            class="material-icons  bg-light-green ">print</i></a>
                                                                </td>

                                                            </tr>
                                                            @endforeach


                                                        </tbody>


                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#Bảo hiểm -->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Bảo hiểm
                                                </h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Số sổ BH/Thẻ BH</th>
                                                                <th>Nơi đăng ký khám bệnh</th>
                                                                <th>Mức đóng</th>
                                                                <th>Thời gian</th>
                                                            </tr>
                                                        </thead>
                                                        <?php $i=1; ?>
                                                        <tbody>
                                                            @foreach($nhansu as $item)
                                                            <tr style="vertical-align: middle;">

                                                                <td style="vertical-align: middle;width:30px">
                                                                    <?php echo $i++;?>
                                                                </td>
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td>

                                                                    {{$item->Hovaten}}
                                                                    <br />
                                                                    <span
                                                                        class="label label-primary">{{$item->username}}</span>
                                                                </td>
                                                                <td>
                                                                    <span><span
                                                                            style="color:blue;">Fr:</span>{{$item->username}}</span>
                                                                    <br />
                                                                    <span><span
                                                                            style="color:red;">Fr:</span>{{$item->username}}</span>
                                                                </td>


                                                            </tr>
                                                            @endforeach


                                                        </tbody>


                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#Khen thưởng -->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Khen thưởng - Kỷ luật
                                                </h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Số Phiếu</th>
                                                                <th>Ngày quyết định</th>
                                                                <th>Giá trị</th>
                                                                <th>Trạng thái</th>
                                                                <th>Lý do</th>
                                                            </tr>
                                                        </thead>
                                                        <?php $i=1; ?>
                                                        <tbody>
                                                            @foreach($nhansu as $item)
                                                            <tr style="vertical-align: middle;">

                                                                <td style="vertical-align: middle;width:30px">
                                                                    <?php echo $i++;?>
                                                                </td>
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td>

                                                                    {{$item->Hovaten}}
                                                                    <br />
                                                                    <span
                                                                        class="label label-primary">{{$item->username}}</span>
                                                                </td>
                                                                <td>
                                                                    <span><span
                                                                            style="color:blue;">Fr:</span>{{$item->username}}</span>
                                                                    <br />
                                                                    <span><span
                                                                            style="color:red;">Fr:</span>{{$item->username}}</span>
                                                                </td>
                                                                <td>

                                                                    {{$item->Hovaten}}
                                                                </td>

                                                            </tr>
                                                            @endforeach


                                                        </tbody>


                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#Tiền lương -->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Tiền lương
                                                </h2>
                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Tháng - Năm</th>
                                                                <th>Lương cơ bản</th>
                                                                <th>Lương phụ cấp</th>
                                                                <th>Thực lãnh</th>
                                                            </tr>
                                                        </thead>
                                                        <?php $i=1; ?>
                                                        <tbody>
                                                            @foreach($nhansu as $item)
                                                            <tr style="vertical-align: middle;">

                                                                <td style="vertical-align: middle;width:30px">
                                                                    <?php echo $i++;?>
                                                                </td>
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td>

                                                                    {{$item->Hovaten}}
                                                                    <br />
                                                                    <span
                                                                        class="label label-primary">{{$item->username}}</span>
                                                                </td>
                                                                <td>
                                                                    <span><span
                                                                            style="color:blue;">Fr:</span>{{$item->username}}</span>
                                                                    <br />
                                                                    <span><span
                                                                            style="color:red;">Fr:</span>{{$item->username}}</span>
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
                                <div role="tabpanel" class="tab-pane fade" id="messages">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#bằng cấp -->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Bằng cấp
                                                    <div style="float:right">


                                                        <button type="button" class="btn btn-primary waves-effect"
                                                            data-toggle="modal" data-target="#myModal">
                                                            <i class="material-icons">add</i>
                                                            Thêm mới</button>

                                                    </div>
                                                </h2>

                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Loại bằng</th>
                                                                <th>Trình độ chuyên môn</th>
                                                                <th>Nơi tốt nghiệp</th>
                                                                <th>Năm tốt nghiệp</th>
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
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td>

                                                                    {{$item->Hovaten}}
                                                                    <br />
                                                                    <span
                                                                        class="label label-primary">{{$item->username}}</span>
                                                                </td>
                                                                <td>
                                                                    <span><span
                                                                            style="color:blue;">Fr:</span>{{$item->username}}</span>
                                                                    <br />
                                                                    <span><span
                                                                            style="color:red;">Fr:</span>{{$item->username}}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="" type="button" data-toggle="modal"
                                                                        data-target="#fix{{$item->id}}">
                                                                        <i style="font-size:22px"
                                                                            class="material-icons  bg-light-green ">create</i></a>
                                                                    {{-- @can('Delete.NgoaiNgu') --}}
                                                                    <a href="{{route('destroy.nhansu',$item->id)}}"
                                                                        class="button delete-confirm"><i
                                                                            style="font-size:22px"
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

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#hỒ SƠ -->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Hồ sơ
                                                    <div style="float:right">
                                                        <button type="button" class="btn btn-primary waves-effect"
                                                            data-toggle="modal" data-target="#myModal">
                                                            <i class="material-icons">add</i>
                                                            Thêm mới</button>

                                                    </div>
                                                </h2>

                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Loại hồ sơ</th>
                                                                <th>Đính kèm</th>
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
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>

                                                                <td>
                                                                    <a href="" type="button" data-toggle="modal"
                                                                        data-target="#fix{{$item->id}}">
                                                                        <i style="font-size:22px"
                                                                            class="material-icons  bg-light-green ">create</i></a>
                                                                    {{-- @can('Delete.NgoaiNgu') --}}
                                                                    <a href="{{route('destroy.nhansu',$item->id)}}"
                                                                        class="button delete-confirm"><i
                                                                            style="font-size:22px"
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

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#Giảm trừ gia cảnh-->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Giảm trừ gia cảnh
                                                    <div style="float:right">
                                                        <button type="button" class="btn btn-primary waves-effect"
                                                            data-toggle="modal" data-target="#myModal">
                                                            <i class="material-icons">add</i>
                                                            Thêm mới</button>

                                                    </div>
                                                </h2>

                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Tên người quan hệ</th>
                                                                <th>Mối quan hệ</th>
                                                                <th>Nghề nghiệp</th>
                                                                <th>Số điện thoại</th>
                                                                <th>Thời gian</th>
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
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td> {{$item->username}} </td>
                                                                <td> {{$item->username}} </td>
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    <a href="" type="button" data-toggle="modal"
                                                                        data-target="#fix{{$item->id}}">
                                                                        <i style="font-size:22px"
                                                                            class="material-icons  bg-light-green ">create</i></a>
                                                                    {{-- @can('Delete.NgoaiNgu') --}}
                                                                    <a href="{{route('destroy.nhansu',$item->id)}}"
                                                                        class="button delete-confirm"><i
                                                                            style="font-size:22px"
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
                                <div role="tabpanel" class="tab-pane fade" id="daotao">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#đào tạo-->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Đào tạo
                                                    <div style="float:right">
                                                        <button type="button" class="btn btn-primary waves-effect"
                                                            data-toggle="modal" data-target="#myModal">
                                                            <i class="material-icons">add</i>
                                                            Thêm mới</button>

                                                    </div>
                                                </h2>

                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Tên Đào tạo</th>
                                                                <th>Thời gian</th>
                                                                <th>Kết quả</th>
                                                                <th width="10%">Thao Tác</th>
                                                            </tr>
                                                        </thead>
                                                        <?php $i=1; ?>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="phanquyen">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <!--#đào tạo-->
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Đào tạo
                                                    <div style="float:right">
                                                        <button type="button" class="btn btn-primary waves-effect"
                                                            data-toggle="modal" data-target="#myModal">
                                                            <i class="material-icons">add</i>
                                                            Thêm mới</button>

                                                    </div>
                                                </h2>

                                            </div>
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr style="vertical-align: middle;">
                                                                <th style="width:30px">STT</th>
                                                                <th>Tên Đào tạo</th>
                                                                <th>Thời gian</th>
                                                                <th>Kết quả</th>
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
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    {{$item->username}}
                                                                    <br />
                                                                    <span>
                                                                        {{$item->Hovaten}}
                                                                    </span>
                                                                </td>
                                                                <td> {{$item->username}} </td>
                                                                <td>
                                                                    <a href="" type="button" data-toggle="modal"
                                                                        data-target="#fix{{$item->id}}">
                                                                        <i style="font-size:22px"
                                                                            class="material-icons  bg-light-green ">create</i></a>
                                                                    {{-- @can('Delete.NgoaiNgu') --}}
                                                                    <a href="{{route('destroy.nhansu',$item->id)}}"
                                                                        class="button delete-confirm"><i
                                                                            style="font-size:22px"
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
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- #END Nội dung -->

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
            title: 'Xóa phòng ban',
            text: 'Bạn có thực sự muốn xóa thành viên này?',
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
    $("#alert").delay(4000).slideUp(200, function () {
        $(this).alert('close');
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $
    });
</script>
<!-- #END js load thông báo -->
@endpush
<!-- #END js -->
