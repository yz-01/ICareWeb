@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Nurse - {{ $nurse->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.nurses.index') }}">Nurse List</a>
                    </li>
                    <li class="breadcrumb-item active">Nurse List</li>
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
                        <h4 class="card-title mb-0">Nurse Information</h4>
                        <a href="{{ route('admin.nurses.edit', $nurse->id) }}" class="ms-auto">
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
                                            @if ($nurse->image)
                                                <img src="{{ asset($nurse->image) }}" style="width: 100px; height: 100px;" class="rounded-circle">
                                            @else
                                                <img src="{{ asset('images/default/profile.png') }}" style="width: 100px; height: 100px;" class="rounded-circle">
                                            @endif
                                        </td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Name :</th>
                                        <td>{{ $nurse->name }}</td>
                                        <th scope="row">Code :</th>
                                        <td>{{ $nurse->code }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Username :</th>
                                        <td>{{ $nurse->username }}</td>
                                        <th scope="row">E-mail :</th>
                                        <td>{{ $nurse->email ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Identity Card :</th>
                                        <td>{{ $nurse->identity_card ?: '-' }}</td>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{ $nurse->phone ?: '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Branch :</th>
                                        <td>{{ $nurse->branch_id ? $nurse->branch->name : '-' }}</td>
                                    </tr> 
                                    {{-- <tr>
                                        <th scope="row">Role :</th>
                                        <td>{{ $nurse->role ? $nurse->role->name : '-' }}</td>
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