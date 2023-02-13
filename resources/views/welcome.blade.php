@extends('layouts.app')

@section('content')
<!-- Start Banner Area -->
<div class="rbt-banner-5 height-650 bg_image bg_image--19" style="background-image: url({{ asset('images/welcome/H_Banner.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner text-start">
                    <h2 class="title" style="font-size: 35px">HRDP is a one-stop platform for all your human resource development needs in Malaysia.</h2>
                    <p class="description">Join us now and take your professional development to the next level!</p>
                    {{-- <div class="slider-btn rbt-button-group justify-content-start">
                        <a class="rbt-btn btn-border icon-hover color-white radius-round" >
                            <span class="btn-text">Explore Courses</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                        <a class="rbt-btn-link color-white" >Start learning<i class="feather-arrow-right"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->


<!-- Start category Area  -->
<div class="rbt-category-area bg-color-white rbt-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/oe/ddckbg.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">Datuk Wira (Dr) Calvin Khiu</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->
            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ ('images/oe/jamie.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">Dr Jamie Chin</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->

            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a  class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible">
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ ('images/oe/eunice.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">(Dr) Eunice Chew</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->

            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/oe/grace.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">(Dr) Grace Yee</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->

            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/oe/jason.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">Jason Kok</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->

            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/oe/kingsley.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">Kingsley Chew</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->

            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/oe/xiaogu.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">小姑</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->

            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible">
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/oe/michelle.png') }}" alt="Icons Images">
                        </div>
                        <div class="content">
                            <h5 class="title">Michelle Tai</h5>
                            <div class="read-more-btn">
                                <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Category Box Layout  -->
        </div>
    </div>
</div>
<!-- End category Area  -->

<!-- Start Featured Course Area  -->
<div class="rbt-featured-course bg-color-white rbt-section-gap">
    <div class="container">
        <div class="row g-5 align-items-end mb--60">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="section-title text-start">
                    <h2 class="title">Featured Courses</h2>
                    <p class="description mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our HRDP.</p>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-12 col-12">
                <div class="load-more-btn text-start text-lg-end">
                    <a class="rbt-btn btn-border icon-hover radius-round" >
                        <span class="btn-text">Browse Histudy Courses</span>
                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </a>
                </div>
            </div> --}}
        </div>

        <!-- Start Card Area -->
        <div class="row g-5">
            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/www.jpg') }}" alt="Card image" style="height: 240px; width: 100%;">
                            <div class="rbt-badge-3 bg-white">
                                <span>-40%</span>
                                <span>Off</span>
                            </div>
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <div class="rbt-card-top">
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (10k+ Reviews)</span>
                            </div>
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" title="Bookmark" ><i
                                        class="feather-bookmark"></i></a>
                            </div>
                        </div>

                        <h4 class="rbt-card-title"><a >OE for WWW Model</a>
                        </h4>

                        <ul class="rbt-meta">
                            <li><i class="feather-book"></i>10 Lessons</li>
                            <li><i class="feather-users"></i>1000 Students</li>
                        </ul>

                        <p class="rbt-card-text">Design your own business board. Design a www model with shareholders, customers and teams for enterprises.</p>
                        <div class="rbt-author-meta mb--10">
                            <div class="rbt-avater">
                                <a >
                                    <img src="{{ asset('images/oe/ddck.png') }}" alt="Datuk Wira (Dr) Calvin Khiu">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By Datuk Wira (Dr) Calvin Khiu
                            </div>
                        </div>
                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                <span class="current-price">RM3218.80</span>
                                <span class="off-price">RM4218.80</span>
                            </div>
                            <a class="rbt-btn-link left-icon" ><i
                                class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/siwei.jpeg') }}" alt="Card image" style="height: 240px; width: 100%;">
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <div class="rbt-card-top">
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (10k+ Reviews)</span>
                            </div>
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" title="Bookmark" ><i
                                        class="feather-bookmark"></i></a>
                            </div>
                        </div>
                        <h4 class="rbt-card-title"><a >OE for Entrepreneurship</a>
                        </h4>
                        <ul class="rbt-meta">
                            <li><i class="feather-book"></i>10 Lessons</li>
                            <li><i class="feather-users"></i>1000 Students</li>
                        </ul>

                        <p class="rbt-card-text">A lesson in the soul of an enterprise. Three days for you to settle down and understand the end point of the enterprise.</p>
                        <div class="rbt-author-meta mb--10">
                            <div class="rbt-avater">
                                <a >
                                    <img src="{{ asset('images/oe/ddck.png') }}" alt="ddck">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By Datuk Wira (Dr) Calvin Khiu
                            </div>
                        </div>
                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                <span class="current-price">RM6398.80</span>
                                <span class="off-price">RM7398.80</span>
                            </div>
                            <a class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/5G.jpg') }}" alt="Card image" style="height: 240px; width: 100%;">
                            <div class="rbt-badge-3 bg-white">
                                <span>-10%</span>
                                <span>Off</span>
                            </div>
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <div class="rbt-card-top">
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (10k+ Reviews)</span>
                            </div>
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" title="Bookmark" ><i
                                        class="feather-bookmark"></i></a>
                            </div>
                        </div>
                        <h4 class="rbt-card-title"><a >OE for Business Model 5G</a>
                        </h4>
                        <ul class="rbt-meta">
                            <li><i class="feather-book"></i>8 Lessons</li>
                            <li><i class="feather-users"></i>1000+ Students</li>
                        </ul>
                        <p class="rbt-card-text">Let you know how to cooperate, merge, and make good use of the power of equity to leverage.
                            </p>

                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a >
                                    <img src="{{ asset('images/oe/ddck.png') }}" alt="ddck">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By Datuk Wira (Dr) Calvin Khiu
                            </div>
                        </div>
                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                <span class="current-price">RM15808</span>
                                <span class="off-price">RM17808</span>
                            </div>
                            <a class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/top.jpeg') }}" alt="Card image" style="height: 240px; width: 100%;">
                            <div class="rbt-badge-3 bg-white">
                                <span>-40%</span>
                                <span>Off</span>
                            </div>
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <div class="rbt-card-top">
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (10k+ Reviews)</span>
                            </div>
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" title="Bookmark" ><i
                                        class="feather-bookmark"></i></a>
                            </div>
                        </div>

                        <h4 class="rbt-card-title"><a >OE for Top Management</a>
                        </h4>
                        <ul class="rbt-meta">
                            <li><i class="feather-book"></i>20 Lessons</li>
                            <li><i class="feather-users"></i>1000+ Students</li>
                        </ul>
                        <p class="rbt-card-text">Detonate the passion of your team, understand the needs of the enterprise, and be considerate of colleagues.</p>
                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a >
                                    <img src="{{ asset('images/oe/ddck.png') }}" alt="ddck">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By Datuk Wira (Dr) Calvin Khiu
                            </div>
                        </div>

                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                <span class="current-price">RM3218.80</span>
                                <span class="off-price">RM4218.80</span>
                            </div>
                            <a class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="200" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/ceo.jpeg') }}" alt="Card image" style="height: 240px; width: 100%;">
                            <div class="rbt-badge-3 bg-white">
                                <span>-20%</span>
                                <span>Off</span>
                            </div>
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <div class="rbt-card-top">
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (10K+ Reviews)</span>
                            </div>
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" title="Bookmark" ><i
                                        class="feather-bookmark"></i></a>
                            </div>
                        </div>
                        <h4 class="rbt-card-title"><a >OE for CEO</a>
                        </h4>
                        <ul class="rbt-meta">
                            <li><i class="feather-book"></i>12 Lessons</li>
                            <li><i class="feather-users"></i>1000+ Students</li>
                        </ul>
                        <p class="rbt-card-text">Four days to make you a public speaker.</p>
                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a >
                                    <img src="{{ asset('images/oe/ddck.png') }}" alt="ddck">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By Datuk Wira (Dr) Calvin Khiu
                            </div>
                        </div>
                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                <span class="current-price">RM22228</span>
                                <span class="off-price">RM25228</span>
                            </div>
                            <a class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/mdmt.gif') }}" alt="Card image" style="height: 240px; width: 100%;">
                        </a>
                    </div>
                    <div class="rbt-card-body">
                        <div class="rbt-card-top">
                            <div class="rbt-review">
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="rating-count"> (10k+ Reviews)</span>
                            </div>
                            <div class="rbt-bookmark-btn">
                                <a class="rbt-round-btn" title="Bookmark" ><i
                                        class="feather-bookmark"></i></a>
                            </div>
                        </div>
                        <h4 class="rbt-card-title"><a >OE for MDMT</a>
                        </h4>
                        <ul class="rbt-meta">
                            <li><i class="feather-book"></i>8 Lessons</li>
                            <li><i class="feather-users"></i>1000+ Students</li>
                        </ul>
                        <p class="rbt-card-text">Million Dollar Mentor Table</p>

                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a >
                                    <img src="{{ asset('images/oe/ddck.png') }}" alt="ddck">
                                </a>
                            </div>
                            <div class="rbt-author-info">
                                By Datuk Wira (Dr) Calvin Khiu
                            </div>
                        </div>
                        <div class="rbt-card-bottom">
                            <div class="rbt-price">
                                <span class="current-price">RM28888</span>
                                <span class="off-price">RM31588</span>
                            </div>
                            <a class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->
        </div>
        <!-- End Card Area -->
    </div>
</div>
<!-- End Featured Course Area  -->


<div class="rbt-counterup-area bg_image bg_image_fixed bg_image--20 ptb--170 bg-black-overlay" data-black-overlay="2" style="background-image: url({{ asset('images/oe/bg2.jpg') }})">
    <div class="conter-style-2">
        <div class="container">
            <div class="row g-5">
                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                    <div class="rbt-counterup style-2">
                        <div class="inner">
                            <div class="content">
                                <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                </h3>
                                <span class="subtitle">Learners &amp; counting</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                    <div class="rbt-counterup style-2">
                        <div class="inner">
                            <div class="content">
                                <h3 class="counter"><span class="odometer" data-count="800">00</span>
                                </h3>
                                <span class="subtitle">Courses & Video</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                    <div class="rbt-counterup style-2">
                        <div class="inner">
                            <div class="content">
                                <h3 class="counter"><span class="odometer" data-count="1000">00</span>
                                </h3>
                                <span class="subtitle">Certified Students</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->

                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                    <div class="rbt-counterup style-2">
                        <div class="inner">
                            <div class="content">
                                <h3 class="counter"><span class="odometer" data-count="100">00</span>
                                </h3>
                                <span class="subtitle">Certified Students</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->
            </div>
        </div>
    </div>
</div>

<div class="rbt-testimonial-area bg-color-extra2 rbt-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb--60">
                <div class="section-title text-center">
                    <h2 class="title">Student's Testimonials</h2>
                    <p class="description mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our HRDP.</p>
                </div>
            </div>
        </div>
        <div class="testimonial-item-3-activation swiper rbt-arrow-between gutter-swiper-30">
            <div class="swiper-wrapper">

                <!-- Start Single Testimonial  -->
                <div class="swiper-slide">
                    <div class="single-slide">
                        <div class="rbt-testimonial-box">
                            <div class="inner bg-no-shadow bg-color-primary-opacity">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('images/oe/tes1.jpg') }}" alt="Clint Images">
                                    </div>
                                    <div class="client-info">
                                        <h5 class="title">Fred Tan</h5>
                                        {{-- <span>Executive Chairman <i>@ Google</i></span> --}}
                                    </div>
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">OE For Ceo 总裁路演
                                        这堂皇牌课超越了我的想象！太强了、可以把一个不敢站上舞台的人，在舞台上享受路演☺️
                                        还可以把全场的气氛搞的很high！爽😊</p>
                                    <div class="rating mt--20">
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="swiper-slide">
                    <div class="single-slide">
                        <div class="rbt-testimonial-box">
                            <div class="inner bg-no-shadow bg-color-primary-opacity">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('images/oe/tes2.png') }}" alt="Clint Images">
                                    </div>
                                    <div class="client-info">
                                        <h5 class="title">Kae Cynn</h5>
                                        {{-- <span>CEO <i>@ Google</i></span> --}}
                                    </div>
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">MDMT【宇宙级的课程🌍】
                                        真的很感恩自己有这个福报可以上这么这么棒的一堂课❤️
                                        经过这短短的三天，我们大家都重生了〰️</p>
                                    <div class="rating mt--20">
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="swiper-slide">
                    <div class="single-slide">
                        <div class="rbt-testimonial-box">
                            <div class="inner bg-no-shadow bg-color-primary-opacity">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('images/oe/tes3.jpg') }}" alt="Clint Images">
                                    </div>
                                    <div class="client-info">
                                        <h5 class="title">Gary Thong KL </h5>
                                        {{-- <span>Executive Designer <i>@ Google</i></span> --}}
                                    </div>
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">真的，真的，真的（重要的事情要说三次）
                                        非常棒！！！这让我发觉不一样的自己，也知道自己以后需要做些什么、和走哪一条路。</p>
                                    <div class="rating mt--20">
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="swiper-slide">
                    <div class="single-slide">
                        <div class="rbt-testimonial-box">
                            <div class="inner bg-no-shadow bg-color-primary-opacity">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('images/oe/tes4.jpg') }}" alt="Clint Images">
                                    </div>
                                    <div class="client-info">
                                        <h5 class="title">Tu Soon Heng </h5>
                                        {{-- <span>Executive Designer <i>@ Google</i></span> --}}
                                    </div>
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">人与人之间，都有一道墙
                                        <br />CEO总裁班，有一颗炸弹💣
                                        <br />竟然可以炸开它!<br />我们终于突破了🥳</p>
                                    <div class="rating mt--20">
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->

                <!-- Start Single Testimonial  -->
                <div class="swiper-slide">
                    <div class="single-slide">
                        <div class="rbt-testimonial-box">
                            <div class="inner bg-no-shadow bg-color-primary-opacity">
                                <div class="clint-info-wrapper">
                                    <div class="thumb">
                                        <img src="{{ asset('images/oe/tes5.jpg') }}" alt="Clint Images">
                                    </div>
                                    <div class="client-info">
                                        <h5 class="title">SY Teo</h5>
                                        {{-- <span>Executive Designer <i>@ Google</i></span> --}}
                                    </div>
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">非常感恩 Dato 创造一个这么棒，这么有文化的平台，让同频率的人全部聚在一起，大家往同一个目标前进👍👍👍有一群人陪着你一起走😘😘😘</p>
                                    <div class="rating mt--20">
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                        <a ><i class="fa fa-star"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial  -->
            </div>

            <div class="rbt-swiper-arrow rbt-arrow-left">
                <div class="custom-overfolow">
                    <i class="rbt-icon feather-arrow-left"></i>
                    <i class="rbt-icon-top feather-arrow-left"></i>
                </div>
            </div>

            <div class="rbt-swiper-arrow rbt-arrow-right">
                <div class="custom-overfolow">
                    <i class="rbt-icon feather-arrow-right"></i>
                    <i class="rbt-icon-top feather-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Start Blog Style -->
