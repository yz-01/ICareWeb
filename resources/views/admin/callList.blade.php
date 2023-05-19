@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Patient Calling List</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item active">Patient Calling List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Patient Calling Information</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Patient Name</th>
                                        <th>Instruction</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patient_call as $patient_calls)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $patient_calls->patient->name }}</td>
                                        <td>{{ $patient_calls->instruction }}</td>
                                        <td>{{ $patient_calls->date }}</td>
                                        <td>{{ $patient_calls->time }}</td>
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
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
    $("#selected_doctor").click(function() {
        $('#group_doctor').show(0);
        $('#group_nurse').hide();
        $('#group_date').show(0);
        $('#group_shift').show(0);
    });

    $("#selected_nurse").click(function() {
        $('#group_nurse').show(0);
        $('#group_doctor').hide();
        $('#group_date').show(0);
        $('#group_shift').show(0);
    });
</script>
@endpush