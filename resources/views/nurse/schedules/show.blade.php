@extends('nurse.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Room - {{ $room->room_number }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('nurse.rooms.index') }}">Room List</a>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection