@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="mb-sm-0 font-size-18">Trainer</h4>
                    <ol class="breadcrumb m-0 mt-3">
                        <li class="breadcrumb-item active">Trainer List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-none d-md-flex mb-3">
                        <div class="pe-2 flex-fill">
                            <input type="text" class="form-control datatable-input" id="code" placeholder="Code" data-col-index="2">
                        </div>
                        <div class="pe-2 flex-fill">
                            <input type="text" class="form-control datatable-input" id="name" placeholder="Name" data-col-index="2">
                        </div>
                        <div class="pe-2 flex-fill">
                            <input type="text" class="form-control datatable-input" id="email" placeholder="Email" data-col-index="2">
                        </div>
                        <div class="pe-2 flex-fill">
                            <input type="text" class="form-control datatable-input" id="identity_card" placeholder="Identity Card" data-col-index="2">
                        </div>
                        <div class="px-2 flex-fill">
                            <select class="form-select select-status datatable-input" id="trainer_status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
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