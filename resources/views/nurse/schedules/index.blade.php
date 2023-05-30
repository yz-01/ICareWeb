@extends('nurse.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Schedule</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item active">Schedule List</li>
                </ol>
            </div>

            <div class="page-title-right">
                <a href="{{ route('nurse.schedules.calendar') }}" class="btn btn-danger waves-effect waves-light">Calendar</a>
                <a href="{{ route('nurse.schedules.create') }}" class="btn btn-primary waves-effect waves-light">Create</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-none d-md-flex mb-3">
                    <div class="px-2 flex-fill">
                        <select class="form-select datatable-input" id="shift">
                            <option value="">Select Shift</option>
                            <option value="1">Morning Shift (8AM - 4PM)</option>
                            <option value="2">Afternoon Shift (4PM - 12AM)</option>
                            <option value="3">Night Shift (12AM - 8AM)</option>
                        </select>
                    </div>
                    <div class="pe-2 flex-fill">
                        <input type="date" class="form-control datatable-input" id="date" placeholder="Date" data-col-index="2">
                    </div>
                    <div class="ps-2">
                        <button type="button" id="subBtn" class="btn btn-primary btn-primary--icon">
                            <i class="fas fa-search"></i>
                        </button>
                        <button type="button" id="clearBtn" class="btn btn-secondary btn-secondary--icon">
                            <i class="fas fa-redo"></i>
                        </button>
                    </div>
                </div>
                {{$dataTable->table(['class'=>'table table-checkable dataTable dtr-inline w-100'], false)}}
            </div>
        </div>
    </div>
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