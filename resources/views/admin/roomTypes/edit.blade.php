@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Branch Edit - {{ $branch->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.branches.index') }}">Branch List</a>
                    </li>
                    <li class="breadcrumb-item active">Branch Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.branches.update', $branch->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Branch Information</h4>
                            <div class="form-group mb-3">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ $branch->name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $branch->email }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ $branch->phone }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Address 1<span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-1 @error('address1') is-invalid @enderror" name="address1" placeholder="Address 1" value="{{ $branch->address1 }}">
                                <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address2" placeholder="Address 2" value="{{ $branch->address2 }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-4">
                                    <div class="form-group mb-3 mb-md-0">
                                        <label for="postal_code">Postal Code<span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="Postal Code" value="{{ $branch->postal_code }}">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="city">City<span class="text-danger">*</span></label>
                                        <select class="form-select select-city @error('city_id') is-invalid @enderror" name="city_id">
                                            <option value=""></option>
                                            @foreach($city as $cities)
                                            <option value="{{ $cities->id }}" {{ $branch->city_id == $cities->id ? 'selected' : '' }}>{{ $cities->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="state">State<span class="text-danger">*</span></label>
                                        <select class="form-select select-state @error('state_id') is-invalid @enderror" name="state_id">
                                            <option value=""></option>
                                            @foreach($state as $states)
                                            <option value="{{ $states->id }}" {{ $branch->state_id == $states->id ? 'selected' : '' }}>{{ $states->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                        <div class="invalid-feedback">
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
                                    <img class="logo-preview" src="{{ asset('/images/icon/logotext_default.png') }}">
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
                                    <img class="logo-sm-preview" src="{{ asset('/images/icon/logotext_default.png') }}">
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
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('script')
<script>
    // $(".select-role").select2({
    //     placeholder: "Select a role",
    //     minimumResultsForSearch: Infinity
    // });
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResultIcon' + id).hide();
                $('#imageResult' + id)
                    .attr('src', e.target.result);
                $('#imageResult' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction2() {
        var x = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush