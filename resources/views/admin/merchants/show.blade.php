@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Merchant - {{ $merchant->company_name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.merchants.index') }}">Merchant List</a>
                    </li>
                    <li class="breadcrumb-item active">Merchant List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <h4 class="card-title mb-0">Merchant Information</h4>
                        <a href="{{ route('admin.merchants.edit', $merchant->id) }}" class="ms-auto">
                            <button class="btn btn-primary" data-toggle='tooltip' data-placement='top' title='Password Change'>
                                <i class="fas fa-key"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Logo :</th>
                                        <td>
                                            @if ($merchant->company_logo)
                                                <img src="{{ asset($merchant->company_logo) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('images/default/logo.png') }}" style="width: 100px" class="rounded-circle">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Banner :</th>
                                        <td>
                                            @if ($merchant->banner)
                                                <img src="{{ asset($merchant->banner) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Name :</th>
                                        <td>{{ $merchant->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Registration No :</th>
                                        <td>{{ $merchant->company_registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">SSM Document :</th>
                                        <td>
                                            <a href="{{ asset($merchant->ssm_document) }}" target="_blank">
                                                <button class="btn btn-primary">
                                                    Download SSM
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $merchant->email ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nature of Business :</th>
                                        <td>{{ $merchant->nature_business->name ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address :</th>
                                        <td style="width: 200px">
                                            {{ $merchant->address ?: '-' }}, 
                                            {{ $merchant->postal_code }}
                                            {{ $merchant->city }}, 
                                            {{ $merchant->state }}, 
                                            {{ $merchant->country->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">PIC Name :</th>
                                        <td>{{ $merchant->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{ $merchant->phone ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Code :</th>
                                        <td>{{ $merchant->code }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username :</th>
                                        <td>{{ $merchant->username }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Do you own the company?</th>
                                        <td>{{ $merchant->is_own_company == 1 ? 'No' : 'Yes' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Position :</th>
                                        <td>{{ $merchant->position ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Does your company has registered under Human Resource Development Fund (HRDF)?</th>
                                        <td>
                                            @if ($merchant->is_hrdf == 1)
                                                No
                                            @elseif ($merchant->is_hrdf == 2)
                                                Yes
                                            @elseif ($merchant->is_hrdf == 3)
                                                Not Sure
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">How many Malaysian staff members in your company?</th>
                                        <td>
                                            @if ($merchant->member_number == 1)
                                                Less than
                                            @elseif ($merchant->member_number == 2)
                                                10 or more than 10
                                            @elseif ($merchant->member_number == 3)
                                                More than 50
                                            @elseif ($merchant->member_number == 4)
                                                More than 100
                                            @elseif ($merchant->member_number == 5)
                                                More than 200
                                            @endif    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Security Question :</th>
                                        <td>{{ $merchant->security_question->name ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Security Answer :</th>
                                        <td>{{ $merchant->security_answer ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Referral Code :</th>
                                        <td>{{ $merchant->own_referral_code ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Point Balance :</th>
                                        <td>{{ $merchant->point_balance ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Account Approve?</th>
                                        <td>{{ $merchant->is_approve == 1 ? 'No' : 'Yes' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">List out the products/services you wish to promote/offer in HRDP?</th>
                                        <td>
                                            1. {{ $promote_product->product1 ?: '-' }} <br />
                                            2. {{ $promote_product->product2 ?: '-' }} <br />
                                            3. {{ $promote_product->product3 ?: '-' }} <br />
                                            4. {{ $promote_product->product4 ?: '-' }} <br />
                                            5. {{ $promote_product->product5 ?: '-' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection