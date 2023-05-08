@extends('admin.layouts.app')

@section('content')
<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Create Treatment</h4>
        </div>
        <div class="page-title-left d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb mt-n3 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.treatments.index')}}">Treatment List</a></li>
                <li class="breadcrumb-item active">Create Treatment</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page Title -->

<form action="{{route('admin.treatments.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create Treatment</h4>
                    @error('message')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Patient<span class="text-danger">*</span></label>
                                <select class="form-select @error('patient_id') is-invalid @enderror" name="patient_id" id="patient_id">
                                    <option selected="" value="">Select Patient</option>
                                    @foreach($patient as $patients)
                                    <option value="{{ $patients->id }}">{{ $patients->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @error('title') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="text-editor" name="description">{{ old('description') }}</textarea>
                                @error('description') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Card Body -->
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Medicines Information</h4>
                    @error('message')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror

                    <div id="medicine_information" class="invalid-feedback animated fadeInUp" style="display: block; font-size: 16px;">Please Select Patient ! ! !</div>

                    <div class="row" style="display: none;" id="get_medicine">
                        <div class="col-lg-10">
                            <div class="mb-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <select class="form-select @error('medicine_id') is-invalid @enderror" name="medicine_id[0]" id="medicine_id">
                                    <option selected="" value="">-- Please Select --</option>
                                    @foreach($medicine as $medicines)
                                    <option value="{{ $medicines->id }}">{{ $medicines->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Action<span class="text-danger">*</span></label>
                                <button type="button" name="add_medicine" id="add_medicine" class="btn btn-outline-primary" style="width: 115px;">Add Medicine</button>
                            </div>
                        </div>
                        <div id="medicines_table"></div>
                    </div>

                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Card -->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Treatment Information</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="treatment_information" class="invalid-feedback animated fadeInUp" style="display: block; font-size: 16px;">Please Select Patient ! ! !</div>
                            <div class="mb-3" style="display: none;" id="get_ward">
                                <label class="form-label">Ward<span class="text-danger">*</span></label>
                                <select class="form-select @error('ward_id') is-invalid @enderror" name="ward_id" id="ward_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($ward as $wards)
                                    <option value="{{ $wards->id }}" {{ old('ward_id') == $wards->id ? 'selected' : '' }}>{{ $wards->ward_number }}</option>
                                    @endforeach
                                </select>
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
                                    <option value="{{ $doctors->id }}" {{ old('pic_doctor_id') == $doctors->id ? 'selected' : '' }}>{{ $doctors->name }}</option>
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
                                    <option value="{{ $nurses->id }}" {{ old('pic_nurse_id') == $nurses->id ? 'selected' : '' }}>{{ $nurses->name }}</option>
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
                        <div id="nurses_table"></div>
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
            <!-- End Card -->
        </div>
    </div>
</form>

@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('select[name="patient_id"]').on('change', function() {
            var patientId = $(this).val();
            var $ward_id = $('#ward_id');
            var $medicine_id = $('#medicine_id');

            console.log(patientId);

            $.ajax({
                type: 'GET',
                url: "{{ route('admin.treatments.getWardList') }}",
                data: {
                    patient_id: patientId
                },
                success: function(response) {
                    $ward_id.html('<option value="" selected>Please Select</option>');
                    $.each(response.ward, function(id, ward) {
                        var room = ward.room;
                        var roomNumber = room.room_number;
                        $ward_id.append('<option value="' + ward.id + '">Room Number: ' + roomNumber + ', Ward Number: ' + ward.ward_number + '</option>');
                    });
                    $medicine_id.html('<option value="" selected>-- Please Select --</option>');
                    $.each(response.medicine, function(id, medicine) {
                        $medicine_id.append('<option value="' + medicine.id + '">' + medicine.name + '</option>');
                    });
                    $('#get_ward').show(0);
                    $('#get_medicine').show(0);
                    $('#treatment_information').hide();
                    $('#medicine_information').hide();
                },
            });
        });
    });

    var i = 0;
    var check_support_doctor_number = 0;

    $("#add_doctor").click(function() {
        if (check_support_doctor_number == 0) {
            var newRow =
                '<div class="row">' +
                '<div class="col-lg-10">' +
                '<div class="mb-3">' +
                '<label class="form-label">Support Doctor<span class="text-danger">*</span></label>' +
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
    var check_support_nurse_number = 0;

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

    $("#add_medicine").click(function() {
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
        ++k;
        $("#medicines_table").append(newRow);
    });

    $(document).on('click', '.remove-input-field-medicine', function() {
        $(this).closest('.row').remove();
    });
</script>
@endpush