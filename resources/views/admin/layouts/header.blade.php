<!-- Start Header Area -->
<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>
    <div class="rbt-header-wrapper header-space-betwween header-sticky py-3">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-center align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('images/icon/logo.png') }}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <!-- Navbar Icons -->
                    <ul class="quick-access">
                        <li class="account-access rbt-user-wrapper d-none d-xl-block">
                            <a style="cursor: pointer"><i class="feather-user"></i>{{ auth()->user()->name }}</a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                            <a style="cursor: pointer" class="rbt-round-btn"><i class="feather-user"></i></a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <ul class="user-list-wrapper">
                                        <li><a>Welcome, {{ auth()->user()->name }}</a></li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li><a href="{{ route('admin.dashboard','#profile') }}">My Profile</a></li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
</header>