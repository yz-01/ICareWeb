@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Announcement</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item active">Announcement List</li>
                </ol>
            </div>

            <div class="page-title-right">
                <a href="{{route('admin.announcements.create')}}" class="text-white">
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
                    <div class="px-2 flex-fill mt-1">
                        <select class="form-select datatable-input" id="published_to" data-live-search="true">
                            <option value="">Select Publish To</option>
                            <option value="1">All</option>
                            <option value="2">Doctors</option>
                            <option value="2">Nurses</option>
                            <option value="2">Patients</option>
                        </select>
                    </div>
                    <div class="px-2 flex-fill mt-1">
                        <input type="text" class="form-control datatable-input" id="title" placeholder="Title" data-col-index="2">
                    </div>
                    <div class="ps-2 mt-1">
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