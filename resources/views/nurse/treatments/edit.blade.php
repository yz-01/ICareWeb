@extends('nurse.layouts.app')

@section('content')
<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit Treatment</h4>
        </div>
        <div class="page-title-left d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb mt-n3 p-0">
                <li class="breadcrumb-item"><a href="{{route('nurse.treatments.index')}}">Treatment List</a></li>
                <li class="breadcrumb-item active">Edit Treatment</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page Title -->

<form action="{{route('nurse.treatments.update', $treatment->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        Edit Treatment
                        @if($check_treatment != null)
                        <span style="color: red;"><b>(Treatment Started)</b></span>
                        @endif
                    </h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Patient<span class="text-danger">*</span></label>
                                <select class="form-select @error('patient_id') is-invalid @enderror" name="patient_id" id="patient_id" disabled>
                                    <option selected="" value="">Select Patient</option>
                                    @foreach($patient as $patients)
                                    <option value="{{ $patients->id }}" {{ $treatment->patient_id == $patients->id ? 'selected' : '' }}>{{ $patients->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="number" name="patient_id" id="patient_id" value="{{ $treatment->patient_id }}" hidden>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ $treatment->title }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="text-editor" name="description">{{ $treatment->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Medicines Information <button type="button" name="add_medicine" id="add_medicine" class="btn btn-outline-primary" style="width: 115px;">Add Medicine</button></h4>
                    <div class="row">
                        @if($treatment->treatment_medicine != '[]')
                        <div class="col-lg-10">
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

                        @if($check_treatment == null)
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                @foreach($treatment->treatment_medicine as $treatment_medicines)
                                <button type="button" class="btn btn-outline-danger delete-data-medicine" data-id="{{ $treatment_medicines->id }}">Delete</button>
                                <br><br>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                @foreach($treatment->treatment_medicine as $treatment_medicines)
                                <button type="button" class="btn btn-outline-danger delete-data-medicine" data-id="{{ $treatment_medicines->id }}" disabled>Delete</button>
                                <br><br>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @endif

                        <div id="medicines_table"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Treatment Information</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Ward<span class="text-danger">*</span></label>
                                <select class="form-select @error('ward_id') is-invalid @enderror" name="ward_id" id="ward_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($ward as $wards)
                                    <option value="{{ $wards->id }}" {{ $treatment->ward_id == $wards->id ? 'selected' : '' }}>Room Number: {{ $wards->room->room_number }}, Ward Number: {{ $wards->ward_number }}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="last_time_ward_id" id="last_time_ward_id" value="{{ $treatment->ward_id }}" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Doctors Information</h4>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="mb-3">
                                <label class="form-label">PIC Doctor<span class="text-danger">*</span></label>
                                <select class="form-select @error('pic_doctor_id') is-invalid @enderror" name="pic_doctor_id" id="pic_doctor_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($doctor as $doctors)
                                    <option value="{{ $doctors->id }}" {{ $treatment->pic_doctor_id == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                <button type="button" name="add_doctor" id="add_doctor" class="btn btn-outline-primary">Add Doctor</button>
                            </div>
                        </div>

                        @if($support_doctor != '[]')
                        <div class="col-lg-10">
                            <div class="mb-3">
                                <label class="form-label">Support Doctor<span class="text-danger">*</span></label>
                                @foreach($support_doctor as $support_doctors)
                                <select class="form-select @error('support_doctor_id') is-invalid @enderror" name="last_time_support_doctor_id[]" id="last_time_support_doctor_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($doctor as $doctors)
                                    <option value="{{ $doctors->id }}" {{ $support_doctors->support_doctor_id == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                @endforeach
                            </div>
                        </div>

                        @if($check_treatment == null)
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                @foreach($support_doctor as $support_doctors)
                                <button type="button" class="btn btn-outline-danger delete-data-doctor" data-id="{{ $support_doctors->id }}">Delete</button>
                                <br><br>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                @foreach($support_doctor as $support_doctors)
                                <button type="button" class="btn btn-outline-danger delete-data-doctor" data-id="{{ $support_doctors->id }}" disabled>Delete</button>
                                <br><br>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @endif

                        <input type="number" name="number_support_doctor" id="number_support_doctor" value="{{ $number_support_doctor }}" hidden>

                        <div id="doctors_table"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Nurses Information</h4>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="mb-3">
                                <label class="form-label">PIC Nurse<span class="text-danger">*</span></label>
                                <select class="form-select @error('pic_nurse_id') is-invalid @enderror" name="pic_nurse_id" id="pic_nurse_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($nurse as $nurses)
                                    <option value="{{ $nurses->id }}" {{ $treatment->pic_nurse_id == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                <button type="button" name="add_nurse" id="add_nurse" class="btn btn-outline-primary">Add Nurse</button>
                            </div>
                        </div>

                        @if($support_nurse != '[]')
                        <div class="col-lg-10">
                            <div class="mb-3">
                                <label class="form-label">Support Nurse<span class="text-danger">*</span></label>
                                @foreach($support_nurse as $support_nurses)
                                <select class="form-select @error('support_nurse_id') is-invalid @enderror" name="last_time_support_nurse_id[]" id="last_time_support_nurse_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($nurse as $nurses)
                                    <option value="{{ $nurses->id }}" {{ $support_nurses->support_nurse_id == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                @endforeach
                            </div>
                        </div>

                        @if($check_treatment == null)
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                @foreach($support_nurse as $support_nurses)
                                <button type="button" class="btn btn-outline-danger delete-data-nurse" data-id="{{ $support_nurses->id }}">Delete</button>
                                <br><br>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                @foreach($support_nurse as $support_nurses)
                                <button type="button" class="btn btn-outline-danger delete-data-nurse" data-id="{{ $support_nurses->id }}" disabled>Delete</button>
                                <br><br>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @endif

                        <input type="number" name="number_support_nurse" id="number_support_nurse" value="{{ $number_support_nurse }}" hidden>

                        <div id="nurses_table"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary w-md">Update</button>
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
    $(document).on('click', '.delete-data-medicine', function() {
        var id = $(this).data('id');
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                if (id != null) {
                    var url = "{{ route('nurse.treatments.deleteDataMedicine', ['id' => '']) }}" + id;
                    window.location.href = url;
                }
            }
        });
    });

    $(document).on('click', '.delete-data-doctor', function() {
        var id = $(this).data('id');
        var treatment_id = $(this).data('treatment_id');
        console.log(id);
        console.log(treatment_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                if (id != null) {
                    var url = "{{ route('nurse.treatments.deleteDataDoctor', ['id' => '']) }}" + id;
                    window.location.href = url;
                }
            }
        });
    });

    $(document).on('click', '.delete-data-nurse', function() {
        var id = $(this).data('id');
        var treatment_id = $(this).data('treatment_id');
        console.log(id);
        console.log(treatment_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                if (id != null) {
                    var url = "{{ route('nurse.treatments.deleteDataNurse', ['id' => '']) }}" + id;
                    window.location.href = url;
                }
            }
        });
    });

    var i = 0;
    var check_support_doctor_number = $('#number_support_doctor').val();
    console.log(check_support_doctor_number);

    $("#add_doctor").click(function() {
        if (check_support_doctor_number == 0) {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<label class="form-label">New Support Doctor<span class="text-danger">*</span></label>' +
                '<select class="form-select" name="support_doctor_id[' + i + ']" required>' +
                '<option value="">-- Please Select --</option>' +
                '@foreach($doctor as $doctors)' +
                '<option value="{{ $doctors->id }}">{{ $doctors->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="mb-3">' +
                '<label class="form-label">Action<span class="text-danger">*</span></label>' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-doctor">Delete</button>' +
                '</div>' +
                '</div>' +
                '</div>';
            check_support_doctor_number++;
        } else if (check_support_doctor_number > 2) {
            alert('Support doctor cannot more than 3 !');
        } else {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<select class="form-select" name="support_doctor_id[' + i + ']" required>' +
                '<option value="">-- Please Select --</option>' +
                '@foreach($doctor as $doctors)' +
                '<option value="{{ $doctors->id }}">{{ $doctors->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="mb-3">' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-doctor">Delete</button>' +
                '</div>' +
                '</div>' +
                '</div>';
            check_support_doctor_number++;
        }
        ++i;
        $("#doctors_table").append(newRow);
    });

    $(document).on('click', '.remove-input-field-doctor', function() {
        check_support_doctor_number--;
        $(this).closest('.row').remove();
    });

    var j = 0;
    var check_support_nurse_number = $('#number_support_nurse').val();
    console.log(check_support_nurse_number);

    $("#add_nurse").click(function() {
        if (check_support_nurse_number == 0) {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<label class="form-label">Support Nurse<span class="text-danger">*</span></label>' +
                '<select class="form-select" name="support_nurse_id[' + j + ']" required>' +
                '<option value="">-- Please Select --</option>' +
                '@foreach($nurse as $nurses)' +
                '<option value="{{ $nurses->id }}">{{ $nurses->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="mb-3">' +
                '<label class="form-label">Action<span class="text-danger">*</span></label>' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-nurse">Delete</button>' +
                '</div>' +
                '</div>' +
                '</div>';
            check_support_nurse_number++;
        } else if (check_support_nurse_number > 2) {
            alert('Support nurse cannot more than 3 !');
        } else {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<select class="form-select" name="support_nurse_id[' + j + ']" required>' +
                '<option value="">-- Please Select --</option>' +
                '@foreach($nurse as $nurses)' +
                '<option value="{{ $nurses->id }}">{{ $nurses->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="mb-3">' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-nurse">Delete</button>' +
                '</div>' +
                '</div>' +
                '</div>';
            check_support_nurse_number++;
        }
        ++j;
        $("#nurses_table").append(newRow);
    });

    $(document).on('click', '.remove-input-field-nurse', function() {
        check_support_nurse_number--;
        $(this).closest('.row').remove();
    });

    var k = 0;
    var check_support_medicine_number = 0;

    $("#add_medicine").click(function() {
        if (check_support_medicine_number == 0) {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<label class="form-label">Name (New Added)<span class="text-danger">*</span></label>' +
                '<select class="form-select" name="medicine_id[' + k + ']" required>' +
                '<option value="">-- Please Select --</option>' +
                '@foreach($medicine as $medicines)' +
                '<option value="{{ $medicines->id }}">{{ $medicines->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="mb-3">' +
                '<label class="form-label">Action<span class="text-danger">*</span></label>' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-medicine">Delete</button>' +
                '</div>' +
                '</div>' +
                '</div>';
            check_support_medicine_number++;
        } else {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<select class="form-select" name="medicine_id[' + k + ']" required>' +
                '<option value="">-- Please Select --</option>' +
                '@foreach($medicine as $medicines)' +
                '<option value="{{ $medicines->id }}">{{ $medicines->name }}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="mb-3">' +
                '<button type="button" class="btn btn-outline-danger remove-input-field-medicine">Delete</button>' +
                '</div>' +
                '</div>' +
                '</div>';
            check_support_medicine_number++;
        }
        ++k;
        $("#medicines_table").append(newRow);
    });

    $(document).on('click', '.remove-input-field-medicine', function() {
        $(this).closest('.row').remove();
    });
</script>
@endpush