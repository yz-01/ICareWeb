@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Schedule Edit</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.schedules.index') }}">Schedule List</a>
                    </li>
                    <li class="breadcrumb-item active">Schedule Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Schedule Information</h4>
                            @if($schedule->doctor_id)
                            <div class="form-group mb-3">
                                <label for="city">For<span class="text-danger">*</span></label>
                                <br>
                                <button type="button" name="selected_doctor" id="selected_doctor" class="btn btn-outline-primary" style="width: 115px;">Doctor</button>
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">Doctor Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('doctor_id') is-invalid @enderror" name="doctor_id" id="doctor_id" disabled>
                                    <option value="">-- Please Select --</option>
                                    @foreach($doctor as $doctors)
                                    <option value="{{ $doctors->id }}" {{ $schedule->doctor_id == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="number" name="doctor_id" id="doctor_id" value="{{ $schedule->doctor_id }}" hidden>
                            @elseif($schedule->nurse_id)
                            <div class="form-group mb-3">
                                <label for="city">For<span class="text-danger">*</span></label>
                                <br>
                                <button type="button" name="selected_nurse" id="selected_nurse" class="btn btn-outline-success" style="width: 115px;">Nurse</button>
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">Nurse Name<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('nurse_id') is-invalid @enderror" name="nurse_id" id="nurse_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($nurse as $nurses)
                                    <option value="{{ $nurses->id }}" {{ $schedule->nurse_id == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="number" name="nurse_id" id="nurse_id" value="{{ $schedule->nurse_id }}" hidden>
                            @else
                            @endif
                            <div class="form-group mb-3">
                                <label for="date">Date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="date" value="{{ $schedule->date }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="time_in">Time In<span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('time_in') is-invalid @enderror" name="time_in" placeholder="time_in" value="{{ $schedule->time_in }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="time_out">Time Out<span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('time_out') is-invalid @enderror" name="time_out" placeholder="time_out" value="{{ $schedule->time_out }}">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
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

</script>
@endpush