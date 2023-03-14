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
                    @include('customer.layouts.sidebar')
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