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
                    <span>Trang Ch???</span>
                </a>
            </li>
            <li class="{{ Request::is('blanks') ? 'active' : '' }}">
                <a href="{{url('blanks')}}">
                    <i class="material-icons">home</i>
                    <span>TRANG M???U</span>
                </a>
            </li>
            @can('View.NhanvienCN')
            <li >
                <a href="javascript:void(0);" title="QL Nh??n S???" class="menu-toggle waves-effect waves-block">
                    <i class="material-icons">people</i>
                    <span>QL Nh??n S???</span>
                </a>
                <ul class="ml-menu" style="display: none;">
                    <li class="{{ Request::is('nhansu') ? 'active' : '' }}">
                        <a href="{{url('nhansu')}}">
                            <span>Danh s??ch nh??n s???</span>
                        </a>
                    </li>
                    <li class="{{route('index.Chitietnhansu') ? 'active' : '' }}">
                        <a href="{{route('index.Chitietnhansu')}}">
                            <span>Th??m m???i nh??n s???</span>
                        </a>
                    </li>
                </ul>
            </li>

            @endcan
            <li class="{{ Request::is('settings') ? 'active' : '' }}">
                <a href="{{url('settings')}}" title="H??? th???ng" class="toggled waves-effect waves-block">
                    <i class="material-icons">settings</i>
                    <span>H??? th???ng</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <i title="@lang('core::core.minify_sidebar')" id="minify-sidebar" class="material-icons">keyboard_arrow_left</i>
        <div class="Version">
            <b>version: HRMS 3.0</b>
        </div>
    </div>
    <!-- #Footer -->

</aside>
<!-- #END# Left Sidebar -->
