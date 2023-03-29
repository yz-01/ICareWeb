<div>
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">

            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area  -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">All Courses</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Courses</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> {{$allcourses->count()}} Courses
                                </a>
                            </div>
                            {{--                            <p class="description">Courses that help beginner designers become true unicorns. </p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-xl-5 col-lg-12 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item"><button class="rbt-grid-view active" title="Grid Layout"><i class="feather-grid"></i> <span class="text">Grid</span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view" title="List Layout"><i class="feather-list"></i> <span class="text">List</span></button></li>
                                    </ul>
                                </div>
                                <div class="rbt-short-item">
                                    <span class="course-index">Showing {{($courses->firstItem())}} to {{ $courses->lastItem()}} of {{$courses->count()}} results</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-12 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-end justify-content-start justify-content-xl-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="Search Your Course.." wire:model="searchCourse">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="rbt-short-item">
                                    <div class="filter-select">
                                        <span class="select-label d-block">Select Trainer</span>
                                        <div class="filter-select rbt-modern-select search-by-category">
                                            <select wire:model="searchTrainer" wire:change="trainerChange">
                                                <option value="0">--Select Trainer--</option>

                                            @foreach($trainers as $trainer)
                                                    <option value="{{$trainer->id}}" {{$searchTrainer == $trainer->id ? 'selected':''}}>{{$trainer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="rbt-short-item">
                                    <div class="filter-select">
                                        <span class="select-label d-block">Short By</span>
                                        <div class="filter-select rbt-modern-select search-by-category">
                                            <select wire:model="searchShort" wire:change="shortChange">
                                                <option value="0">Default</option>
                                                <option value="1">Price: low to high</option>
                                                <option value="2">Price: high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{--                                <div class="rbt-short-item">--}}
                                {{--                                    <div class="view-more-btn text-start text-sm-end">--}}
                                {{--                                        <button class="discover-filter-button discover-filter-activation rbt-btn btn-white btn-md radius-round">Filter<i class="feather-filter"></i></button>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>

    <!-- Start Card Style -->
    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rbt-course-grid-column">
                    @foreach($courses as $course)
                        <!-- Start Single Card  -->
                            <div class="course-grid-3">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{route('course',['course'=>$course])}}">
                                            <img src="{{ $course->banner ? asset($course->banner) :asset('assets/images/course/course-online-02.jpg') }}" alt="Course image">
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
                                                <span class="rating-count"> (15 Reviews)</span>
                                            </div>
                                            <div class="rbt-bookmark-btn">
                                                <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                        class="feather-bookmark"></i></a>
                                            </div>
                                        </div>
                                        <h4 class="rbt-card-title"><a href="{{route('course',['course'=>$course])}}">{{$course->title}}</a>
                                        </h4>
                                        {{--                                            <ul class="rbt-meta">--}}
                                        {{--                                                <li><i class="feather-book"></i>12 Lessons</li>--}}
                                        {{--                                                <li><i class="feather-users"></i>50 Students</li>--}}
                                        {{--                                            </ul>--}}

                                        <p class="rbt-card-text">{!! $course->description !!}</p>
                                        <div class="rbt-author-meta mb--10">
                                            <div class="rbt-avater">
                                                <a href="#">
                                                    <img src="{{ $course->trainer->image ? asset($course->trainer->image):asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                                </a>
                                            </div>
                                            <div class="rbt-author-info">
{{--                                                {{print_r($course->trainer)}}--}}
                                                By <a href="{{route('courselistTrainer',['trainer'=>$course->trainer])}}"> {{$course->trainer->name}}</a>
                                            </div>
                                        </div>
                                        <div class="rbt-card-bottom">
                                            <div class="rbt-price">
                                                <span class="current-price">RM{{number_format($course->price,1,'.',',')}}</span>
                                            </div>
                                            <a class="rbt-btn-link left-icon" href="{{route('addtocart',['course'=>$course])}}"><i
                                                    class="feather-shopping-cart"></i> Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Card  -->
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt--60">
                            {{$courses->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->
</div>

