@extends('admin.auth.layouts.app')
@push('style')
    <style>
        .password-eye:hover
        {
            background-color: rgba(128, 128, 128, 0.205) !important;
        }
    </style>
@endpush
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-image: url({{ asset('assets/images/bg/bg-image-10.jpg')}}); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container">
        <div class="row gy-5 row--30 d-flex justify-content-center">

            <div class="col-lg-6">
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <div class="text-center">
                        <img src="{{ asset('images/icon/logo.png') }}" alt="" style="width: 200px">
                        <h6 class="pt-4">Admin Reset Password</h6>
                    </div>
                    <div class="card">
                        <div class="card-body"  style="background-color: rgba(128, 128, 128, 0.116); ">
                            <span class="text-danger" style="line-height: 38px; font-size: 16px">
                                ***Password should be alphanumeric   <br />
                                ***Password must be at least 8 characters  <br />
                                ***Password must include Uppercase & Lowercase   <br />
                                ***Password must contain a special character (@, $, !, &, etc)
                            </span>
                        </div>
                    </div>
                    <form class="max-width-auto" action="{{ route('admin.password.reset') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Email *</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <span class="focus-border"></span>
                                @error('email') 
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Password *</label>
                                <div class="search-field" style="border: 1px solid #6b738541; height: auto; border-radius: 5px">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <a class="btn btn-primary btn-lg py-4 px-4 password-eye" onclick="myFunction()" style="background-color: transparent; color: gray; border: 1px solid #6b738541; border-top: 0px; border-bottom: 0px; border-right: 0px">
                                        <i class="fas fa-eye" ></i>
                                    </a>
                                </div>
                                <span class="focus-border"></span>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label>Confirm Password *</label>
                                <div class="search-field" style="border: 1px solid #6b738541; height: auto; border-radius: 5px">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <a class="btn btn-primary btn-lg py-4 px-4 password-eye" onclick="myFunction2()" style="background-color: transparent; color: gray; border: 1px solid #6b738541; border-top: 0px; border-bottom: 0px; border-right: 0px">
                                        <i class="fas fa-eye" ></i>
                                    </a>
                                </div>
                                <span class="focus-border"></span>
                                @error('password-confirm')
                                    <div class="invalid-feedback" role="alert">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">Reset Password</span>
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
                            <a href="{{ route('admin.login') }}" class="text-primary"><u>Back to Sign in</u></a>
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
        function myFunction2() {
            var x = document.getElementById("password-confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush