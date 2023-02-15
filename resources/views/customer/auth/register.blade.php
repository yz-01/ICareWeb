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
                    <h3 class="">Member Register</h3>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Member Register</li>
                    </ul>
                    <label class="description" for="">Register as a member today and start earning HRDP reward points! Whether you're interested in our courses, services, or products, you can earn reward points for each purchase made using your own name. Simply sign up as an individual customer, and you'll be on your way to redeeming HRDP reward points for exclusive offers and discounts. Don't miss out on the benefits of membership - register today!</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area -->


<div class="rbt-elements-area bg-color-white rbt-section-gap py-5">
    <div class="container">
        <button class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100 h-100">
            <span class="icon-reverse-wrapper">
                <span class="btn-text" style="font-size: 23px">Join the HRDP Rewards Program Today and Earn a 100-Point Welcome Bonus!</span>
            </span>
        </button>

        <a class="rbt-btn bg-primary-opacity hover-icon-reverse my-4" href="/">
            <span class="icon-reverse-wrapper">
                <span class="btn-text">Return</span>
                <span class="btn-icon"><i class="feather-arrow-left"></i></span>
                <span class="btn-icon"><i class="feather-arrow-left"></i></span>
            </span>
        </a>

        <div class="row gy-5 row--30 d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                    <h5 class="mb-0">Member Register Information</h5>
                    <form class="max-width-auto" action="{{ route('customer.register.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>Name <span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?: '' }}" placeholder="Name">
                                <span class="focus-border"></span>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Identity Card <span class="text-danger">*</span></label>
                                <input name="identity_card" type="text" class="form-control @error('identity_card') is-invalid @enderror" value="{{ old('identity_card') ?: '' }}" placeholder="Identity Card">
                                <span class="focus-border"></span>
                                @error('identity_card')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?: '' }}" placeholder="Email">
                                <span class="focus-border"></span>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') ?: '' }}" placeholder="Phone" minlength="10" maxlength="13">
                                <span class="focus-border"></span>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-12">
                                <label>Address <span class="text-danger">*</span></label>
                                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?: '' }}" placeholder="Address">
                                <span class="focus-border"></span>
                                @error('address')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>City <span class="text-danger">*</span></label>
                                <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') ?: '' }}" placeholder="City">
                                <span class="focus-border"></span>
                                @error('city')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>State <span class="text-danger">*</span></label>
                                <input name="state" type="text" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') ?: '' }}" placeholder="State">
                                <span class="focus-border"></span>
                                @error('state')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>Postal Code <span class="text-danger">*</span></label>
                                <input name="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') ?: '' }}" placeholder="Postal Code">
                                <span class="focus-border"></span>
                                @error('postal_code')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Country <span class="text-danger">*</span></label>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select name="country_id" class="form-control @error('country_id') is-invalid @enderror">
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : ''}}>{{ $country->code }} - {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>Referral Code</label>
                                <input name="referral_code" type="text" class="form-control @error('referral_code') is-invalid @enderror" value="{{ old('referral_code') ?: '' }}" placeholder="Referral Code" oninput="this.value = this.value.toUpperCase()">
                                <span class="focus-border"></span>
                                @if(count($errors) > 0)
                                    {{-- <div class="invalid-feedback"> --}}
                                        <span class="text-danger" style="font-size: 15px">{{$errors->first('error')}}</span>
                                    {{-- </div> --}}
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label>Username <span class="text-danger">*</span></label>
                                <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ?: '' }}" placeholder="Username">
                                <span class="focus-border"></span>
                                @error('username')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body"  style="background-color: rgba(128, 128, 128, 0.116); ">
                                        <span class="text-danger" style="line-height: 38px">
                                            ***Password should be alphanumeric   <br />
                                            ***Password must be at least 8 characters  <br />
                                            ***Password must include Uppercase & Lowercase   <br />
                                            ***Password must contain a special character (@, $, !, &, etc)
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Password <span class="text-danger">*</span></label>
                                <div class="search-field" style="border: 1px solid #6b738541; height: auto; border-radius: 5px">
                                    <input id="password" name="password" type="password"  class="form-control @error('password') is-invalid @enderror" value="{{ old('password') ?: '' }}" placeholder="Password">
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
                                <label class="pt-4">Confirm Password <span class="text-danger">*</span></label>
                                <div class="search-field" style="border: 1px solid #6b738541; height: auto; border-radius: 5px">
                                    <input id="confirm_password" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') ?: '' }}" placeholder="Confirm Password">
                                    <a class="btn btn-primary btn-lg py-4 px-4 password-eye" onclick="myFunction2()" style="background-color: transparent; color: gray; border: 1px solid #6b738541; border-top: 0px; border-bottom: 0px; border-right: 0px">
                                        <i class="fas fa-eye" ></i>
                                    </a>
                                </div>
                                <span class="focus-border"></span>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>Security Question <span class="text-danger">*</span></label>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select name="security_question_id" class="form-control @error('security_question_id') is-invalid @enderror">
                                        <option value="">-- Select Security Question --</option>
                                        @foreach ($security_questions as $security_question)
                                            <option value="{{ $security_question->id }}" {{ old('security_question_id') == $security_question->id ? 'selected' : ''}}>{{ $security_question->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('security_question_id')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Security Answer <span class="text-danger">*</span></label>
                                <input name="security_answer" type="text" class="form-control @error('security_answer') is-invalid @enderror" value="{{ old('security_answer') ?: '' }}" placeholder="Security Answer">
                                <span class="focus-border"></span>
                                @error('security_answer')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-submit-group pt-3">
                            <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Register</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </button>
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
        function myFunction2() {
            var x = document.getElementById("confirm_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush