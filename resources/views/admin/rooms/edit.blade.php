@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Room Edit - {{ $room->room_number }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.rooms.index') }}">Room List</a>
                    </li>
                    <li class="breadcrumb-item active">Room Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Room Information</h4>
                            <div class="form-group mb-3">
                                <label for="floor">Floor<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('floor') is-invalid @enderror" name="floor" placeholder="Floor" value="{{ $room->floor }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="room_number">Room Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('room_number') is-invalid @enderror" name="room_number" placeholder="Room Number" value="{{ $room->room_number }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">Room Type<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('room_type_id') is-invalid @enderror" name="room_type_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($room_type as $room_types)
                                    <option value="{{ $room_types->id }}" {{ $room->room_type_id == $room_types->id ? 'selected' : '' }}>{{ $room_types->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">Branch<span class="text-danger">*</span></label>
                                <select class="form-select select-city @error('branch_id') is-invalid @enderror" name="branch_id">
                                    <option value="">-- Please Select --</option>
                                    @foreach($branch as $rooms)
                                    <option value="{{ $rooms->id }}" {{ $room->branch_id == $rooms->id ? 'selected' : '' }}>{{ $rooms->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Ward Information</h4>
                            <table class="table table-nowrap mb-0">
                                <tbody>
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
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
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
    // $(".select-role").select2({
    //     placeholder: "Select a role",
    //     minimumResultsForSearch: Infinity
    // });
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResultIcon' + id).hide();
                $('#imageResult' + id)
                    .attr('src', e.target.result);
                $('#imageResult' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFunction2() {
        var x = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush