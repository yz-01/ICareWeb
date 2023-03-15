@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Course - {{ $course->title }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.courses.index') }}">Course List</a>
                    </li>
                    <li class="breadcrumb-item active">Course List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <h4 class="card-title mb-0">Course Information</h4>
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="ms-auto">
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Title :</th>
                                        <td>{{ $course->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description :</th>
                                        <td>{!! $course->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Hdrf Claimable :</th>
                                        <td>{{ $course->hdrf_claimable == '1' ? 'Yes':'No' }}</td>
                                        <th scope="row">Venue / Online :</th>
                                        <td>{{ $course->online==1 ? 'Online': $course->venue }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Start Time :</th>
                                        <td>{{ $course->start??'-' }}</td>
                                        <th scope="row">End Time :</th>
                                        <td>{{ $course->end??'-' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Duration  :</th>
                                        <td>{{ $course->duration ?: '-' }}{{ $course->duration>1 ?' days':' day' }}</td>
                                        <th scope="row">Trainer :</th>
                                        <td>{{ $course->trainer ?$course->trainer->name : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
