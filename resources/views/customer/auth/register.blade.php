@extends('customer.auth.layouts.app')

@section('content')
<!-- Start breadcrumb Area -->
<div class="rbt-breadcrumb-default ptb--50 ptb_md--50 ptb_sm--30 bg-gradient-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-center">
                    <h3 class="">Customer Register</h3>
                    <ul class="page-list">
                        <li class="rbt-breadcrumb-item"><a href="/">Home</a></li>
                        <li>
                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                        </li>
                        <li class="rbt-breadcrumb-item active">Customer Register</li>
                    </ul>
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
                <span class="btn-text" style="font-size: 23px">Become a member of The Point to earn a welcome offer of 500 points</span>
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
                    <h5 class="">Customer Register Information</h5>
                    <form class="max-width-auto" action="{{ route('customer.register.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="name" type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') ?: '' }}">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="identity_card" type="text" class="@error('identity_card') is-invalid @enderror" value="{{ old('identity_card') ?: '' }}">
                                    <label>Identity Card <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('identity_card')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="email" type="text" class="@error('email') is-invalid @enderror" value="{{ old('email') ?: '' }}">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="phone" type="number" class="@error('phone') is-invalid @enderror" value="{{ old('phone') ?: '' }}">
                                    <label>Contact Number <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input name="address" type="text" class="@error('address') is-invalid @enderror" value="{{ old('address') ?: '' }}">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="city" type="text" class="@error('city') is-invalid @enderror" value="{{ old('city') ?: '' }}">
                                    <label>City <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('city')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="state" type="text" class="@error('state') is-invalid @enderror" value="{{ old('state') ?: '' }}">
                                    <label>State <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('state')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="postal_code" type="text" class="@error('postal_code') is-invalid @enderror" value="{{ old('postal_code') ?: '' }}">
                                    <label>Postal Code <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('postal_code')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-0">Country <span class="text-danger">*</span></p>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select class="w-100" name="country_id" class="@error('country_id') is-invalid @enderror" value="{{ old('country_id') ?: '' }}" style="z-index: 999">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="username" type="text" class="@error('username') is-invalid @enderror" value="{{ old('username') ?: '' }}">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-0">Security Question <span class="text-danger">*</span></p>
                                <div class="rbt-modern-select bg-transparent height-45">
                                    <select class="w-100" name="security_question_id" class="@error('security_question_id') is-invalid @enderror">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="password" type="password"  class="@error('password') is-invalid @enderror" value="{{ old('password') ?: '' }}">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="security_answer" type="text" class="@error('security_answer') is-invalid @enderror" value="{{ old('security_answer') ?: '' }}">
                                    <label>Security Answer <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('security_answer')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="password_confirmation" type="password" class="@error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') ?: '' }}">
                                    <label>Confirm Password <span class="text-danger">*</span></label>
                                    <span class="focus-border"></span>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input name="agent_code" type="text" class="@error('agent_code') is-invalid @enderror" value="{{ old('agent_code') ?: '' }}">
                                    <label>Referral ID</label>
                                    <span class="focus-border"></span>
                                    @error('agent_code')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-submit-group">
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
