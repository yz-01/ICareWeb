@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Room</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.rooms.index') }}">Room List</a>
                    </li>
                    <li class="breadcrumb-item active">Room List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Room Information</h4>
                            <div class="form-group mb-3">
                                <label for="city">Branch<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('branch_id') is-invalid @enderror" name="branch_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($branch as $branches)
                                    <option value="{{ $branches->id }}" {{ old('branch_id') == $branches->id ? 'selected' : '' }}>{{ $branches->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="floor">Floor<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('floor') is-invalid @enderror" name="floor" placeholder="Floor" value="{{ old('floor') ?: '' }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="room_number">Room Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('room_number') is-invalid @enderror" name="room_number" placeholder="Room Number" value="{{ old('room_number') ?: '' }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">Room Type<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('room_type_id') is-invalid @enderror" name="room_type_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($room_type as $room_types)
                                    <option value="{{ $room_types->id }}" {{ old('room_type_id') == $room_types->id ? 'selected' : '' }}>{{ $room_types->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
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