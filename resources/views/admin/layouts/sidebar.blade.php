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
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li class="{{ Request::segment(3) && (Request::segment(2) == 'admins' && Request::segment(3) != 'create') ? 'mm-active' : '' }}">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>User List</span>
                    </a>
                    <ul class="sub-menu {{ Request::segment(3) && (Request::segment(2) == 'admins' && Request::segment(3) != 'create') ? 'mm-show' : '' }}" aria-expanded="false">
                        <li><a href="{{ route('admin.admins.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'admins' && Request::segment(3) != 'create') ? 'active' : '' }}">Admin List</a></li>
                        <li><a href="{{ route('admin.doctors.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'doctors' && Request::segment(3) != 'create') ? 'active' : '' }}">Doctor List</a></li>
                        <li><a href="{{ route('admin.nurses.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'nurses' && Request::segment(3) != 'create') ? 'active' : '' }}">Nurse List</a></li>
                        <li><a href="{{ route('admin.patients.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'patients' && Request::segment(3) != 'create') ? 'active' : '' }}">Patient List</a></li>
                        <!-- <li><a href="{{ route('admin.trainers.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'trainers' && Request::segment(3) != 'create') ? 'active' : '' }}">Trainer List</a></li>
                        <li><a href="{{ route('admin.company_users.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'company_users' && Request::segment(3) != 'create') ? 'active' : '' }}">Company List</a></li>
                        <li><a href="{{ route('admin.customers.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'customers' && Request::segment(3) != 'create') ? 'active' : '' }}">Member List</a></li>
                        <li><a href="{{ route('admin.admins.create') }}">Create Admin</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.branches.index') }}" class="waves-effect">
                        <i class="bx bx-book"></i>
                        <span>Branch List</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>