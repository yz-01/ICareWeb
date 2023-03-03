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
                        {{-- @can('admin-list') --}}
                            <li><a href="{{ route('admin.admins.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'admins' && Request::segment(3) != 'create') ? 'active' : '' }}">Admin List</a></li>
                        {{-- @endcan
                        @can('teacher-list') --}}
                            <li><a href="{{ route('admin.agents.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'teachers' && Request::segment(3) != 'create') ? 'active' : '' }}">Agent List</a></li>
                        {{-- @endcan
                        @can('parent-list') --}}
                            <li><a href="#" class="{{ Request::segment(3) && (Request::segment(2) == 'guardians' && Request::segment(3) != 'create') ? 'active' : '' }}">Merchant List</a></li>
                        {{-- @endcan
                        @can('student-list') --}}
                            <li><a href="#" class="{{ Request::segment(3) && (Request::segment(2) == 'students' && Request::segment(3) != 'create') ? 'active' : '' }}">Center List</a></li>
                            <li><a href="{{ route('admin.trainers.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'students' && Request::segment(3) != 'create') ? 'active' : '' }}">Trainer List</a></li>
                            <li><a href="#" class="{{ Request::segment(3) && (Request::segment(2) == 'students' && Request::segment(3) != 'create') ? 'active' : '' }}">Company List</a></li>
                            <li><a href="{{ route('admin.customers.index') }}" class="{{ Request::segment(3) && (Request::segment(2) == 'students' && Request::segment(3) != 'create') ? 'active' : '' }}">Member List</a></li>
                        {{-- @endcan --}}
                        {{-- @can('admin-create')
                            <li><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                        @endcan --}}
                    </ul>
                </li>

                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>