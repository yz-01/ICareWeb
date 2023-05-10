@extends('doctor.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Treatment</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item active">Treatment List</li>
                </ol>
            </div>

            <div class="page-title-right">
                <a href="{{route('doctor.treatments.create')}}" class="text-white">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Create</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!--begin::Card-->
    <div class="col-12">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin: Datatable-->
                <div class="d-md-flex mb-3 mt-1">
                    <div class="px-2 flex-fill">
                        <select class="form-select datatable-input" id="patient_id">
                            <option value="">Select Patient</option>
                            @foreach($patient as $patients)
                            <option value="{{ $patients->id }}">{{ $patients->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-2 flex-fill">
                        <select class="form-select datatable-input" id="doctor_id">
                            <option value="">Select Doctor</option>
                            @foreach($doctor as $doctors)
                            <option value="{{ $doctors->id }}">{{ $doctors->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-2 flex-fill">
                        <select class="form-select datatable-input" id="nurse_id">
                            <option value="">Select Nurse</option>
                            @foreach($nurse as $nurses)
                            <option value="{{ $nurses->id }}">{{ $nurses->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-2 flex-fil">
                        <input type="text" class="form-control datatable-input" id="title" placeholder="Title" data-col-index="2">
                    </div>
                    <div class="px-2 flex-fil">
                        <button type="button" id="subBtn" class="btn btn-primary btn-primary--icon">
                            <i class="fas fa-search"></i>
                        </button>
                        <button type="button" id="clearBtn" class="btn btn-secondary btn-secondary--icon">
                            <i class="fas fa-redo"></i>
                        </button>
                    </div>
                </div>
                {{$dataTable->table(['class'=>'table table-responsive table-checkable dataTable dtr-inline w-100'], false)}}
                <!--end: Datatable-->
            </div>
        </div>
    </div>
    <!--end::Card-->
</div>
@endsection

@push('script')
{{$dataTable->scripts()}}

<script>
    $('.select-status').select2({
        placeholder: 'Select Status',
        minimumResultsForSearch: Infinity
    });
</script>
@endpush