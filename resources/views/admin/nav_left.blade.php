<div class="left_col scroll-view">
    <div class="navbar nav_title">
        <div class="navbar nav_title">
            <a href="#" class="site_title">
                <i class="fa fa-paw" id="logo_admin">
                    <img src="upload/logos/logo.png"
                    alt="logo.png">
                </i>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        @if (Auth::check())
        <div class="profile_pic">
            <img src="upload/config/img.jpg" alt=" " class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ Auth::user()->name }}
                <small><i class="fa fa-circle" id="admin_status" ></i></small>
            </h2>
        </div>
        @endif
    </div>
    <!-- /menu profile quick info -->
    <br/>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> {{trans('config.Home')}} <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('dashboard.index') }}">{{trans('config.Dashboard')}}</a></li>
                    </ul>
                </li>
                <li><a> <i class="fa fa-cubes"></i></i> {{trans('config.Apartments')}} <span
                    class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('apartments.index') }}">{{trans('config.list_apartments')}}</a></li>
                        <li><a href="{{ route('apartments.create') }}">{{trans('config.create_apartments')}}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /sidebar menu -->
    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>
