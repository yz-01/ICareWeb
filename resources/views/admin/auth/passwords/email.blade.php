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
<div class="bg-gradient-1 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row gy-5 row--30 d-flex justify-content-center">

            <div class="col-lg-6">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <div class="text-center">
                        <img src="{{ asset('images/icon/logo.png') }}" alt="" style="width: 200px">
                        <h6 class="pt-4">Admin Forgot Password</h6>
                    </div>
                    <form class="max-width-auto" action="{{ route('admin.password.email') }}" method="POST">
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
    </script>
@endpush