<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="profileInfo" class="text-center py-3" style="height: 150px; background: linear-gradient(180deg, rgba(0,198,255,1) 50%, rgba(64,71,205,1) 100%);">
            @if (Auth::user()->image == null)
            <img class="rounded-circle" style="height: 80px; width: 80px" src="{{ asset('images/default/profile.png') }}">
            @else
            <img class="rounded-circle" style="height: 80px; width: 80px" src="{{ asset(Auth::user()->image) }}">
            @endif
            <h5 class="pt-1 mb-0 text-white">{{ Auth::user()->name }}</h5>
            <h6 class="mb-0 text-white">{{ Auth::user()->code }}</h6>
        </div>
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('doctor.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.treatments.index') }}" class="waves-effect">
                        <i class="bx bx-plus-medical"></i>
                        <span>Treament</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.schedules.index') }}" class="waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.python') }}" class="waves-effect">
                        <i class="bx bx-bar-chart-square"></i>
                        <span>Report</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>