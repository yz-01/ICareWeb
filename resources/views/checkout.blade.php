@extends('layouts.app')
@section('content')
<!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Checkout</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="checkout_area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 checkout-form justify-content-center">
                <div class="col-lg-6">
                    <div class="row pl--50 pl_md--0 pl_sm--0">
                        <!-- Cart Total -->
                        <div class="col-12 mb--60">

                            <h4 class="checkout-title">Cart Total</h4>

                            <div class="checkout-cart-total">

                                <h4>Course <span>Total</span></h4>

                                <ul>
                                    @foreach($carts as $cart)
                                        <li>{{$cart->course->title}} X {{$cart->quantity}}<span>RM{{number_format($cart->total_price,2,'.',',')}}</span></li>
                                        @php
                                        {{$grandtotal += $cart->total_price ;}}
                                        @endphp
                                    @endforeach

                                </ul>
                                <h4 class="mt--30">Grand Total <span>RM{{number_format($grandtotal,2,'.',',')}}</span></h4>

                            </div>

                        </div>

                        <!-- Payment Method -->
                        <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-12 mb--60">
                                <h4 class="checkout-title">Payment Method</h4>
                                <div class="checkout-payment-method">

    {{--                                <div class="single-method">--}}
    {{--                                    <input type="radio" id="payment_check" name="payment-method" value="check">--}}
    {{--                                    <label for="payment_check">Check Payment</label>--}}
    {{--                                    <p data-method="check">Please send a Check to Store name with--}}
    {{--                                        Store Street, Store Town, Store State, Store Postcode,--}}
    {{--                                        Store Country.</p>--}}
    {{--                                </div>--}}

    {{--                                <div class="single-method">--}}
    {{--                                    <input type="radio" id="payment_bank" name="payment-method" value="bank">--}}
    {{--                                    <label for="payment_bank">Direct Bank Transfer</label>--}}
    {{--                                    <p data-method="bank">Please send a Check to Store name with--}}
    {{--                                        Store Street, Store Town, Store State, Store Postcode,--}}
    {{--                                        Store Country.</p>--}}
    {{--                                </div>--}}

    {{--                                <div class="single-method">--}}
    {{--                                    <input type="radio" id="payment_cash" name="payment-method" value="cash">--}}
    {{--                                    <label for="payment_cash">Cash on Delivery</label>--}}
    {{--                                    <p data-method="cash">Please send a Check to Store name with--}}
    {{--                                        Store Street, Store Town, Store State, Store Postcode,--}}
    {{--                                        Store Country.</p>--}}
    {{--                                </div>--}}

    {{--                                <div class="single-method">--}}
    {{--                                    <input type="radio" id="payment_paypal" name="payment-method" value="paypal">--}}
    {{--                                    <label for="payment_paypal">Paypal</label>--}}
    {{--                                    <p data-method="paypal">Please send a Check to Store name with--}}
    {{--                                        Store Street, Store Town, Store State, Store Postcode,--}}
    {{--                                        Store Country.</p>--}}
    {{--                                </div>--}}

                                    <div class="single-method">
                                        <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                        <label for="payment_payoneer">Pay Now</label>
                                        <p data-method="payoneer">Please send a Check to Store name
                                            with Store Street, Store Town, Store State, Store Postcode,
                                            Store Country.</p>
                                    </div>

                                    <div class="single-method">
                                        <input type="checkbox" id="accept_terms">
                                        <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                    </div>
                                </div>
                                    <input type="hidden" name="grandtotal" value="{{$grandtotal}}">
                                <div class="plceholder-button mt--50">
                                    <button class="rbt-btn btn-gradient hover-icon-reverse" type="submit">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">Place order</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
@endsection
