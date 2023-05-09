@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Room - {{ $room->room_number }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.rooms.index') }}">Room List</a>
                    </li>
                    <li class="breadcrumb-item active">Room List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Room Information</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Floor :</th>
                                <td>{{ $room->floor }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Room Number :</th>
                                <td>{{ $room->room_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Room Type :</th>
                                <td>{{ $room->room_type->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Branch :</th>
                                <td>{{ $room->branch->name }}</td>
                            </tr>
                            @foreach($ward as $wards)
                            <tr>
                                <th scope="row">Ward Number :</th>
                                <td>
                                    {{ $wards->ward_number }}
                                    &nbsp;
                                    <button type="submit" class="btn btn-danger waves-effect waves-light delete-data-ward" data-id="{{$wards->id}}" data-room_id="{{$room->id}}" data-toggle='tooltip' data-placement='top' title='Delete'>
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <form id="delete-ward-{{$wards->id}}" method="POST" action="{{ route('admin.wards.destroy', $wards->id) }}" class="destroy_{{$wards->id}} d-none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </td>
                            </tr>
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