@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Agent - {{ $agent->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.agents.index') }}">Agent List</a>
                    </li>
                    <li class="breadcrumb-item active">Agent List</li>
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
                        <h4 class="card-title mb-0">Agent Information</h4>
                        <a href="{{ route('admin.agents.edit', $agent->id) }}" class="ms-auto">
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
                                        <th scope="row">Photo :</th>
                                        <td>
                                            @if ($agent->image)
                                                <img src="{{ asset($agent->image) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('images/default/profile.png') }}" style="width: 100px" class="rounded-circle">
                                            @endif
                                        </td>
                                        <th scope="row">Banner :</th>
                                        <td>
                                            @if ($agent->banner)
                                                <img src="{{ asset($agent->banner) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name :</th>
                                        <td>{{ $agent->name }}</td>
                                        <th scope="row">Code :</th>
                                        <td>{{ $agent->code }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username :</th>
                                        <td>{{ $agent->username }}</td>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $agent->email ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Identity Card :</th>
                                        <td>{{ $agent->identity_card ?: '-' }}</td>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{ $agent->phone ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Security Question :</th>
                                        <td>{{ $agent->security_question->name ?: '-' }}</td>
                                        <th scope="row">Security Answer :</th>
                                        <td>{{ $agent->security_answer ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address :</th>
                                        <td style="width: 200px">
                                            {{ $agent->address ?: '-' }},
                                            {{ $agent->postal_code }}
                                            {{ $agent->city }},
                                            {{ $agent->state }},
                                            {{ $agent->country->name }}
                                        </td>
                                        <th scope="row">Employment Status :</th>
                                        <td>
                                            @if ($agent->employment_status == 1)
                                                Employee
                                            @elseif ($agent->employment_status == 2)
                                                Employer
                                            @elseif ($agent->employment_status == 3)
                                                Unemployed
                                            @elseif ($agent->employment_status == 4)
                                                Retiree
                                            @elseif ($agent->employment_status == 5)
                                                Student
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Name :</th>
                                        <td>{{ $agent->company_name ?: '-' }}</td>
                                        <th scope="row">Position :</th>
                                        <td>{{ $agent->position ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Referral Code :</th>
                                        <td>{{ $agent->own_referral_code ?: '-' }}</td>
                                        <th scope="row">Point Balance :</th>
                                        <td>{{ $agent->point_balance ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Account Approve?</th>
                                        <td>{{ $agent->is_approve == 1 ? 'No' : 'Yes' }}</td>
                                        <th scope="row">Gender :</th>
                                        <td>{{ $agent->gender == 1 ? 'Male' : 'Female' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bank Account Name :</th>
                                        <td>{{ $agent->bank_account_name }}</td>
                                        <th scope="row">Bank Account Number :</th>
                                        <td>{{ $agent->bank_account_no }}</td>
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
