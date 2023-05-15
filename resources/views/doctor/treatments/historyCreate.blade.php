@extends('doctor.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Create Treatment History</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item"><a href="{{route('doctor.treatments.index')}}">Treatment List</a></li>
                    <li class="breadcrumb-item"><a href="{{route('doctor.treatments.history', ['treatment_id' => $treatment])}}">Treatment History List</a></li>
                    <li class="breadcrumb-item active">Create Treatment History</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<form action="{{route('doctor.treatments.historyStore')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Treatment History Details</h4>
                    <div class="row">
                        <input type="number" name="treatment_id" id="treatment_id" value="{{ $treatment }}" hidden>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <div class="file-upload w-100">
                                    <input type="file" name="image" onchange="readURL(this,1)" style="z-index:2; width: 100% !important;">
                                    <div class="camera-bg" style="display: none; left: auto !important;" id="camera1"></div>
                                    <i class="fa fa-plus" id="imageResultIcon1" style="border-radius:5px;"></i>
                                    <img id="imageResult1" class="w-100 h-100" style="object-fit: contain !important; display: none;" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="date">Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="date" value="{{ old('date') ?: '' }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="time">Time<span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('time') is-invalid @enderror" name="time" placeholder="time" value="{{ old('time') ?: '' }}">
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Patient Healthy Status<span class="text-danger">*</span></label>
                                <select class="form-select @error('patient_healthy_status') is-invalid @enderror" name="patient_healthy_status" id="patient_healthy_status">
                                    <option selected="" value="">Select Status</option>
                                    <option value="1" {{ old('patient_healthy_status') == 1 ? 'selected' : '' }}>Excellent</option>
                                    <option value="2" {{ old('patient_healthy_status') == 2 ? 'selected' : '' }}>Good</option>
                                    <option value="3" {{ old('patient_healthy_status') == 3 ? 'selected' : '' }}>Normal</option>
                                    <option value="4" {{ old('patient_healthy_status') == 4 ? 'selected' : '' }}>Fair</option>
                                    <option value="5" {{ old('patient_healthy_status') == 5 ? 'selected' : '' }}>Bad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Content Information</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Doctor Remark<span class="text-danger">*</span></label>
                                <textarea class="text-editor" name="doctor_remark">{{ old('doctor_remark') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Nurse Remark<span class="text-danger">*</span></label>
                                <textarea class="text-editor" name="nurse_remark">{{ old('nurse_remark') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Medicines Information</h4>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                @foreach($treatment_medicine as $treatment_medicines)
                                @if($treatment_medicines->medicine->status != 0)
                                <select class="form-select @error('medicine_id') is-invalid @enderror" name="medicine_id[{{ $treatment_medicines->id }}]" id="medicine_id" disabled>
                                    <option selected="" value="">-- Please Select --</option>
                                    @foreach($medicine as $medicines)
                                    <option value="{{ $medicines->id }}" {{ $treatment_medicines->medicine_id == $medicines->id ? 'selected' : '' }}>{{ $medicines->name }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="medicine_id[{{ $treatment_medicines->id }}]" id="medicine_id" value="{{ $treatment_medicines->medicine_id }}" hidden>
                                <br>
                                @else
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Number of Usage<span class="text-danger">*</span></label>
                                @foreach($treatment_medicine as $treatment_medicines)
                                @if($treatment_medicines->medicine->status != 0)
                                <input type="number" class="form-control" name="number_of_usage[{{ $treatment_medicines->id }}]" value="{{ old('title') }}">
                                <br>
                                @else
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
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
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResultIcon' + id).hide();
                $('#imageResult' + id)
                    .attr('src', e.target.result);
                $('#imageResult' + id).show();
                $('#camera' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush