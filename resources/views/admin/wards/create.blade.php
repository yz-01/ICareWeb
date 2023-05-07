@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Ward</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.wards.index') }}">Ward List</a>
                    </li>
                    <li class="breadcrumb-item active">Ward List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.wards.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Ward Information</h4>
                            <div class="form-group mb-3">
                                <label for="city">Branch<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('branch_id') is-invalid @enderror" name="branch_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($branch as $branches)
                                    <option value="{{ $branches->id }}" {{ old('branch_id') == $branches->id ? 'selected' : '' }}>{{ $branches->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3" style="display: none;" id="get_room">
                                <label for="city">Room<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('room_id') is-invalid @enderror" name="room_id" id="room_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($room as $rooms)
                                    <option value="{{ $rooms->id }}" {{ old('room_id') == $rooms->id ? 'selected' : '' }}>{{ $rooms->room_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ward_number">Ward Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('ward_number') is-invalid @enderror" name="ward_number" placeholder="Ward Number" value="{{ old('ward_number') ?: '' }}">
                            </div>
                            <div id="selectedWard"></div>
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
    $(document).ready(function() {
        $('select[name="branch_id"]').on('change', function() {
            var branchId = $(this).val();
            var $room_id = $('#room_id');

            $.ajax({
                type: 'GET',
                url: "{{ route('admin.wards.getRoomList') }}",
                data: {
                    branch_id: branchId
                },
                success: function(response) {
                    $room_id.html('<option value="" selected>Please Select</option>');
                    $.each(response.room, function(id, room) {
                        $room_id.append('<option value="'+room.id+'">Floor: '+room.floor+', Room Number: '+room.room_number+'</option>');
                    });
                    $('#get_room').show(0);
                },
            });
        });
    });
</script>
@endpush