@extends('nurse.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Treatment History</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item"><a href="{{route('nurse.treatments.index')}}">Treatment List</a></li>
                    <li class="breadcrumb-item active">Treatment History List</li>
                </ol>
            </div>

            <div class="page-title-right">
                <a href="{{route('nurse.treatments.historyCreate', ['treatment_id' => $treatment])}}" class="text-white">
                    <button type="button" class="btn btn-primary waves-effect waves-light">Create</button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <div class="d-md-flex mb-3 mt-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Doctor Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $histories)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $histories->date }}</td>
                                <td>{{ $histories->title }}</td>
                                <td>{!! $histories->doctor_remark !!}</td>
                                <td>
                                    <a href="{{route('nurse.treatments.historyShow', ['treatment_id' => $treatment, 'history_id' => $histories->id])}}">
                                        <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View'>
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('nurse.treatments.historyEdit', ['treatment_id' => $treatment, 'history_id' => $histories->id])}}">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='Edit'>
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-danger waves-effect waves-light delFunc" data-id="{{$histories->id}}" data-toggle='tooltip' data-placement='top' title='Delete'>
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
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
@endsection

@push('script')
<script>
    $(document).on('click', '.delFunc', function() {
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
                    var url = "{{ route('nurse.treatments.historyDelete', ['id' => '']) }}" + id;
                    window.location.href = url;
                }
            }
        });
    });
</script>
@endpush