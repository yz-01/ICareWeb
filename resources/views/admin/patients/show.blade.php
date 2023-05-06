@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Patient - {{ $patient->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.patients.index') }}">Patient List</a>
                    </li>
                    <li class="breadcrumb-item active">Patient List</li>
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
                        <h4 class="card-title mb-0">Patient Information</h4>
                        <a href="{{ route('admin.patients.edit', $patient->id) }}" class="ms-auto">
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
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
                                            @if ($patient->image)
                                                <img src="{{ asset($patient->image) }}" style="width: 100px; height: 100px;" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('images/default/profile.png') }}" style="width: 100px; height: 100px;" class="rounded-circle">
                                            @endif
                                        </td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name :</th>
                                        <td>{{ $patient->name }}</td>
                                        <th scope="row">Code :</th>
                                        <td>{{ $patient->code }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username :</th>
                                        <td>{{ $patient->username }}</td>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $patient->email ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Identity Card :</th>
                                        <td>{{ $patient->identity_card ?: '-' }}</td>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{ $patient->phone ?: '-' }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th scope="row">Role :</th>
                                        <td>{{ $patient->role ? $patient->role->name : '-' }}</td>
                                    </tr> --}}
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