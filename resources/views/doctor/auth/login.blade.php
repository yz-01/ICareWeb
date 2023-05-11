@extends('doctor.auth.layouts.app')
@push('style')
<style>
    .password-eye:hover {
        background-color: rgba(128, 128, 128, 0.205) !important;
    }
</style>
@endpush
@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-image: url({{ asset('assets/images/bg/bg-image-10.jpg')}}); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="container">
        <div class="row gy-5 row--30 d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="my-2" style="border-radius: 5px; background-color: rgb(255, 255, 255)">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="{{ route('admin.login') }}" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" href="{{ route('doctor.login') }}" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-block">Doctor</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="{{ route('nurse.login') }}" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Nurse</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" href="{{ route('patient.login') }}" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Patient</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <div class="text-center">
                        <img src="{{ asset('images/icon/logo.png') }}" alt="" style="width: 200px">
                        <h6 class="pt-4">Doctor Login</h6>
                    </div>
                    <form class="max-width-auto" action="{{ route('doctor.login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Username *</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" autocomplete="username">
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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    <a class="btn btn-primary btn-lg py-4 px-4 password-eye" onclick="myFunction()" style="background-color: transparent; color: gray; border: 1px solid #6b738541; border-top: 0px; border-bottom: 0px; border-right: 0px">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <span class="focus-border"></span>
                                @error('password')
                                <div class="invalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12 d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="ms-auto">
                                    @if (Route::has('doctor.password.request'))
                                    <a class="btn" href="{{ route('doctor.password.request') }}" style="font-size: 15px; color: var(--body-color)">
                                        <i class="fas fa-lock"></i> {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
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

                                </div>
                            </div>
                        </div>
                    </form>
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