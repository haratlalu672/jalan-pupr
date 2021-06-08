<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset("storage/" . auth()->user()->profil) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            {{-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./index.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v3</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @if (auth()->user()->role_id == 1)
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Pengguna
                    </p>
                </a>
            </li>
            @endif
            @if (auth()->user()->role_id == 2)
            <li class="nav-item">
                <a href="{{ route('pengelolaan.index') }}"
                    class="nav-link {{ request()->is('pengelolaan*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Pengelolaan Jalan
                    </p>
                </a>
            </li>
            @endif
            @if (auth()->user()->role_id == 4)
            <li class="nav-item">
                <a href="{{ route('data.index') }}" class="nav-link {{ request()->is('data*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Data Jalan
                    </p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->