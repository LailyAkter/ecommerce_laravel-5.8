<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                @if(Request::is('admin*'))
                <li class="nav-item has-treeview menu-open">
                    <a href="{{URL::to('admin/dashboard')}}" class="nav-link {{Request::is('admin/dashboard*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/tag')}}" class="nav-link {{Request::is('admin/tag*') ? 'active' : ''}}">
                        <i class="fas fa-tags"></i>
                        <p>Tags </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/brand')}}" class="nav-link {{Request::is('admin/brand*') ? 'active' : ''}}">
                        <i class="fab fa-bandcamp"></i>
                        <p>Brands</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/category')}}" class="nav-link {{Request::is('admin/category*') ? 'active' : ''}}">
                        <i class="fas fa-book"></i>
                        <p>Categories </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/post')}}" class="nav-link {{Request::is('admin/post*') ? 'active' : ''}}">
                        <i class="fab fa-product-hunt"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/product')}}" class="nav-link {{Request::is('admin/product*') ? 'active' : ''}}">
                        <i class="fab fa-product-hunt"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/role')}}" class="nav-link {{Request::is('admin/role*') ? 'active' : '' }}">
                        <i class="fas fa-user-cog"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('admin/subscriber')}}" class="nav-link {{Request::is('admin/subscriber*') ? 'active' : ''}}">
                        <i class="fab fa-product-hunt"></i>
                        <p>Subscribers</p>
                    </a>
                </li>
                @endif()

                @if(Request::is('author*'))
                <li class="nav-item has-treeview menu-open">
                    <a href="{{URL::to('dashboard')}}" class="nav-link {{Request::is('dashboard*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{URL::to('author/post')}}" class="nav-link {{Request::is('author/post*') ? 'active' : ''}}">
                        <i class="fab fa-product-hunt"></i>
                        <p>Posts</p>
                    </a>
                </li>
                @endif()
                
                <li class="nav-header">SYESTEM</li>
                <li class="nav-item ">
                    <div>
                        <a href="{{ route('logout') }}" class="nav-link {{Request::is('logout*') ? 'active' : ''}}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Sign Out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

       
    </div>
    <!-- /.sidebar -->
</aside>
