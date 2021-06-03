<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-vert-padding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="list-group list-menu card">
            <li class="header">
                <h5>General Settings</h5>
            </li>
            <li><a href="#" class="list-group-item">Display settings</a></li>
            <li><a href="#" class="list-group-item">Tags</a></li>

            <li class="header">
                <h6>QUẢN LÝ QUYỀN</h6>
            </li>
            <li class="{{ Request::is('phanquyen') ? 'active' : '' }}">
                <a href="{{url('phanquyen')}}" class="list-group-item">
                    <span>Bảng Phân Quyền</span>
                </a>
            </li>
            <li class="{{ Request::is('settings/role') ? 'active' : '' }}">
                <a href="{{url('settings/role')}}" class="list-group-item">
                    <span>Nhóm quyền</span>
                </a>
            </li>

            <li class="header">
                <h6>DANH MỤC</h6>
            </li>

            @can('View.NgoaiNgu')
            <li class="{{Route::is('quanlyngoaingu.index') ? 'active' : '' }}">
                <a href="{{route('quanlyngoaingu.index')}}" class="list-group-item">
                    <span>Quản lý ngoại ngữ</span>
                </a>
            </li>
            @endcan
            @can('View.DanToc')
            <li class="{{Route::is('quanlydantoc.index') ? 'active' : '' }}">
                <a href="{{route('quanlydantoc.index')}}" class="list-group-item">
                    <span>Quản lý Dân tộc</span>
                </a>
            </li>
            @endcan
            @can('View.QuocTich')
            <li class="{{Route::is('quanlyquoctich.index') ? 'active' : '' }}">
                <a href="{{route('quanlyquoctich.index')}}" class="list-group-item">
                    <span>Quản lý Quốc tịch</span>
                </a>
            </li>
            @endcan
            @can('View.TuyenDung')
            <li class="{{Route::is('tuyendung.index') ? 'active' : '' }}">
                <a href="{{route('tuyendung.index')}}" class="list-group-item">
                    <span>Quản lý Tuyển dụng</span>
                </a>
            </li>
            @endcan
            @can('View.ChucVu')
            <li class="{{Route::is('chucvu.index') ? 'active' : '' }}">
                <a href="{{route('chucvu.index')}}" class="list-group-item">
                    <span>Quản lý Chức vụ</span>
                </a>
            </li>
            @endcan
			@can('View.ChiNhanh')
            <li class="{{Route::is('quanlychinhanh.index') ? 'active' : '' }}">
                <a href="{{route('quanlychinhanh.index')}}" class="list-group-item">
                    <span>Quản lý chi nhánh</span>
                </a>
            </li>
            @endcan
            @can('View.PhongBan')
            <li class="{{Route::is('quanlyphongban.index') ? 'active' : '' }}">
                <a href="{{route('quanlyphongban.index')}}" class="list-group-item">
                    <span>Quản lý phòng ban</span>
                </a>
            </li>
            @endcan
            @can('View.TinhThanh')
            <li class="{{Route::is('quanlytinhthanhpho.index') ? 'active' : '' }}">
                <a href="{{route('quanlytinhthanhpho.index')}}" class="list-group-item">
                    <span>Quản lý Tỉnh/Thành Phố</span>
                </a>
            </li>
            @endcan
            @can('View.TinhThanh')
            <li class="{{Route::is('quanlyquanhuyen.index') ? 'active' : '' }}">
                <a href="{{route('quanlyquanhuyen.index')}}" class="list-group-item">
                    <span>Quản lý Quận/Huyện</span>
                </a>
            </li>
            @endcan
            @can('View.TinhThanh')
            <li class="{{Route::is('quanlyxaphuong.index') ? 'active' : '' }}">
                <a href="{{route('quanlyxaphuong.index')}}" class="list-group-item">
                    <span>Quản lý Xã/Phường</span>
                </a>
            </li>
            @endcan
            {{-- @can('View.TinhThanh') --}}
            <li class="{{Route::is('bangcap.index') ? 'active' : '' }}">
                <a href="{{route('bangcap.index')}}" class="list-group-item">
                    <span>Quản lý Bằng Cấp</span>
                </a>
            </li>
            {{-- @endcan --}}
            {{-- @can('View.TinhThanh') --}}
            {{-- <li class="{{Route::is('hopdong.index') ? 'active' : '' }}">
                <a href="{{route('hopdong.index')}}" class="list-group-item">
                    <span>Quản lý Bằng Cấp</span>
                </a>
            </li> --}}
            {{-- @endcan --}}
        </ul>

    </div>
</div>
