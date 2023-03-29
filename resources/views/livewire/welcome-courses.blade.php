<!-- Start Card Area -->
<div class="row g-5" style="text-align: center !important">
@forelse($courses as $course)
    <!-- Start Single Card  -->
        <div class="col-lg-4 col-md-6 col-sm-12 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
            <div class="rbt-card variation-01 rbt-hover">
                <div class="rbt-card-img">
                    <a href="{{route('course',['course'=>$course])}}">
                        <img src="{{ $course->banner ? asset($course->banner) :asset('images/oe/www.jpeg') }}" alt="Course image" style="height: 500px; object-fit:contain; background-color: rgba(164, 162, 162, 0.194)">
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

                    <h4 class="rbt-card-title"><a href="{{route('course',['course'=>$course])}}"> {{$course->title}}</a>
                    </h4>

                    {{--                            <ul class="rbt-meta">--}}
                    {{--                                <li><i class="feather-book"></i>10 Lessons</li>--}}
                    {{--                                <li><i class="feather-users"></i>1000 Students</li>--}}
                    {{--                            </ul>--}}

                    <p class="rbt-card-text">
                        {!! $course->description !!}
                    </p>
                    <br>
                    <br>
                    <div class="rbt-author-meta mb--10">
                        <div class="rbt-avater">
                            <a >
                                <img src="{{ $course->trainer->image ? asset($course->trainer->image):asset('images/oe/ddck.png') }}" alt="{{$course->trainer->name }}">
                            </a>
                        </div>
                        <div class="rbt-author-info">
                            By {{$course->trainer->name}}
                        </div>
                    </div>
                    <div class="rbt-card-bottom">
                        <div class="rbt-price">
                            <span class="current-price">RM{{number_format($course->price,2,'.',',')}}</span>
                        </div>
                        <a class="rbt-btn-link left-icon" href="{{route('addtocart',['course'=>$course])}}"><i
                                class="feather-shopping-cart"></i> Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Card  -->
    @empty
        No course available
    @endforelse
    <div class="row mt--50">
        <div class="col-lg-12">
            <div class="rbt-button-group">
                <a class="rbt-moderbt-btn" href="#" wire:click="exploreChange">
                    <span class="moderbt-btn-text">Explore More Courses</span>
                    <i class="feather-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

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
