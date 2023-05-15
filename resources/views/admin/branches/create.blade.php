@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Branch</h4>
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
<form action="{{ route('admin.branches.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Branch Information</h4>
                            <div class="form-group mb-3">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') ?: '' }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?: '' }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Phone<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') ?: '' }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Address 1<span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-1 @error('address1') is-invalid @enderror" name="address1" placeholder="Address 1" value="{{ old('address1') ?: '' }}">
                                <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address2" placeholder="Address 2" value="{{ old('address2') ?: '' }}">
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-md-4">
                                    <div class="form-group mb-3 mb-md-0">
                                        <label for="postal_code">Postal Code<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') ?: '' }}">
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="city">City<span class="text-danger">*</span></label>
                                        <select class="form-select select-city @error('city_id') is-invalid @enderror" name="city_id">
                                            <option value="">-- Please Select --</option>
                                            @foreach($city as $cities)
                                            <option value="{{ $cities->id }}" {{ old('city_id') == $cities->id ? 'selected' : '' }}>{{ $cities->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="state">State<span class="text-danger">*</span></label>
                                        <select class="form-select select-state @error('state_id') is-invalid @enderror" name="state_id">
                                            <option value="">-- Please Select --</option>
                                            @foreach($state as $states)
                                            <option value="{{ $states->id }}" {{ old('state_id') == $states->id ? 'selected' : '' }}>{{ $states->name }}</option>
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
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Branch Settings</h4>

                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input class="d-none" type="file" name="logo">
                                <div class="upload overflow-hidden logo">
                                    <img class="logo-preview" src="{{ asset('/images/icon/logo.png') }}">
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
                                    <img class="logo-sm-preview" src="{{ asset('/images/icon/logo.png') }}">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('script')
<script>
    $('.upload.logo').click(function() {
        $('[name="logo"]').trigger('click');
    })

    $('.upload.logo_sm').click(function() {
        $('[name="logo_sm"]').trigger('click');
    })

    $('[name="logo"]').change(function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.upload.logo').find('.logo-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    $('[name="logo_sm"]').change(function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.upload.logo_sm').find('.logo-sm-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

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
</script>
@endpush