@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Room Type - {{ $room_type->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.roomTypes.index') }}">Room List</a>
                    </li>
                    <li class="breadcrumb-item active">Room Type List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Room Type Information</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Name :</th>
                                <td>{{ $room_type->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Maximum Number :</th>
                                <td>{{ $room_type->max_number }}</td>
                            </tr>
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
    $(document).on('click', '.delete-data-ward', function() {
        var id = $(this).data('id');
        var room_id = $(this).data('room_id');
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
                    var url = "{{ route('admin.wards.deleteDataWard', ['id' => '']) }}" + id + "&room_id=" + room_id;
                    window.location.href = url;
                }
            }
        });
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endpush