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
                <h6>DOANH MỤC</h6>
            </li>


            @can('View.TinhThanh')
            <li class="{{Route::is('quanlytinhthanhpho.index') ? 'active' : '' }}">
                <a href="{{route('quanlytinhthanhpho.index')}}" class="list-group-item">
                    <span>Quản lý tỉnh thành phố</span>
                </a>
            </li>
            @endcan
            @can('View.TinhThanh')
            <li class="{{Route::is('quanlyquanhuyen.index') ? 'active' : '' }}">
                <a href="{{route('quanlyquanhuyen.index')}}" class="list-group-item">
                    <span>Quản lý quận huyện</span>
                </a>
            </li>
            @endcan
            @can('View.TinhThanh')
            <li class="{{Route::is('quanlyxaphuong.index') ? 'active' : '' }}">
                <a href="{{route('quanlyxaphuong.index')}}" class="list-group-item">
                    <span>Quản lý xã phường</span>
                </a>
            </li>
            @endcan


        </ul>

    </div>
</div>
