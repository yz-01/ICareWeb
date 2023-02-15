@extends('customer.layouts.app')

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
                                <h5 class="title">{{ auth()->user()->name }}</h5>
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
                                                <li><a><i class="feather-home"></i><span>Dashboard</span></a></li>
                                                <li><a><i class="feather-user"></i><span>My Profile</span></a></li>
                                                <li><a><i class="feather-book-open"></i><span>Enrolled Courses</span></a></li>
                                                <li><a><i class="feather-bookmark"></i><span>Wishlist</span></a></li>
                                                <li><a><i class="feather-star"></i><span>Reviews</span></a></li>
                                                <li><a><i class="feather-help-circle"></i><span>My Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-shopping-bag"></i><span>Order History</span></a></li>
                                            </ul>
                                        </nav>

                                        <div class="section-title mt--40 mb--20">
                                            <h6 class="rbt-title-style-2">Instructor</h6>
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
                                        </nav>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Sidebar  -->
                    </div>
                    <div class="col-lg-9">
                        <!-- Start Instructor Profile  -->
                        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                            <div class="content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">My Profile</h4>
                                </div>
                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Your Referral Code:</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">
                                            {{ auth()->user()->own_referral_code }}
                                            @if (auth()->user()->is_referral_code_use == 1)
                                                <span class="badge text-success">Haven't Use</span>
                                            @else
                                                <span class="badge text-danger">Used by Friend</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->

                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Name</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->name }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Phone</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->phone }}</div>
                                    </div>
                                </div>
                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Identity Card</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->identity_card ?: '-' }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->

                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Email</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->email ?: '-' }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->

                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Address</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">
                                            {{ auth()->user()->address ?: '-' }}, 
                                            {{ auth()->user()->postal_code ?: '-' }}, 
                                            {{ auth()->user()->city ?: '-' }}, 
                                            {{ auth()->user()->state ?: '-' }}, 
                                            {{ auth()->user()->country->name ?: '-' }}
                                        </div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->

                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Point Balance</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->point_balance }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->

                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Code</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->code ?: '-' }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->

                                <!-- Start Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Username</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ auth()->user()->username ?: '-' }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->
                            </div>
                        </div>
                        <!-- End Instructor Profile  -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Card Style -->
@endsection