<div class="rbt-rbt-blog-area rbt-section-gapTop bg-gradient-8 rbt-round-bottom-shape">
    <div class="wrapper pb--50 rbt-index-upper">
        <div class="container">
            <div class="row g-5 align-items-end mb--60">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="section-title text-start">
                        <h2 class="title color-white">Latest News</h2>
                        <p class="description color-white-off mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our HRDP.</p>
                    </div>
                </div>
                {{-- <div class="col-lg-6 col-md-12 col-12">
                    <div class="load-more-btn text-start text-lg-end">
                        <a class="rbt-btn btn-border icon-hover radius-round color-white-off" >
                            <span class="btn-text">See All Articles</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div> --}}
            </div>
            <!-- Start Card Area -->
            <div class="row g-5">
                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span>20 March 2022</span>
                                </li>
                            </ul>
                            <h4 class="rbt-card-title"><a >Learn From These You Learn Education.</a></h4>
                            {{-- <div class="rbt-card-bottom mt--40">
                                <a class="transparent-button" >Learn More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span>30 May 2022</span>
                                </li>
                            </ul>
                            <h4 class="rbt-card-title"><a >Think You're An Expert In Education?</a></h4>
                            {{-- <div class="rbt-card-bottom mt--40">
                                <a class="transparent-button" >Learn More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span>15 July 2022</span>
                                </li>
                            </ul>
                            <h4 class="rbt-card-title"><a >Seven Easy Rules Of Education.</a></h4>
                            {{-- <div class="rbt-card-bottom mt--40">
                                <a class="transparent-button" >Learn More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->
            </div>
            <!-- End Card Area -->
        </div>
    </div>
</div>
<!-- End Blog Style -->


<!-- Start Newsletter Area  -->
<div class="rbt-newsletter-area bg-color-white rbt-section-gapBottom pt--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <h2 class="title">Want to get special offers <br /> and Course updates?</h2>
                    {{-- <form action="#" class="newsletter-form-1 mt--50 radius-round"> --}}
                        <div class="row pt-5">
                            <div class="col-lg-12">
                                <a href="{{ route('customer.register.create') }}">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse radius-round">
                                        <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Register Now</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Newsletter Area  -->
@endsection
