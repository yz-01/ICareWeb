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
                                        @if($customer->banner)
                    <div class="tutor-bg-photo bg_image bg_image--22 height-350" style="background-image: url({{ asset($customer->banner) }});"></div>
                    @else
                    <div class="tutor-bg-photo bg_image--22 height-350" style="background-image: url({{ asset('images/welcome/bg-image-19.jpg') }});"></div>
                    @endif
                    <!-- Start Tutor Information  -->
                    <div class="rbt-tutor-information">
                        <div class="rbt-tutor-information-left">
                            <div class="thumbnail rbt-avatars ">
                                {{-- <img src="assets/images/team/avatar.jpg" alt="Instructor"> --}}
                                                                @if($customer->image)
                                <img src="{{ asset($customer->image) }}" alt="Profile-Image">
                                @else
                                <img src="{{ asset('images/default/profile.png') }}" alt="Profile-Image">
                                @endif
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
                                                <li><a href="{{ route('customer.dashboard','#dashboard') }}"><i class="feather-home"></i><span>Dashboard</span></a></li>
                                                <li><a href="{{ route('customer.profile.index') }}"><i class="feather-user"></i><span>My Profile</span></a></li>
                                                <li><a><i class="feather-book-open"></i><span>Enrolled Courses</span></a></li>
                                                <li><a><i class="feather-bookmark"></i><span>Wishlist</span></a></li>
                                                <li><a><i class="feather-star"></i><span>Reviews</span></a></li>
                                                <li><a><i class="feather-help-circle"></i><span>Point History</span></a></li>
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
                    <div class="col-lg-9" id="profile">
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
                                        <div class="rbt-profile-content b2 d-flex align-items-center">
                                            <input id="myInput" type="text" value="{{ auth()->user()->own_referral_code }}" style="border: 0px transparent; width: 150px">
                                            <button class="btn btn-lg" value="copy" onclick="myFunction()" style="background-color:rgb(93, 155, 236); color: white">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="text-danger">
                                            To earn Reward points, simply copy and send this referral code to your friend when they register for HRDP online. Thank you for referring your friend!
                                        </span>
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
                                        <div class="rbt-profile-content b2">HRDP Reward Points Balance</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">{{ number_format(auth()->user()->point_balance, 0) }}</div>
                                    </div>
                                </div>
                                <!-- End Profile Row  -->
                                <div class="rbt-profile-row row row--15 mt--15">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="rbt-profile-content b2">Employee Status</div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="rbt-profile-content b2">
                                            @if (auth()->user()->employment_status == 1)
                                                Employee
                                            @elseif (auth()->user()->employment_status == 2)
                                                Employer
                                            @elseif (auth()->user()->employment_status == 3)
                                                Unemployed
                                            @elseif (auth()->user()->employment_status == 4)
                                                Retiree
                                            @elseif (auth()->user()->employment_status == 5)
                                                Student
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if (auth()->user()->employment_status == 1 || auth()->user()->employment_status == 2)
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Company Name</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">{{ auth()->user()->company_name ?: '-' }}</div>
                                        </div>
                                    </div>
                                    <div class="rbt-profile-row row row--15 mt--15">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="rbt-profile-content b2">Position</div>
                                        </div>
                                        <div class="col-lg-8 col-md-8">
                                            <div class="rbt-profile-content b2">{{ auth()->user()->position ?: '-' }}</div>
                                        </div>
                                    </div>
                                @endif
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