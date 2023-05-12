@extends('doctor.layouts.app')

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
        </div>
    </div>
</div>

<div class="row">
    <!--begin::Card-->
    <div class="col-12">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin: Datatable-->
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