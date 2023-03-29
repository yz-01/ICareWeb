
<div>
    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1 main" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Cart</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rbt-cart-area bg-color-white rbt-section-gap">
        <div class="cart_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="#">
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--60">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $index=>$cart)
                                        <tr>
                                            <td class="pro-thumbnail"><a href="{{route('course',['course'=>$cart->course_id])}}"><img src="{{$cart->course->banner ? asset($cart->course->banner) :asset('assets/images/product/1.jpg') }}" alt="Course"></a></td>
                                            <td class="pro-title"><a href="{{route('course',['course'=>$cart->course_id])}}">{{$cart->course->title}}</a></td>
                                            <td class="pro-price"><span>RM{{number_format($cart->price,2,'.',',')}}</span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty2">
                                                    <button wire:click.prevent="decreaseQty({{$index}})" >
                                                      -
                                                    </button>
                                                    <input type="text" value="{{$cartsArr[$index]['quantity']}}" >
                                                    <button wire:click.prevent="increaseQty({{$index}})">
                                                        +
                                                    </button>


                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>RM{{ number_format($cartsArr[$index]['price']*$cartsArr[$index]['quantity'],2,'.',',') }}</span></td>
                                            <td class="pro-remove">
                                                <a href="{{route('cartDelete',['cart'=>$cart])}}" onclick="return confirm('Are you sure to remove the course from your cart?')"><i class="feather-x"></i></a>
{{--                                                <button type="submit" class="btn btn-danger waves-effect waves-light delFunc" data-toggle='tooltip' data-placement='top' title='Delete'>--}}
{{--                                                    <i class="feather-x"></i>--}}
{{--                                                </button>--}}
{{--                                                <form method="POST" action="{{ route('cart.destroy', $cart->id) }}" class=" d-none">--}}
{{--                                                    {{ csrf_field() }}--}}
{{--                                                    {{ method_field('DELETE') }}--}}
{{--                                                </form>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>

                        <!-- Cart Summary -->

                        <div class="col-lg-5 col-12 ">
                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <div class="section-title text-start">
                                        <h4 class="title mb--30">Cart Summary</h4>
                                    </div>
{{--                                    <p>Sub Total <span>$1250.00</span></p>--}}
{{--                                    <p>Shipping Cost <span>$00.00</span></p>--}}
                                    <h2 style="border-top: none">Grand Total <span>RM{{$subtotal}}</span></h2>
                                </div>

                                <div class="cart-submit-btn-group">
                                    <div class="single-button w-50">
                                        <a href="{{route('checkoutform')}}" >
                                            <button class="rbt-btn btn-gradient rbt-switch-btn rbt-switch-y w-100">
                                                <span data-text="Checkout">Checkout</span>
                                            </button>                                        </a>
                                    </div>
                                    {{--                                        <div class="single-button w-50">--}}
                                    {{--                                            <button class="rbt-btn rbt-switch-btn rbt-switch-y w-100 btn-border">--}}
                                    {{--                                                <span data-text="Update Cart">Update Cart</span>--}}
                                    {{--                                            </button>--}}
                                    {{--                                        </div>--}}

                                </div>
                            </div>
                        </div>

                        <!-- Start breadcrumb Area -->
                        <div class="container pt-5 mt-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="breadcrumb-inner text-center">
                                        <h2 class="title">Wishlist</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wishlist_area bg-color-white rbt-section-gap pt-0">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="#">
                                            <div class="cart-table table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="pro-thumbnail">Image</th>
                                                        <th class="pro-title">Product</th>
                                                        <th class="pro-price">Price</th>
                                                        <th class="pro-quantity">Quantity</th>
                                                        <th class="pro-subtotal">Action</th>
                                                        <th class="pro-remove">Remove</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/1.jpg" alt="Product"></a></td>
                                                        <td class="pro-title"><a href="#">Miracle Morning</a></td>
                                                        <td class="pro-price"><span>$295.00</span></td>
                                                        <td class="pro-quantity">
                                                            <div class="pro-qty"><input type="text" value="1"></div>
                                                        </td>
                                                        <td class="pro-addtocart">
                                                            <button class="rbt-btn btn-gradient">add to cart</button>
                                                        </td>
                                                        <td class="pro-remove"><a href="#"><i class="feather-x"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/7.jpg" alt="Product"></a></td>
                                                        <td class="pro-title"><a href="#">Happy Strong</a></td>
                                                        <td class="pro-price"><span>$275.00</span></td>
                                                        <td class="pro-quantity">
                                                            <div class="pro-qty"><input type="text" value="2"></div>
                                                        </td>
                                                        <td class="pro-addtocart"><button class="rbt-btn btn-gradient">add to cart</button></td>
                                                        <td class="pro-remove"><a href="#"><i class="feather-x"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/3.jpg" alt="Product"></a></td>
                                                        <td class="pro-title"><a href="#">Rich Dad Poor Dad</a></td>
                                                        <td class="pro-price"><span>$295.00</span></td>
                                                        <td class="pro-quantity">
                                                            <div class="pro-qty"><input type="text" value="1"></div>
                                                        </td>
                                                        <td class="pro-addtocart"><button class="rbt-btn btn-gradient">add to cart</button></td>
                                                        <td class="pro-remove"><a href="#"><i class="feather-x"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pro-thumbnail"><a href="#"><img src="assets/images/product/4.jpg" alt="Product"></a></td>
                                                        <td class="pro-title"><a href="#">Momentum Theorem</a></td>
                                                        <td class="pro-price"><span>$110.00</span></td>
                                                        <td class="pro-quantity">
                                                            <div class="pro-qty"><input type="text" value="1"></div>
                                                        </td>
                                                        <td class="pro-addtocart"><button class="rbt-btn btn-gradient">add to cart</button></td>
                                                        <td class="pro-remove"><a href="#"><i class="feather-x"></i></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rbt-separator-mid">
                            <div class="container">
                                <hr class="rbt-separator m-0">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
