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
                                <label for="city">Patient Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('patient_id') is-invalid @enderror" name="patient_id" id="patient_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($patient as $patients)
                                    <option value="{{ $patients->id }}" {{ old('patient_id') == $patients->id ? 'selected' : '' }}>{{ $patients->name }}</option>
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