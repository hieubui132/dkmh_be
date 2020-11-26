<aside class="app-aside app-aside-expand-md app-aside-light">
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="assets/images/avatars/profile.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">Beni Arisandi</span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="user-profile.html">
                        <span class="dropdown-icon oi oi-person"></span> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.auth.logout') }}">
                        <span class="dropdown-icon oi oi-account-logout"></span> Đăng xuất
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
                </div>
                <!-- /dropdown-items -->
            </div>
            <!-- /.dropdown-aside -->
        </header>
        <!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <li class="menu-item">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                    <!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child">
                        <a href="#" class="menu-link">
                            <span class="menu-icon fas fa-music"></span> 
                            <span class="menu-text">Quản lý nhạc</span>
                            <span class="badge badge-warning">New</span>
                        </a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="{{ route('admin.songs.index') }}" class="menu-link">Nhạc</a>
                            </li>
                            <li class="menu-item has-child">
                                <a href="#" class="menu-link">Nhạc demo</a> <!-- grand child menu -->
                                <ul class="menu">
                                    <li class="menu-item">
                                        <a href="page-project.html" class="menu-link">Tạo mới</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="page-project-board.html" class="menu-link">Danh sách</a>
                                    </li>
                                </ul>
                                <!-- /grand child menu -->
                            </li>
                        </ul>
                        <!-- /child menu -->
                    </li>
                    <!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item has-child {{ request()->routeIs('admin.users.*') ? 'has-active' : '' }}">
                        <a href="#" class="menu-link"><span class="menu-icon oi oi-person"></span> <span class="menu-text">Quản lý người dùng</span></a> <!-- child menu -->
                        <ul class="menu">
                            <li class="menu-item">
                                <a href="user-activities.html" class="menu-link"><i class="fas fa-plus-square"></i> Tạo mới</a>
                            </li>
                            <li class="menu-item {{ request()->routeIs('admin.users.index') ? 'has-active' : '' }}">
                                <a href="{{ route('admin.users.index') }}" class="menu-link"><i class="fas fa-list"></i> Danh sách</a>
                            </li>
                        </ul>
                        <!-- /child menu -->
                    </li>
                    <!-- /.menu-item -->
                    <!-- .menu-item -->
                    <li class="menu-item {{ request()->routeIs('admin.purchases.index') ? 'has-active' : '' }}">
                        <a href="{{ route('admin.purchases.index') }}" class="menu-link">
                            <span class="menu-icon far fa-credit-card"></span> <span class="menu-text">Xác nhận</span>
                        </a>
                    </li>
                    <!-- /.menu-item -->
                </ul>
                <!-- /.menu -->
            </nav>
            <!-- /.stacked-menu -->
        </div>
        <!-- /.aside-menu -->
        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer>
        <!-- /Skin changer -->
    </div>
    <!-- /.aside-content -->
</aside>