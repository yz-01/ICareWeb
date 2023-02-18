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
                                                <li><a href="{{ route('customer.dashboard','#dashboard') }}"><i class="feather-home"></i><span>Dashboard</span></a></li>
                                                <li><a href="{{ route('customer.profile.index') }}"><i class="feather-user"></i><span>My Profile</span></a></li>
                                                <li><a><i class="feather-book-open"></i><span>Enrolled Courses</span></a></li>
                                                <li><a><i class="feather-bookmark"></i><span>Wishlist</span></a></li>
                                                <li><a><i class="feather-star"></i><span>Reviews</span></a></li>
                                                <li><a><i class="feather-help-circle"></i><span>My Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-shopping-bag"></i><span>Order History</span></a></li>
                                                <li><a><i class="feather-monitor"></i><span>My Courses</span></a></li>
                                                <li><a><i class="feather-volume-2"></i><span>Announcements</span></a></li>
                                                <li><a><i class="feather-message-square"></i><span>Quiz Attempts</span></a></li>
                                                <li><a><i class="feather-list"></i><span>Assignments</span></a></li>
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
                    <div class="col-lg-9">
                        <!-- Start Instructor Profile  -->
                        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                            <div class="content">

                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Settings</h4>
                                </div>

                                <div class="advance-tab-button mb--30">
                                    <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="settinsTab-4" role="tablist">
                                        <li role="presentation">
                                            <a href="" class="tab-button active">
                                                <span class="title">Profile</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ route('customer.profile.editPassword', auth()->user()->id) }}" class="tab-button">
                                                <span class="title">Password</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            @if($social == null)
                                            <a href="{{ route('customer.social.create') }}" class="tab-button">
                                                <span class="title">Social Share</span>
                                            </a>
                                            @else
                                            <a href="{{ route('customer.social.edit', auth()->user()->id) }}" class="tab-button">
                                                <span class="title">Social Share</span>
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>

                                <form action="{{ route('customer.profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="rbt-dashboard-content-wrapper">
                                                <!-- Start Banner  -->
                                                <input type="file" name="banner" id="banner" onchange="readURL(this,1)" style="z-index:2; width: 100% !important;" hidden>
                                                <a id="upload-banner-btn">
                                                    @if($customer->banner)
                                                        <div id="banner-icon" class="tutor-bg-photo bg_image--22 height-350" style="background-image: url({{ asset($customer->banner) }});"></div>
                                                    @else
                                                        <div id="banner-icon" class="tutor-bg-photo bg_image--22 height-350" style="background-image: url({{ asset('images/welcome/bg-image-19.jpg') }});"></div>
                                                    @endif
                                                    <img id="bannerResult" class="tutor-bg-photo bg_image--22 height-350" style="object-fit: contain !important; display: none;" />
                                                </a>
                                                <!-- End Banner  -->
                                                <!-- Start Tutor Information  -->
                                                <div class="rbt-tutor-information">
                                                    <div class="rbt-tutor-information-left">
                                                        <div class="thumbnail rbt-avatars size-lg position-relative">
                                                            <input type="file" name="image" id="image" onchange="readURL(this,1)" style="z-index:2; width: 100% !important;" hidden>
                                                            <a id="upload-image-btn">
                                                                @if($customer->image)
                                                                    <img id="user-icon" src="{{ asset($customer->image) }}" style="width: 100px; height: 100px;">
                                                                @else
                                                                    <i id="user-icon" class="fas fa-user py-3 px-4" style="font-size: 110px; background-color: white; border-radius: 30px; color:rgb(93, 155, 236)"></i>
                                                                @endif
                                                                <img id="imageResult" class="w-100 h-100" style="object-fit: contain !important; display: none;" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Tutor Information  -->
                                            </div>
                                            <!-- Start Profile Row  -->
                                            <div class="rbt-profile-row rbt-default-form row row--15">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $customer->name}}" placeholder="Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Identity Card <span class="text-danger">*</span></label>
                                                        <input name="identity_card" type="text" class="form-control @error('identity_card') is-invalid @enderror" value="{{ $customer->identity_card}}" placeholder="Identity Card" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Email <span class="text-danger">*</span></label>
                                                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $customer->email}}" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ $customer->phone}}" placeholder="Phone" minlength="10" maxlength="13" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Address <span class="text-danger">*</span></label>
                                                        <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $customer->address}}" placeholder="Address" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>City <span class="text-danger">*</span></label>
                                                        <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ $customer->city}}" placeholder="City" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>State <span class="text-danger">*</span></label>
                                                        <input name="state" type="text" class="form-control @error('state') is-invalid @enderror" value="{{ $customer->state}}" placeholder="State" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Postal Code <span class="text-danger">*</span></label>
                                                        <input name="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" value="{{ $customer->postal_code}}" placeholder="Postal Code" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Country <span class="text-danger">*</span></label>
                                                        <div class="rbt-modern-select bg-transparent height-45">
                                                            <select name="country_id" class="form-control @error('country_id') is-invalid @enderror" required>
                                                                <option value="">-- Select Country --</option>
                                                                @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}" {{ $customer->country_id == $country->id ? 'selected' : ''}}>{{ $country->code }} - {{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="rbt-form-group">
                                                        <label>Employment Status <span class="text-danger">*</span></label>
                                                        <div class="rbt-modern-select bg-transparent height-45">
                                                            <select name="employment_status" class="form-control @error('employment_status') is-invalid @enderror" required>
                                                                <option value="">-- Select Employment Status --</option>
                                                                <option value="1" {{ $customer->employment_status == 1 ? 'selected' : ''}}>Employee</option>
                                                                <option value="2" {{ $customer->employment_status == 2 ? 'selected' : ''}}>Employer</option>
                                                                <option value="3" {{ $customer->employment_status == 3 ? 'selected' : ''}}>Unemployed</option>
                                                                <option value="4" {{ $customer->employment_status == 4 ? 'selected' : ''}}>Retiree</option>
                                                                <option value="5" {{ $customer->employment_status == 5 ? 'selected' : ''}}>Student</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="padding-top: 10px;">
                                                    <div class="rbt-form-group">
                                                        <label>Company Name<span class="text-danger"></span></label>
                                                        <input name="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" value="{{ $customer->company_name }}" placeholder="Company Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="padding-top: 10px;">
                                                    <div class="rbt-form-group">
                                                        <label>Position<span class="text-danger"></span></label>
                                                        <input name="position" type="text" class="form-control @error('position') is-invalid @enderror" value="{{ $customer->position }}" placeholder="Your Position">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt--20">
                                                    <div class="rbt-form-group">
                                                        <button class="rbt-btn btn-gradient" type="submit">Update Info</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End Profile Row  -->
                                        </div>
                                    </div>
                                </form>
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
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            console.log(input.name);
            var reader = new FileReader();

            if (input.name == 'image') {
                reader.onload = function(e) {
                    $('#user-icon').hide();
                    $('#imageResult').attr('src', e.target.result);
                    $('#imageResult').show();
                };
                reader.readAsDataURL(input.files[0]);
            }
            if (input.name == 'banner') {
                reader.onload = function(e) {
                    $('#banner-icon').hide();
                    $('#bannerResult').attr('src', e.target.result);
                    $('#bannerResult').show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    document.getElementById('upload-image-btn').addEventListener('click', function() {
        document.getElementById('image').click();
    });

    document.getElementById('upload-banner-btn').addEventListener('click', function() {
        document.getElementById('banner').click();
    });

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