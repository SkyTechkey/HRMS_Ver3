<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-vert-padding">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class="list-group list-menu card">
            <li class="header">
                <h5>General Settings</h5>
            </li>
            <li><a href="#" class="list-group-item">Display settings</a></li>
            <li><a href="#" class="list-group-item">Tags</a></li>

            <li class="header">
                <h6>DANH MỤC</h6>
            </li>
           <!-- @can('View.Danhmuc.Dia-chi-Hanh-Chinh') --> <!-- chú thích: các em tạo seed có quyền trên để sau này nó gọi ra -->
                <li class="{{ Request::is(route('index.tinhthanhpho')) ? 'active' : '' }}">
                    <a href="{{route('index.tinhthanhpho')}}" class="list-group-item">
                        <span>QL Tỉnh/Thành phố</span>
                    </a>
                </li>
                <li class="{{ Request::is(route('index.quanhuyen')) ? 'active' : '' }}">
                    <a href="{{route('index.quanhuyen')}}" class="list-group-item">
                        <span>QL Quận/Huyện</span>
                    </a>
                </li>
                <li class="{{ Request::is(route('index.xaphuong')) ? 'active' : '' }}">
                    <a href="{{route('index.xaphuong')}}" class="list-group-item">
                        <span>QL Xã/Phường</span>
                    </a>
                </li>
           <!-- @endcan -->
<<<<<<< HEAD

           @can('View.Role')
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
            @endcan
=======
            <li class="{{ Request::is('settings/role') ? 'active' : '' }}">
                <a href="{{url('settings/role')}}" class="list-group-item">
                    <span>Nhóm quyền</span>
                </a>
            </li>
            @can(View.NoiLamViec)
            <li class="{{ Request::is('index.noilamviec') ? 'active' : '' }}">
                <a href="{{route ('index.noilamviec')}}" class="list-group-item">
                    <span>Nơi làm việc</span>
                </a>
            </li>
            @endcan
            @can(View.TinhThanh)
            <li class="{{ Request::is('index.Index.tinhthanhpho') ? 'active' : '' }}">
                <a href="{{route ('Index.tinhthanhpho')}}" class="list-group-item">
                    <span>Tỉnh/Thành phố</span>
                </a>
            </li>
            @endcan
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
>>>>>>> origin/QuanLyTinhThanh-NoiLamViec-ChiNhanh-Nhieu


        </ul>

    </div>
</div>
