@extends('trainer.layouts.app')

@section('content')
<div class="rbt-page-banner-wrapper">
    <!-- Start Banner BG Image  -->
    <div class="rbt-banner-image"></div>
    <!-- End Banner BG Image  -->
</div>

<!-- Start Card Style -->
<div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Start Dashboard Top  -->
                <div class="rbt-dashboard-content-wrapper">
                    <div class="tutor-bg-photo bg_image--22 height-350" style="background-image: url({{ asset('images/welcome/bg-image-19.jpg') }});"></div>
                    <!-- Start Tutor Information  -->
                    <div class="rbt-tutor-information">
                        <div class="rbt-tutor-information-left">
                            <div class="thumbnail rbt-avatars ">
                                {{-- <img src="assets/images/team/avatar.jpg" alt="Instructor"> --}}
                                <i class="fas fa-user py-3 px-4" style="font-size: 50px; background-color: white; border-radius: 30px; color:rgb(93, 155, 236)"></i>
                            </div>
                            <div class="tutor-content">
                                <h5 class="mb-0 title">{{ auth()->user()->name }}</h5>
                                <h6 class="my-2 title">{{ number_format(auth()->user()->point_balance, 0) }} pts</h6>
                                <div class="rbt-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    {{-- <span class="rating-count"> (15 Reviews)</span> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="rbt-tutor-information-right">
                            <div class="tutor-btn">
                                <a class="rbt-btn btn-md hover-icon-reverse">
                                    <span class="icon-reverse-wrapper">
                    <span class="btn-text">Create a New Course</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- End Tutor Information  -->
                </div>
                <!-- End Dashboard Top  -->

                <div class="row g-5">
                    <div class="col-lg-3">
                        <!-- Start Dashboard Sidebar  -->
                        <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="inner">
                                <div class="content-item-content">

                                    <div class="rbt-default-sidebar-wrapper">
                                        <div class="section-title mb--20">
                                            <h6 class="rbt-title-style-2">Welcome, {{ auth()->user()->name }}</h6>
                                        </div>
                                        <nav class="mainmenu-nav">
                                            <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                                <li><a href="{{ route('trainer.dashboard','#dashboard') }}"><i class="feather-home"></i><span>Dashboard</span></a></li>
                                                {{-- <li><a href="{{ route('trainer.profile.index') }}"><i class="feather-user"></i><span>My Profile</span></a></li> --}}
                                                <li><a><i class="feather-book-open"></i><span>Enrolled Courses</span></a></li>
                                                <li><a><i class="feather-bookmark"></i><span>Wishlist</span></a></li>
                                                <li><a><i class="feather-star"></i><span>Reviews</span></a></li>
                                                <li><a><i class="feather-help-circle"></i><span>My Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-shopping-bag"></i><span>Order History</span></a></li>
                                                <li><a><i class="feather-monitor"></i><span>My Courses</span></a></li>
                                                <li><a><i class="feather-volume-2"></i><span>Announcements</span></a></li>
                                                <li><a><i class="feather-message-square"></i><span>Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-list"></i><span>Assignments</span></a></li>
                                                {{-- <li><a href="{{ route('trainer.profile.edit', auth()->user()->id) }}"><i class="feather-settings"></i><span>Settings</span></a></li> --}}
                                                <li><a class="" href="{{ route('trainer.logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        <i class="feather-log-out"></i><span>Logout</span></a></li>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('trainer.logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                            </ul>
                                        </nav>

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
                                                <li><a class="" href="{{ route('trainer.logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        <i class="feather-log-out"></i><span>Logout</span></a></li>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('trainer.logout') }}" method="POST" class="d-none">
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
                        <div class="col-lg-9">
                            <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                                <div class="content">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3">Dashboard</h4>
                                    </div>
                                    <div class="row g-5">

                                        <!-- Start Single Card  -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-primary-opacity">
                                                        <i class="feather-book-open"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-primary"><span class="odometer" data-count="30">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">Enrolled Courses</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->

                                        <!-- Start Single Card  -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-secondary-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-secondary-opacity">
                                                        <i class="feather-monitor"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-secondary"><span class="odometer" data-count="10">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">ACTIVE COURSES</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- End Single Card  -->

                                        <!-- Start Single Card  -->
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-violet-opacity">
                                                <div class="inner">
                                                    <div class="rbt-round-icon bg-violet-opacity">
                                                        <i class="feather-award"></i>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="counter without-icon color-violet"><span class="odometer" data-count="7">00</span>
                                                        </h3>
                                                        <span class="rbt-title-style-2 d-block">Completed Courses</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Card  -->

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Card Style -->
@endsection

@push('script')
    <script>
        function myFunction() {
            // Get the text field
            var copyText = document.getElementById("myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);

            // Alert the copied text
            // alert("Copied the text: " + copyText.value);
        }
    </script>
@endpush