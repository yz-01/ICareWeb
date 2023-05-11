@extends('doctor.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Schedule</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('doctor.schedules.index') }}">Schedule List</a>
                    </li>
                    <li class="breadcrumb-item active">Schedule List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('doctor.schedules.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Schedule Information</h4>
                            <div class="form-group mb-3">
                                <label for="city">For<span class="text-danger">*</span></label>
                                <br>
                                <button type="button" name="selected_doctor" id="selected_doctor" class="btn btn-outline-primary" style="width: 115px;">Doctor</button>
                                <button type="button" name="selected_nurse" id="selected_nurse" class="btn btn-outline-success" style="width: 115px;">Nurse</button>
                            </div>
                            <div class="form-group mb-3" id="group_doctor" style="display: none;">
                                <label for="city">Doctor Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('doctor_id') is-invalid @enderror" name="doctor_id" id="doctor_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($doctor as $doctors)
                                    <option value="{{ $doctors->id }}" {{ old('doctor_id') == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3" id="group_nurse" style="display: none;">
                                <label for="city">Nurse Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('nurse_id') is-invalid @enderror" name="nurse_id" id="nurse_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($nurse as $nurses)
                                    <option value="{{ $nurses->id }}" {{ old('nurse_id') == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3" id="group_date" style="display: none;">
                                <label for="date">Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="date" value="{{ old('date') ?: '' }}">
                            </div>
                            <div class="form-group mb-3" id="group_shift" style="display: none;">
                                <label for="city">Shift<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('shift') is-invalid @enderror" name="shift" id="shift">
                                    <option value="">-- Please Select --</option>
                                    <option value="1" {{ old('shift') ? 'selected' : '' }}>Morning Shift (8AM - 4PM)</option>
                                    <option value="2" {{ old('shift') ? 'selected' : '' }}>Afternoon Shift (4PM - 12AM)</option>
                                    <option value="3" {{ old('shift') ? 'selected' : '' }}>Night Shift (12AM - 8AM)</option>
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
    $("#selected_doctor").click(function() {
        $('#group_doctor').show(0);
        $('#group_nurse').hide();
        $('#group_date').show(0);
        $('#group_shift').show(0);
    });

    $("#selected_nurse").click(function() {
        $('#group_nurse').show(0);
        $('#group_doctor').hide();
        $('#group_date').show(0);
        $('#group_shift').show(0);
    });
</script>
@endpush