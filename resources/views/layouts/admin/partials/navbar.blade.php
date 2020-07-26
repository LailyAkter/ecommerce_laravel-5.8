<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('admin')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('tag')}}" class="nav-link">Tags</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('brand')}}" class="nav-link">Brands</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('category')}}" class="nav-link">Categories</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('product')}}" class="nav-link">Products</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('contact')}}" class="nav-link">Contact</a>
        </li>
       
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3  ml-auto">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
    <li class="nav-item dropdown ml-3" style="list-style-type:none">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->email }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
</nav>
