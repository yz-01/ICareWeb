<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('patient.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('images/icon/icon2.png') }}" alt="" height="40">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('images/icon/logo.png') }}" alt="" height="40">
                    </span>
                </a>
            </div>
            
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars" style="color: #8797e3"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect py-0" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 5px; background: linear-gradient(180deg, rgba(0,198,255,1) 50%, rgba(64,71,205,1) 100%); color: white; height: 50px;">
                    @if (Auth::user()->image == null)
                        <img class="rounded-circle header-profile-user" src="{{ asset('images/default/profile.png') }}">
                    @else
                        <img class="rounded-circle header-profile-user" src="{{ asset(Auth::user()->image) }}">
                    @endif
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->name }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('patient.patients.show', auth()->user()->id) }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger btn-logout" href="javascript:void(0)"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                    <form id="logout-form" action="{{ route('patient.logout') }}" method="post" class="d-none">@csrf</form>
                </div>
            </div>
        </div>
    </div>
</header>