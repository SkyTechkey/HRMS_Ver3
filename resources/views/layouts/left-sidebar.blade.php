<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- #User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('project_asset/images/'  .Auth::user()->Hinhanh)}}" width="48" height="48" alt="User" />

        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->Hovaten}}</div>
            <div class="email">
                {{Auth::user()->Email}}
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <a href="javascript:void(0);" class="bars"></a>
        <ul class="list">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{url('home')}}">
                    <i class="material-icons">home</i>
                    <span>Trang Chủ</span>
                </a>
            </li>
            <li class="{{ Request::is('blanks') ? 'active' : '' }}">
                <a href="{{url('blanks')}}">
                    <i class="material-icons">home</i>
                    <span>TRANG MẪU</span>
                </a>
            </li>
            <li>
                <a href="{{url('phongban')}}">
                    <i class="material-icons">perm_contact_calendar</i>
                    <span>Phòng Ban</span>
                </a>
            </li>
            <li>
                <a href="{{url('branch')}}">
                    <i class="material-icons">maps_home_work</i>
                    <span>Chi Nhánh</span>
                </a>
            </li>
            <li>
                <a href="{{ url('nhansu') }}">
                    <i class="material-icons">group</i>
                    <span>Quản Lý Nhân Sự</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">perm_contact_calendar</i>
                    <span>Vai Trò - Chức Năng</span>
                </a>
                <ul class="ml-menu">
                    <li class="{{ Request::is('phanquyen') ? 'active' : '' }}">
                        <a href="{{url('phanquyen')}}">
                            <span>Bảng Phân Quyền</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{url('role')}}">
                            <span>Vai Trò</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{url('chucnang')}}">
                            <span>Chức Năng</span>
                        </a>

                    </li>

                    <li>
                        <a href="{{url('nhanvien/vaitro/danhsach')}}">
                            <span>Danh Sách Vai Trò Nhân Viên</span>
                        </a>

<<<<<<< HEAD
                        </li>
                    </ul>
                </li>
                @can('View.Settings')
                    <li >
                        <a href="{{url('settings')}}" title="Hệ thống" class="toggled waves-effect waves-block">
                            <i class="material-icons">settings</i>
                            <span>Hệ thống</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <i title="@lang('core::core.minify_sidebar')" id="minify-sidebar" class="material-icons">keyboard_arrow_left</i>
            <div class="version">
                <b>@lang('bap.version'): {{ config('bap.version') }}</b>
            </div>
=======
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{url('settings')}}" title="Hệ thống" class="toggled waves-effect waves-block">
                    <i class="material-icons">settings</i>
                    <span>Hệ thống</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <i title="@lang('core::core.minify_sidebar')" id="minify-sidebar" class="material-icons">keyboard_arrow_left</i>
        <div class="version">
            <b>@lang('bap.version'): {{ config('bap.version') }}</b>
>>>>>>> origin/QuanLyNgoaiNgu_Viet
        </div>
    </div>
    <!-- #Footer -->

</aside>
<!-- #END# Left Sidebar -->
