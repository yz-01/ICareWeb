@extends('layouts.app')

@section('content')
<!-- Start Banner Area -->
<div class="rbt-banner-5 height-650 bg_image bg_image--19" style="background-image: url({{ asset('images/welcome/bg-image-19.jpg') }})">
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

<!-- Start Featured Course Area  -->
<div class="rbt-featured-course bg-color-white rbt-section-gapTop" id="course">
    <div class="container">
        <div class="row g-5 align-items-end mb--60">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="section-title text-center">
                    <h2 class="title">Featured Courses</h2>
                    <p class="description mt--20">
                        Build a bright future and take your career to the next level with us.
                    </p>
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
        <div class="row g-5" style="text-align: center !important">
            <!-- Start Single Card  -->
            <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/www.jpeg') }}" alt="Card image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
                            {{-- <div class="rbt-badge-3 bg-white">
                                <span>-40%</span>
                                <span>Off</span>
                            </div> --}}
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

                        <p class="rbt-card-text">设计属于您的企业棋盘 <br />
                            为企业设计一个与股东，顾客，团队的三赢模式</p>
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
                                <span class="current-price">RM4,218.80</span>
                            </div>
                            @if (auth()->guard('customer')->check() == true)
                                <a href="{{ route('customer.cart.index') }}" class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart
                                </a>
                            @else
                                <a href="{{ route('cart.index') }}" class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart
                                </a>
                            @endif
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
                            <img src="{{ asset('images/oe/siwei.jpeg') }}" alt="Card image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
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

                        <p class="rbt-card-text">
                            思维模式～一堂企业的心灵课程 <br />
                            三天让您沉淀,领悟企业要的终点
                        </p>
                        <br />
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
                                <span class="current-price">RM7,398.80</span>
                            </div>
                            <a href="{{ route('cart.index') }}" class="rbt-btn-link left-icon" ><i
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
                            <img src="{{ asset('images/oe/5G.jpeg') }}" alt="Card image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
                            {{-- <div class="rbt-badge-3 bg-white">
                                <span>-10%</span>
                                <span>Off</span>
                            </div> --}}
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
                        <p class="rbt-card-text">
                            一堂让您懂得合作、合并、善用股权的力量来杠杆 <br />
                            企业价值的新商业模式5G课程
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
                                <span class="current-price">RM17,808.00</span>
                            </div>
                            <a href="{{ route('cart.index') }}" class="rbt-btn-link left-icon" ><i
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
                            <img src="{{ asset('images/oe/top.jpeg') }}" alt="Card image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
                            {{-- <div class="rbt-badge-3 bg-white">
                                <span>-40%</span>
                                <span>Off</span>
                            </div> --}}
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
                        <p class="rbt-card-text">
                            引爆您团队的激情,了解企业需求,体谅同事 <br />
                            学会承担责任,适合管理层的培训课程
                        </p>
                        <br/>
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
                                <span class="current-price">RM4,218.80</span>
                            </div>
                            <a href="{{ route('cart.index') }}" class="rbt-btn-link left-icon" ><i
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
                            <img src="{{ asset('images/oe/ceo.jpeg') }}" alt="Card image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
                            {{-- <div class="rbt-badge-3 bg-white">
                                <span>-20%</span>
                                <span>Off</span>
                            </div> --}}
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
                        <p class="rbt-card-text">
                            四天让您成为演说家
                        </p>
                        <br/>
                        <br/>
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
                                <span class="current-price">RM25,228.00</span>
                            </div>
                            <a href="{{ route('cart.index') }}" class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Card  -->

            <!-- Start Single Card  -->
            {{-- <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="250" data-sal="slide-up" data-sal-duration="800">
                <div class="rbt-card variation-01 rbt-hover">
                    <div class="rbt-card-img">
                        <a >
                            <img src="{{ asset('images/oe/mdmt.gif') }}" alt="Card image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
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
                        <br/>
                        <br/>
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
                                <span class="current-price">RM31588.00</span>
                            </div>
                            <a href="{{ route('cart.index') }}" class="rbt-btn-link left-icon" ><i
                                    class="feather-shopping-cart"></i> Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- End Single Card  -->
        </div>
        <!-- End Card Area -->
    </div>
</div>
<!-- End Featured Course Area  -->

<!-- Start category Area  -->
<div class="rbt-category-area bg-color-white rbt-section-gapTop" id="trainer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb--60">
                <div class="section-title text-center">
                    <h2 class="title">Top Trainers</h2>
                    <p class="description mt--20">
                        Our top trainers are specialists with years of expertise and a passion for helping people and organizations reach their maximum potential. They provide our clients with high-quality, tailored leadership, communication, and technical skills training.
                    </p>
                </div>
            </div>
        </div>
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

<div class="rbt-category-area bg-color-white rbt-section-gap" id="state">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb--60">
                <div class="section-title text-center">
                    <h2 class="title">State</h2>
                    <p class="description mt--20">
                        Join our courses from anywhere in the country! Choose your preferred state to see the available courses in your area. Whether you're looking for in-person or online learning, we have options for you. Start your educational journey today by selecting your state and browsing our course offerings.
                    </p>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <!-- Start Category Box Layout  -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a class="rbt-cat-box rbt-cat-box-1 image-overlaping-content on-hover-content-visible" >
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{ asset('images/flag/johor.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">JOHOR</h5>
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
                            <img src="{{ ('images/flag/kedah.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">KEDAH</h5>
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
                            <img src="{{ ('images/flag/kelantan.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">KELANTAN</h5>
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
                            <img src="{{ asset('images/flag/perak.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">PERAK</h5>
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
                            <img src="{{ asset('images/flag/selangor.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">SELANGOR</h5>
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
                            <img src="{{ asset('images/flag/melacca.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">MELACCA</h5>
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
                            <img src="{{ asset('images/flag/negerisembilan.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">NEGERI SEMBILAN</h5>
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
                            <img src="{{ asset('images/flag/pahang.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">PAHANG</h5>
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
                            <img src="{{ asset('images/flag/perlis.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">PERLIS</h5>
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
                            <img src="{{ asset('images/flag/penang.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">PENANG</h5>
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
                            <img src="{{ asset('images/flag/sabah.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">SABAH</h5>
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
                            <img src="{{ asset('images/flag/sarawak.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">SARAWAK</h5>
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
                            <img src="{{ asset('images/flag/terengganu.png') }}" alt="Icons Images" style="object-fit: contain">
                        </div>
                        <div class="content">
                            <h5 class="title">TERENGGANU</h5>
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

<div class="rbt-counterup-area bg_image bg_image_fixed bg_image--20 ptb--170 bg-black-overlay" data-black-overlay="2" style="background-image: url({{ asset('images/oe/bg4.jpg') }})">
    <div class="conter-style-2">
        <div class="container">
            <div class="row g-5">
                <!-- Start Single Counter  -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 single-counter">
                    <div class="rbt-counterup style-2">
                        <div class="inner">
                            <div class="content">
                                <h3 class="counter"><span class="odometer" data-count="5000">00</span>
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
                                <h3 class="counter"><span class="odometer" data-count="10000">00</span>
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
                                <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                </h3>
                                <span class="subtitle">Certified trainers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Counter  -->
            </div>
        </div>
    </div>
</div>

<div class="rbt-testimonial-area bg-color-extra2 rbt-section-gap" id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb--60">
                <div class="section-title text-center">
                    <h2 class="title">Student's Testimonials</h2>
                    {{-- <p class="description mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our HRDP.</p> --}}
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
<div class="rbt-rbt-blog-area rbt-section-gapTop bg-gradient-8 rbt-round-bottom-shape" id="news">
    <div class="wrapper pb--50 rbt-index-upper">
        <div class="container">
            <div class="row g-5 align-items-end mb--60">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="section-title text-center">
                        <h2 class="title color-white">Latest News</h2>
                        {{-- <p class="description color-white-off mt--20">Learning communicate to global world and build a bright future and career development, increase your skill with our HRDP.</p> --}}
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span>14 Feb 2023</span>
                                </li>
                            </ul>
                            <h5 style="font-weight: 600">
                                <a>
                                    Greetings! We are thrilled to have you visit HRDP. 
                                    <br /><br />As a platform dedicated to promoting business growth and professional development, we invite you to join us as either a trainer or a merchant.
                                    <br /><br />By becoming a part of our community, you will have the opportunity to expand your business and reach new heights in your career. 
                                    <br /><br />We look forward to supporting you on this exciting journey.
                                </a>
                            </h5>
                            {{-- <div class="rbt-card-bottom mt--40">
                                <a class="transparent-button" >Learn More<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- End Single Card  -->

                <!-- Start Single Card  -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="rbt-card variation-02 rbt-hover card-minimal">
                        <div class="rbt-card-body">
                            <ul class="meta-list justify-content-start mb--30">
                                <li class="list-item">
                                    <i class="feather-clock"></i>
                                    <span>14 Feb 2023</span>
                                </li>
                            </ul>
                            <h5 style="font-weight: 600">
                                <a >
                                    We are excited to offer our members a unique rewards program! 
                                    <br /><br />With every purchase of a course or product, you will earn points that can be used as cash towards a variety of perks. 
                                    <br /><br />Accumulate your points and redeem them for additional courses, products, vouchers, and more. 
                                    <br /><br />Our reward program is just one more way we show appreciation for your loyalty to our brand. 
                                    Start earning points today!
                                </a>
                            </h5>
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
                                <label for="">Looking for a way to earn rewards for doing what you already do? Join our HRDP referral program and start earning reward points today! As a member, you can refer your friends and family to join HRDP, and you'll earn points that can be redeemed for free products, special offers, and courses. The more people you refer, the more rewards you can earn. Don't miss out on this opportunity to get the most out of your HRDP membership. Sign up today and start earning rewards!</label>
                            </div>
                            <div class="col-lg-12 pt-4">
                                <a href="{{ route('customer.register.create') }}" class="px-3">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse radius-round mt-2">
                                        <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Register as a Member Now</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </a>
                                <a href="{{ route('company_user.register.create') }}">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse radius-round mt-2">
                                        <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Register as a Company Now</span>
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
