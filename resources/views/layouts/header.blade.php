<!-- Start Header Area -->
<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>
    <div class="rbt-header-wrapper header-space-betwween header-sticky py-2">
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

                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('welcome','#course') }}">Courses</a>
                            </li>
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('welcome','#trainer') }}">Trainers</a>
                            </li>
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('welcome','#testimonial') }}">Testimonials</a>
                            </li>
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('welcome','#news') }}">News</a>
                            </li>
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="{{ route('welcome','#contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header-right">
                    <!-- Navbar Icons -->
                    <ul class="quick-access">
                        <li class="account-access rbt-user-wrapper d-none d-xl-block">
                            <a href="{{ route('cart.index') }}"><i class="feather-shopping-cart"></i>Cart</a>
                        </li>
                        <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                            <a href="{{ route('cart.index') }}"><i class="feather-shopping-cart"></i></a>
                        </li>
                        @if (auth()->guard('customer')->check() == true)
                            <li class="account-access rbt-user-wrapper d-none d-xl-block">
                                <a style="cursor: pointer"><i class="feather-user"></i>{{auth()->guard('customer')->user()->name}}</a>
                                <div class="rbt-user-menu-list-wrapper">
                                    <div class="inner">
                                        <ul class="user-list-wrapper">
                                            <li>
                                                <a href="{{ route('customer.dashboard') }}">
                                                    <span>My Dashboard</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span>My Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('customer.logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    <span>{{ __('Logout') }}</span>
                                                </a>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            
                            <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                                <a class="rbt-round-btn" style="cursor: pointer"><i class="feather-user"></i></a>
                                <div class="rbt-user-menu-list-wrapper">
                                    <div class="inner">
                                        <ul class="user-list-wrapper">
                                            <li>
                                                <a href="{{ route('customer.dashboard') }}">
                                                    <span>My Dashboard</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span>My Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('customer.logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    <span>{{ __('Logout') }}</span>
                                                </a>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @else
                            <li class="account-access rbt-user-wrapper d-none d-xl-block">
                                <a style="cursor: pointer"><i class="feather-user"></i>Login</a>
                                <div class="rbt-user-menu-list-wrapper">
                                    <div class="inner">
                                        <ul class="user-list-wrapper">
                                            <li>
                                                <a href="{{ route('agent.login') }}">
                                                    <span>Agent Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('merchant.login') }}">
                                                    <span>Merchant Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('center_user.login') }}">
                                                    <span>Center Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('trainer.login') }}">
                                                    <span>Trainer Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('company_user.login') }}">
                                                    <span>Company Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.login') }}">
                                                    <span>Member Login</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="account-access rbt-user-wrapper d-none d-xl-block">
                                <a style="cursor: pointer"><i class="feather-file-text"></i>Register</a>
                                <div class="rbt-user-menu-list-wrapper">
                                    <div class="inner">
                                        <ul class="user-list-wrapper">
                                            <li>
                                                <a href="{{ route('agent.register.create') }}">
                                                    <span>Agent Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('merchant.register.create') }}">
                                                    <span>Merchant Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('center_user.register.create') }}">
                                                    <span>Center Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('trainer.register.create') }}">
                                                    <span>Trainer Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('company_user.register.create') }}">
                                                    <span>Company Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.register.create') }}">
                                                    <span>Member Register</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                                <a class="rbt-round-btn" style="cursor: pointer"><i class="feather-user"></i></a>
                                <div class="rbt-user-menu-list-wrapper">
                                    <div class="inner">
                                        <ul class="user-list-wrapper">
                                            <li>
                                                <a href="{{ route('agent.login') }}">
                                                    <span>Agent Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('merchant.login') }}">
                                                    <span>Merchant Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('center_user.login') }}">
                                                    <span>Center Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('trainer.login') }}">
                                                    <span>Trainer Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('company_user.login') }}">
                                                    <span>Company Login</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.login') }}">
                                                    <span>Member Login</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                                <a class="rbt-round-btn" style="cursor: pointer"><i class="feather-file-text"></i></a>
                                <div class="rbt-user-menu-list-wrapper">
                                    <div class="inner">
                                        <ul class="user-list-wrapper mr-0">
                                            <li>
                                                <a href="{{ route('agent.register.create') }}">
                                                    <span>Agent Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('merchant.register.create') }}">
                                                    <span>Merchant Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('center_user.register.create') }}">
                                                    <span>Center Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('trainer.register.create') }}">
                                                    <span>Trainer Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('company_user.register.create') }}">
                                                    <span>Company Register</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('customer.register.create') }}">
                                                    <span>Member Register</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Start Mobile-Menu-Bar -->
                    {{-- <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div> --}}
                    <!-- Start Mobile-Menu-Bar -->

                </div>
            </div>
        </div>
    </div>
    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>
</header>
