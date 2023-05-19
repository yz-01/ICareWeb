@extends('nurse.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Patient Call</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item active">Patient Call</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('nurse.callStore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Patient Information</h4>
                            <div class="form-group mb-3">
                                <label for="city">Nurse Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('nurse_id') is-invalid @enderror" name="nurse_id" id="nurse_id" disabled>
                                    <option value="">-- Please Select --</option>
                                    @foreach($nurse as $nurses)
                                    <option value="{{ $nurses->id }}" {{ auth()->id() == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="nurse_id" id="nurse_id" value="{{ auth()->id() }}" hidden> 
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">Patient Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('patient_id') is-invalid @enderror" name="patient_id" id="patient_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($patient as $patients)
                                    <option value="{{ $patients->id }}" {{ old('patient_id') == $patients->id ? 'selected' : '' }}>{{ $patients->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="instruction">Instruction<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('instruction') is-invalid @enderror" name="instruction" id="instruction">
                                    <option value="">-- Please Select --</option>
                                    <option value="Toilet">Toilet</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Medicine">Medicine</option>
                                    <option value="Eat">Eat</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="Date" value="{{ old('date') ?: '' }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="time">Time<span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" placeholder="Time" value="{{ old('time') ?: '' }}">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('nurse.callList') }}" class="btn btn-success">View Calling List</a>
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