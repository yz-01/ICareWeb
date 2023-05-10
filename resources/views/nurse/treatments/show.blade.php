@extends('nurse.layouts.app')

@section('content')
<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Treatment - {{ $treatment->title }}</h4>
        </div>
        <div class="page-title-left d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb mt-n3 p-0">
                <li class="breadcrumb-item"><a href="{{route('nurse.treatments.index')}}">Treatment List</a></li>
                <li class="breadcrumb-item active">Treatment Detail</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <h4 class="card-title mb-0">Treatment Information</h4>
                        <a href="{{ route('nurse.treatments.edit', $treatment->id) }}" class="ms-auto">
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
                                        <th scope="row">Patient :</th>
                                        <td>{{ $treatment->patient->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Room Number :</th>
                                        <td>{{ $treatment->ward->room_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ward :</th>
                                        <td>{{ $treatment->ward_id }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title :</th>
                                        <td>{{ $treatment->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description :</th>
                                        <td>{!! $treatment->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Medicines Information</h4>
                <div class="row">
                    @if($treatment->treatment_medicine != '[]')
                    <div class="col-lg-9">
                        <div class="mb-3">
                            <label class="form-label">Name (Last Time Added)<span class="text-danger">*</span></label>
                            @foreach($treatment->treatment_medicine as $treatment_medicines)
                            <select class="form-select @error('medicine_id') is-invalid @enderror" name="last_time_medicine_id[]" id="medicine_id" disabled>
                                <option selected="" value="">-- Please Select --</option>
                                @foreach($medicine as $medicines)
                                <option value="{{ $medicines->id }}" {{ $treatment_medicines->medicine_id == $medicines->id ? 'selected' : '' }}>{{ $medicines->name }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="last_time_medicine_id[]" id="last_time_medicine_id" value="{{ $treatment_medicines->medicine_id }}" hidden>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label class="form-label">Number of Usage<span class="text-danger">*</span></label>
                            @foreach($treatment->treatment_medicine as $treatment_medicines)
                            <input type="number" class="form-control" name="last_time_number[]" value="{{ $treatment_medicines->usage_of_medicine }}" disabled>
                            <input type="number" class="form-control" name="last_time_number[]" value="{{ $treatment_medicines->usage_of_medicine }}" hidden>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Doctors Information</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">PIC Doctor<span class="text-danger">*</span></label>
                            <select class="form-select @error('pic_doctor_id') is-invalid @enderror" name="pic_doctor_id" id="pic_doctor_id" disabled>
                                <option value="">-- Please Select --</option>
                                @foreach($doctor as $doctors)
                                <option value="{{ $doctors->id }}" {{ $treatment->pic_doctor_id == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($support_doctor != '[]')
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Support Doctor<span class="text-danger">*</span></label>
                            @foreach($support_doctor as $support_doctors)
                            <select class="form-select @error('support_doctor_id') is-invalid @enderror" name="last_time_support_doctor_id[]" id="last_time_support_doctor_id" disabled>
                                <option value="">-- Please Select --</option>
                                @foreach($doctor as $doctors)
                                <option value="{{ $doctors->id }}" {{ $support_doctors->support_doctor_id == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Nurses Information</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">PIC Nurse<span class="text-danger">*</span></label>
                            <select class="form-select @error('pic_nurse_id') is-invalid @enderror" name="pic_nurse_id" id="pic_nurse_id" disabled>
                                <option value="">-- Please Select --</option>
                                @foreach($nurse as $nurses)
                                <option value="{{ $nurses->id }}" {{ $treatment->pic_nurse_id == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if($support_nurse != '[]')
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Support Nurse<span class="text-danger">*</span></label>
                            @foreach($support_nurse as $support_nurses)
                            <select class="form-select @error('support_nurse_id') is-invalid @enderror" name="last_time_support_nurse_id[]" id="last_time_support_nurse_id" disabled>
                                <option value="">-- Please Select --</option>
                                @foreach($nurse as $nurses)
                                <option value="{{ $nurses->id }}" {{ $support_nurses->support_nurse_id == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection