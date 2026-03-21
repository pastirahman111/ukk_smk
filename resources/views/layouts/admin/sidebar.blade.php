    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-header">Menu</li>

                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"> <i
                                class="nav-icon fas fa-th"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    {{-- Data Buku dan Kategori --}}
                    <li class="nav-item {{ request()->is('kategori*') || request()->is('buku*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('kategori*') || request()->is('buku*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/kategori" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kategori</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/buku" class="nav-link {{ request()->is('buku*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Buku</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Data Siswa dan User --}}
                    <li class="nav-item {{ request()->is('siswa*') || request()->is('user*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('siswa*') || request()->is('user*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Siswa & User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/siswa" class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/user" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header">transaksi</li>
                    <li class="nav-item">
                        <a href="/transaksi" class="nav-link {{ request()->is('transaksi') ? 'active' : '' }}"> <i
                                class="nav-icon fas fa-book-reader"></i>
                            <p>
                                Transaksi
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
