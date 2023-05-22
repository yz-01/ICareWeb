@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Branch - {{ $branch->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.branches.index') }}">Branch List</a>
                    </li>
                    <li class="breadcrumb-item active">Branch List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Branch Information</h4>

                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Name :</th>
                                <td>{{ $branch->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone Number :</th>
                                <td>{{ $branch->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">E-mail :</th>
                                <td>
                                    {{ $branch->email }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Address :</th>
                                <td>{{ $branch->address1 }}, {{ $branch->address2 }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Postal Code :</th>
                                <td>{{ $branch->postal_code }}</td>
                            </tr>
                            <tr>
                                <th scope="row">City :</th>
                                <td>{{ $branch->city->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">State :</th>
                                <td>{{ $branch->state->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Country :</th>
                                <td>{{ $branch->country->name }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Branch Settings</h4>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input class="d-none" type="file" name="logo">
                                <div class="upload overflow-hidden logo">
                                    @if($branch->logo)
                                    <img class="logo-preview" src="{{ asset($branch->logo) }}">
                                    @else
                                    <img class="logo-preview" src="{{ asset('/images/icon/logo.png') }}">
                                    @endif
                                </div>
                                @error('logo')
                                <div class="text-danger" style="font-size: 80%;">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="logo">Logo Small</label>
                                <input class="d-none" type="file" name="logo_sm">
                                <div class="upload overflow-hidden logo_sm">
                                    @if($branch->thumbnail_logo)
                                    <img class="logo-sm-preview" src="{{ asset($branch->thumbnail_logo) }}">
                                    @else
                                    <img class="logo-sm-preview" src="{{ asset('/images/icon/logo.png') }}">
                                    @endif
                                </div>
                                @error('logo_sm')
                                <div class="text-danger" style="font-size: 80%;">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection