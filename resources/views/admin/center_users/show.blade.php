@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Center - {{ $center_user->company_name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.center_users.index') }}">Center List</a>
                    </li>
                    <li class="breadcrumb-item active">Center List</li>
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
                        <h4 class="card-title mb-0">Center Information</h4>
                        <a href="{{ route('admin.center_users.edit', $center_user->id) }}" class="ms-auto">
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
                                            @if ($center_user->company_logo)
                                                <img src="{{ asset($center_user->company_logo) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('images/default/logo.png') }}" style="width: 100px" class="rounded-circle">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Banner :</th>
                                        <td>
                                            @if ($center_user->banner)
                                                <img src="{{ asset($center_user->banner) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Name :</th>
                                        <td>{{ $center_user->company_name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Registration No :</th>
                                        <td>{{ $center_user->company_registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">SSM Document :</th>
                                        <td>
                                            <a href="{{ asset($center_user->ssm_document) }}" target="_blank">
                                                <button class="btn btn-primary">
                                                    Download SSM
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $center_user->email ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nature of Business :</th>
                                        <td>{{ $center_user->nature_business->name ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address :</th>
                                        <td style="width: 200px">
                                            {{ $center_user->address ?: '-' }}, 
                                            {{ $center_user->postal_code }}
                                            {{ $center_user->city }}, 
                                            {{ $center_user->state }}, 
                                            {{ $center_user->country->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">PIC Name :</th>
                                        <td>{{ $center_user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{ $center_user->phone ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Code :</th>
                                        <td>{{ $center_user->code }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username :</th>
                                        <td>{{ $center_user->username }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Do you own the company?</th>
                                        <td>{{ $center_user->is_own_company == 1 ? 'No' : 'Yes' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Position :</th>
                                        <td>{{ $center_user->position ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Does your company has registered under Human Resource Development Fund (HRDF)?</th>
                                        <td>
                                            @if ($center_user->is_hrdf == 1)
                                                No
                                            @elseif ($center_user->is_hrdf == 2)
                                                Yes
                                            @elseif ($center_user->is_hrdf == 3)
                                                Not Sure
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">How many Malaysian staff members in your company?</th>
                                        <td>
                                            @if ($center_user->member_number == 1)
                                                Less than
                                            @elseif ($center_user->member_number == 2)
                                                10 or more than 10
                                            @elseif ($center_user->member_number == 3)
                                                More than 50
                                            @elseif ($center_user->member_number == 4)
                                                More than 100
                                            @elseif ($center_user->member_number == 5)
                                                More than 200
                                            @endif    
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Security Question :</th>
                                        <td>{{ $center_user->security_question->name ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Security Answer :</th>
                                        <td>{{ $center_user->security_answer ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Referral Code :</th>
                                        <td>{{ $center_user->own_referral_code ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Point Balance :</th>
                                        <td>{{ $center_user->point_balance ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Account Approve?</th>
                                        <td>{{ $center_user->is_approve == 1 ? 'No' : 'Yes' }}</td>
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