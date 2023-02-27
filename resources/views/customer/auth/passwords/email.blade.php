@extends('customer.auth.layouts.app')

@section('content')
<div class="rbt-breadcrumb-default ptb--50 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h3 class="">Member Forgot Password</h3>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item"><a href="{{ route('customer.login') }}">Member Login</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Member Forgot Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rbt-elements-area bg-color-white rbt-section-gap py-5">
    <div class="container">
        <div class="row gy-5 row--30 d-flex justify-content-center">

            <div class="col-lg-6">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <h5 class="">Member Forgot Password</h5>
                    <form class="max-width-auto" action="{{ route('customer.password.email') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Email *</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="focus-border"></span>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Submit</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row pt-3">
                        <div class="col-lg-12 text-center">
                            <a href="{{ route('customer.login') }}" class="text-primary"><u>Back to Sign in</u></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
