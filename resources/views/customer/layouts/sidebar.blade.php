<style>
    @media (min-width: 1024px)  {
        #showButton {
            display: none;
        }
        #hideButton {
            display: none;
        }
    }
    @media (min-width: 768px) and (max-width: 1024px) {
        #sidebar {
            display: none;
        }
    }

    /* Styles for mobile devices */
    @media (max-width: 767px) {
        #sidebar {
            display: none;
        }
    }
</style>
<div class="col-lg-3">
    <!-- Start Dashboard Sidebar  -->
    <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
        <div class="inner">
            <div class="content-item-content">

                <div class="rbt-default-sidebar-wrapper">
                    <div class="section-title mb--20">
                        <h6 class="rbt-title-style-2">Welcome, {{ auth()->user()->name }}&nbsp;&nbsp;&nbsp;
                        <i id="showButton" class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                        <i id="hideButton" style="display: none;" class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                        </h6>
                    </div>
                    <nav class="mainmenu-nav" id="sidebar">
                        <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                            <li><a href="{{ route('customer.dashboard','#dashboard') }}"><i class="feather-home"></i><span>Dashboard</span></a></li>
                            <li><a href="{{ route('customer.profile.index') }}"><i class="feather-user"></i><span>My Profile</span></a></li>
                            <li><a><i class="feather-book-open"></i><span>Enrolled Courses</span></a></li>
                            <li><a><i class="feather-bookmark"></i><span>Wishlist</span></a></li>
                            <li><a><i class="feather-star"></i><span>Reviews</span></a></li>
                            <li><a href="{{ route('customer.point.index') }}"><i class="feather-help-circle"></i><span>Point History</span></a></li>
                            <li><a><i class="feather-shopping-bag"></i><span>Purchase History</span></a></li>
                            <!-- <li><a><i class="feather-monitor"></i><span>My Courses</span></a></li>
                                                <li><a><i class="feather-volume-2"></i><span>Announcements</span></a></li>
                                                <li><a><i class="feather-message-square"></i><span>Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-list"></i><span>Assignments</span></a></li> -->
                            <li><a href="{{ route('customer.profile.edit', auth()->user()->id) }}"><i class="feather-settings"></i><span>Settings</span></a></li>
                            <li><a class="" href="{{ route('customer.logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                    <i class="feather-log-out"></i><span>Logout</span></a></li>
                            </a>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </nav>
                    <script>
                        document.getElementById('showButton').addEventListener('click', function() {
                            document.getElementById("sidebar").style.display = "block";
                            document.getElementById("hideButton").style.display = "";
                            document.getElementById("showButton").style.display = "none";
                        });
                        document.getElementById('hideButton').addEventListener('click', function() {
                            document.getElementById("sidebar").style.display = "none";
                            document.getElementById("hideButton").style.display = "none";
                            document.getElementById("showButton").style.display = "";
                        });
                    </script>
                    {{-- <div class="section-title mt--40 mb--20">
                                            <h6 class="rbt-title-style-2">Trainer</h6>
                                        </div>

                                        <nav class="mainmenu-nav">
                                            <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                                <li><a><i class="feather-monitor"></i><span>My Courses</span></a></li>
                                                <li><a><i class="feather-volume-2"></i><span>Announcements</span></a></li>
                                                <li><a><i class="feather-message-square"></i><span>Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-list"></i><span>Assignments</span></a></li>
                                            </ul>
                                        </nav>

                                        <div class="section-title mt--40 mb--20">
                                            <h6 class="rbt-title-style-2">User</h6>
                                        </div>

                                        <nav class="mainmenu-nav">
                                            <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                                <li><a><i class="feather-settings"></i><span>Settings</span></a></li>
                                                <li><a class="" href="{{ route('customer.logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="feather-log-out"></i><span>Logout</span></a></li>
                    </a>
                    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </ul>
                    </nav> --}}
                </div>

            </div>
        </div>
    </div>
    <!-- End Dashboard Sidebar  -->
</div>