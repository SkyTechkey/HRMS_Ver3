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
                <h6>HỒ SƠ</h6>
            </li>


            @can('View.HoSo')
            <li class="{{Route::is('quanlyhoso.index') ? 'active' : '' }}">
                <a href="{{route('quanlyhoso.index')}}" class="list-group-item">
                    <span>Quản lý hồ sơ</span>
                </a>
            </li>
            @endcan
            @can('View.LoaiHoSo')
            <li class="{{Route::is('quanlyloaihoso.index') ? 'active' : '' }}">
                <a href="{{route('quanlyloaihoso.index')}}" class="list-group-item">
                    <span>Quản lý loại hồ sơ</span>
                </a>
            </li>
            @endcan


        </ul>

    </div>
</div>
