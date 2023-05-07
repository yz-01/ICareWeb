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
                                <select class="form-select @error('branch_id') is-invalid @enderror" name="branch_id">
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
            <!-- End Card -->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Treatment Information</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Ward<span class="text-danger">*</span></label>
                                <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block; font-size: 16px;">Please Select Patient ! ! !</div>
                            </div>
                        </div>
                        <div id="wardRadioGroup">
                            <!-- The radio select form will be rendered here -->
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
            <!-- End Card -->
        </div>
    </div>
</form>

@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('select[name="branch_id"]').on('change', function() {
            var patientId = $(this).val();

            $.ajax({
                type: 'GET',
                url: "{{ route('admin.treatments.getWardList') }}",
                data: {
                    patient_id: patientId
                },
                success: function(response) {
                    // Clear any existing radio options
                    console.log(response.branch);
                    $('#wardRadioGroup').empty();

                    // Create radio options based on the ward response
                    $.each(response.ward, function(index, ward) {
                        var radioOption = $('<input>')
                            .attr('type', 'radio')
                            .attr('name', 'ward_id')
                            .attr('value', 'ward.id')
                            .attr('id', 'ward_' + 'ward.id');

                        var radioLabel = $('<label>')
                            .attr('for', 'ward_' + 'ward.id')
                            .text('ward.name');

                        $('#wardRadioGroup').append(radioOption, radioLabel);
                    });
                },
            });
        });
    });
</script>
@endpush