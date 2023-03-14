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
                    </div>
                    <!-- End Tutor Information  -->
                </div>
                <!-- End Dashboard Top  -->

                <div class="row g-5">
                    @include('customer.layouts.sidebar')
                    <div class="col-lg-9" id="profile">
                        <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                            <div class="content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Point History</h4>
                                </div>
                                <div class="d-none d-md-flex mb-3">
                                    <div class="pe-2 flex-fill">
                                        <input type="text" class="form-control datatable-input" id="description" placeholder="Description" data-col-index="2">
                                    </div>
                                    <div class="pe-2 flex-fill">
                                        <input type="number" class="form-control datatable-input" id="in" placeholder="In" data-col-index="2">
                                    </div>
                                    <div class="pe-2 flex-fill">
                                        <input type="number" class="form-control datatable-input" id="out" placeholder="Out" data-col-index="2">
                                    </div>
                                </div>
                                {{$dataTable->table(['class'=>'table table-checkable dataTable dtr-inline w-100'], false)}}
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
{{$dataTable->scripts()}}
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