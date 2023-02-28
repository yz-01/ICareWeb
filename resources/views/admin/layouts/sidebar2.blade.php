<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="profileInfo" class="text-center py-3" style="height: 150px; background-color: #D587E3">
            @if (Auth::user()->image == null)
                <img class="rounded-circle" style="height: 80px; width: 80px" src="{{ asset('/images/avatar/profile_default.png') }}">
            @else
                <img class="rounded-circle" style="height: 80px; width: 80px" src="{{ asset(Auth::user()->image) }}">
            @endif
            <h5 class="pt-1 mb-0">{{ Auth::user()->name }}</h5>
            <h6 class="mb-0">{{ Auth::user()->code }}</h6>
        </div>
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>

                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>