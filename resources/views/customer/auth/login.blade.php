@extends('customer.auth.layouts.app')

@push('style')
    <style>
        .password-eye:hover
        {
            background-color: rgba(128, 128, 128, 0.205) !important;
        }
    </style>
@endpush
@section('content')
<!-- Start breadcrumb Area -->
<div class="rbt-breadcrumb-default ptb--50 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h3 class="">Member Login</h3>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Member Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->
<div class="rbt-elements-area bg-color-white rbt-section-gap py-5">
    <div class="container">
        <div class="row gy-5 row--30 d-flex justify-content-center">

            <div class="col-lg-6">
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <h5 class="">Member Login Information</h5>
                    <form class="max-width-auto" action="{{ route('customer.login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Username *</label>
                                <input id="username" type="text" class="@error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" required autocomplete="username">
                                <span class="focus-border"></span>
                                @error('username')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Password *</label>
                                <div class="search-field" style="border: 1px solid #6b738541; height: auto; border-radius: 5px">
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <a class="btn btn-primary btn-lg py-4 px-4 password-eye" onclick="myFunction()" style="background-color: transparent; color: gray; border: 1px solid #6b738541; border-top: 0px; border-bottom: 0px; border-right: 0px">
                                        <i class="fas fa-eye" ></i>
                                    </a>
                                </div>
                                <span class="focus-border"></span>
                                @error('password')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Login</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row pt-3">
                        <div class="col-lg-12 text-center">
                            <a href="{{ route('customer.register.create') }}" class="text-primary"><u>Haven't Register? Register Now</u></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
    </script>
@endpush