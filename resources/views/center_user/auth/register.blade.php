@extends('center_user.auth.layouts.app')

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
        <div class="row pt-4">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h3 class="">Center Register</h3>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Center Register</li>
                    </ul>
                    <label class="description" for="">Register your center today and earn HRDP reward points! Our courses are perfect for upskilling your employees, and with our center registration, you can purchase courses or HRDF claimable courses for your team. Your center will earn HRDP reward points for every purchase, which can be redeemed for exclusive offers and discounts. Don't miss out on the benefits of center registration - register today!</label>
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
                    <h5 class="">Company Register Information</h5>
                    <form class="max-width-auto" action="{{ route('center_user.register.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>Company Name <span class="text-danger">*</span></label>
                                <input name="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') ?: '' }}" placeholder="Company Name">
                                <span class="focus-border"></span>
                                @error('company_name')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Company Registration No <span class="text-danger">*</span></label>
                                <input name="company_registration_number" type="text" class="form-control @error('company_registration_number') is-invalid @enderror" value="{{ old('company_registration_number') ?: '' }}" placeholder="Company Registration No ">
                                <span class="focus-border"></span>
                                @error('company_registration_number')
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
                                <label>SSM Document</label>
                                <div class="form-group">
                                    <input name="ssm_document" type="file" class="form-control @error('ssm_document') is-invalid @enderror" value="{{ old('ssm_document') ?: '' }}">
                                    <span class="focus-border"></span>
                                    @error('ssm_document')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Address <span class="text-danger">*</span></label>
                                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?: '' }}" placeholder="Address">
                                <span class="focus-border"></span>
                                @error('address')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Nature of Business <span class="text-danger">*</span></label>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select name="nature_business_id" class="form-control @error('nature_business_id') is-invalid @enderror">
                                        <option value="">-- Select Nature of Business --</option>
                                        @foreach ($nature_businesses as $nature_business)
                                            <option value="{{ $nature_business->id }}" {{ old('nature_business_id') == $nature_business->id ? 'selected' : ''}}>{{ $nature_business->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nature_business_id')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
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
                                <label>Do you own the company? <span class="text-danger">*</span></label>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select name="is_own_company" class="form-control @error('is_own_company') is-invalid @enderror">
                                        <option value="">-- Select Yes/No --</option>
                                        <option value="1" {{ old('is_own_company') == 1 ? 'selected' : ''}}>No</option>
                                        <option value="2" {{ old('is_own_company') == 2 ? 'selected' : ''}}>Yes</option>
                                    </select>
                                    @error('is_own_company')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
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
                            <div class="col-lg-6">
                                <label>What is your position in this company? <span class="text-danger">*</span></label>
                                <input name="position" type="text" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') ?: '' }}" placeholder="Your Position">
                                <span class="focus-border"></span>
                                @error('position')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-6">
                                <label>How many Malaysian staff members in your company? <span class="text-danger">*</span></label>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select name="member_number" class="form-control @error('member_number') is-invalid @enderror">
                                        <option value="">-- Select Total Number of Employees --</option>
                                        <option value="1" {{ old('member_number') == 1 ? 'selected' : ''}}>Less than 9</option>
                                        <option value="2" {{ old('member_number') == 2 ? 'selected' : ''}}>10 or more than 10</option>
                                        <option value="3" {{ old('member_number') == 3 ? 'selected' : ''}}>More than 50</option>
                                        <option value="4" {{ old('member_number') == 4 ? 'selected' : ''}}>More than 100</option>
                                        <option value="5" {{ old('member_number') == 5 ? 'selected' : ''}}>More than 200</option>
                                    </select>
                                    @error('member_number')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Does your company has registered under Human Resource Development Fund (HRDF)?<span class="text-danger">*</span></label>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select name="is_hrdf" class="form-control @error('is_hrdf') is-invalid @enderror">
                                        <option value="">-- Select Yes/No --</option>
                                        <option value="1" {{ old('is_hrdf') == 1 ? 'selected' : ''}}>No</option>
                                        <option value="2" {{ old('is_hrdf') == 2 ? 'selected' : ''}}>Yes</option>
                                        <option value="3" {{ old('is_hrdf') == 3 ? 'selected' : ''}}>Not Sure</option>
                                    </select>
                                    @error('is_hrdf')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-lg-12">
                                <label>List out the products/services you wish to promote/offer in HRDP?</label>
                            </div>
                            <div class="col-lg-6 pt-2 d-flex align-items-center">
                                <label class="pe-3 ps-2" for="">1</label>
                                <input name="product1" type="text" class="form-control @error('product1') is-invalid @enderror" value="{{ old('product1') ?: '' }}" placeholder="1">
                                <span class="focus-border"></span>
                                @error('product1')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-2 d-flex align-items-center">
                                <label class="px-2" for="">2</label>
                                <input name="product2" type="text" class="form-control @error('product2') is-invalid @enderror" value="{{ old('product2') ?: '' }}" placeholder="2">
                                <span class="focus-border"></span>
                                @error('product2')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-2 d-flex align-items-center">
                                <label class="px-2" for="">3</label>
                                <input name="product3" type="text" class="form-control @error('product3') is-invalid @enderror" value="{{ old('product3') ?: '' }}" placeholder="3">
                                <span class="focus-border"></span>
                                @error('product3')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-2 d-flex align-items-center">
                                <label class="px-2" for="">4</label>
                                <input name="product4" type="text" class="form-control @error('product4') is-invalid @enderror" value="{{ old('product4') ?: '' }}" placeholder="4">
                                <span class="focus-border"></span>
                                @error('product4')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pt-2 d-flex align-items-center">
                                <label class="px-2" for="">5</label>
                                <input name="product5" type="text" class="form-control @error('product5') is-invalid @enderror" value="{{ old('product5') ?: '' }}" placeholder="5">
                                <span class="focus-border"></span>
                                @error('product5')
                                    <div class="invalid-feedback">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
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
                        <div class="row pt-4">
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