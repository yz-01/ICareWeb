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
                        <!-- Start Instructor Profile  -->
                        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                            <div class="content">

                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Settings</h4>
                                </div>

                                <div class="advance-tab-button mb--30">
                                    <ul class="nav nav-tabs tab-button-style-2 justify-content-start" id="settinsTab-4" role="tablist">
                                        <li role="presentation">
                                            <a href="{{ route('customer.profile.edit', auth()->user()->id) }}" class="tab-button">
                                                <span class="title">Profile</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="{{ route('customer.profile.editPassword', auth()->user()->id) }}" class="tab-button">
                                                <span class="title">Password</span>
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="" class="tab-button active">
                                                <span class="title">Social Share</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <!-- Start Profile Row  -->
                                        <form action="{{ route('customer.social.store', auth()->user()->id) }}" class="rbt-profile-row rbt-default-form row row--15" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="col-12">
                                                <div class="rbt-form-group">
                                                    <label for="facebook"><i class="feather-facebook"></i> Facebook</label>
                                                    <input name="facebook" id="facebook" type="text" placeholder="https://facebook.com/">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="rbt-form-group">
                                                    <label for="twitter"><i class="feather-twitter"></i> Twitter</label>
                                                    <input name="twitter" id="twitter" type="text" placeholder="https://twitter.com/">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="rbt-form-group">
                                                    <label for="linkedin"><i class="feather-instagram"></i> Instagram</label>
                                                    <input name="linkedin" id="linkedin" type="text" placeholder="https://linkedin.com/">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="rbt-form-group">
                                                    <label for="website"><i class="feather-globe"></i> Website</label>
                                                    <input name="website" id="website" type="text" placeholder="https://website.com/">
                                                </div>
                                            </div>
                                            <div class="col-12 mt--10">
                                                <div class="rbt-form-group">
                                                    <button class="rbt-btn btn-gradient" type="submit">Create Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Profile Row  -->
                                    </div>
                                </div>
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