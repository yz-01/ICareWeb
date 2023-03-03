@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Trainer - {{ $trainer->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.trainers.index') }}">Trainer List</a>
                    </li>
                    <li class="breadcrumb-item active">Trainer List</li>
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
                        <h4 class="card-title mb-0">Trainer Information</h4>
                        <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="ms-auto">
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
                                            @if ($trainer->image)
                                                <img src="{{ asset($trainer->image) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('images/default/profile.png') }}" style="width: 100px" class="rounded-circle">
                                            @endif
                                        </td>
                                        <th scope="row">Banner :</th>
                                        <td>
                                            @if ($trainer->banner)
                                                <img src="{{ asset($trainer->image) }}" style="width: 100px" class="rounded-circle">
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name :</th>
                                        <td>{{ $trainer->name }}</td>
                                        <th scope="row">Code :</th>
                                        <td>{{ $trainer->code }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username :</th>
                                        <td>{{ $trainer->username }}</td>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $trainer->email ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Identity Card :</th>
                                        <td>{{ $trainer->identity_card ?: '-' }}</td>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{ $trainer->phone ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Security Question :</th>
                                        <td>{{ $trainer->security_question->name ?: '-' }}</td>
                                        <th scope="row">Security Answer :</th>
                                        <td>{{ $trainer->security_answer ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address :</th>
                                        <td style="width: 200px">
                                            {{ $trainer->address ?: '-' }}, 
                                            {{ $trainer->postal_code }}
                                            {{ $trainer->city }}, 
                                            {{ $trainer->state }}, 
                                            {{ $trainer->country->name }}
                                        </td>
                                        <th scope="row">Employment Status :</th>
                                        <td>
                                            @if ($trainer->employment_status == 1)
                                                Employee
                                            @elseif ($trainer->employment_status == 2)
                                                Employer
                                            @elseif ($trainer->employment_status == 3)
                                                Unemployed
                                            @elseif ($trainer->employment_status == 4)
                                                Retiree
                                            @elseif ($trainer->employment_status == 5)
                                                Student
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Company Name :</th>
                                        <td>{{ $trainer->company_name ?: '-' }}</td>
                                        <th scope="row">Position :</th>
                                        <td>{{ $trainer->position ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Referral Code :</th>
                                        <td>{{ $trainer->own_referral_code ?: '-' }}</td>
                                        <th scope="row">Point Balance :</th>
                                        <td>{{ $trainer->point_balance ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Account Approve?</th>
                                        <td>{{ $trainer->is_approve == 1 ? 'No' : 'Yes' }}</td>
                                        <th scope="row"></th>
                                        <td></td>
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