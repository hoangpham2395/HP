<header class="main-header">

    <!-- Logo -->
    <a href="{{buildDashBoardUrl()}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>HP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">HP SHOP</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown tasks-menu">
                    <a href="{{route('admin.index')}}" class="dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="true">
                        <i class="fa fa-user"></i>
                        {{backendGuard()->user()->email}}
                    </a>
                    <ul class="dropdown-menu" style="min-width: 100px;width: 115px">
                        <li class="header"></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="javascript:void(0);"
                                       onclick="document.getElementById('form-logout').submit();">
                                        <h3 class="text-center">
                                            Sign out <i class="fa fa-sign-out text-red" aria-hidden="true"></i>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 100%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="">
                <a href=""><i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header header-custom">Sản phẩm</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-mobile"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="">
                            <i class="fa fa-list-ul"></i> Danh sách sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-mobile-phone"></i> Danh sách sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-cogs"></i> Nhóm thuộc tính
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-cogs"></i> Thuộc <tính></tính>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-barcode"></i>
                    <span>Danh mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-list-ul"></i> Danh sách danh mục
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-plus"></i> Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-apple"></i>
                    <span>Thương hiệu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-list-ul"></i> Danh sách thương hiệu
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-plus"></i> Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <li class="header header-custom">Đơn hàng</li>
            <li>
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Danh sách đơn hàng</span>
                </a>
            </li>
            <li class="header header-custom">Nhân viên</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Nhân viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-list-ul"></i> Danh sách nhân viên
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-plus"></i> Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-suitcase"></i>
                    <span>Phân công</span>
                </a>
            </li>
            <li class="header header-custom">Quản trị viên</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Quản trị viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-list-ul"></i> Danh sách quản trị viên
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-plus"></i> Thêm mới
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
{{MyForm::open(['route'=>'backend.logout','class'=>'form-logout', 'id' => 'form-logout'])}}
{!! MyForm::close() !!}
