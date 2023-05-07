@extends('admin.layouts.app')

@section('content')
<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Announcement - {{ $announcement->title }}</h4>
        </div>
        <div class="page-title-left d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb mt-n3 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.announcements.index')}}">Announcement List</a></li>
                <li class="breadcrumb-item active">Announcement Detail</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 d-flex">
                        <h4 class="card-title mb-4">Announcement Information</h4>
                        <a href="{{route('admin.announcements.edit',$announcement->id)}}" class="ms-auto px-1">
                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <tbody>
                            <tr>
                                <th scope="row">Image :</th>
                                <td>
                                    @if ($announcement->image)
                                    <img src="{{ asset($announcement->image) }}" alt="announcement-image" style="height: 100px;">
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Published To:</th>
                                <td>
                                    <span>
                                        @if($announcement->published_to == 1)
                                        All 
                                        @elseif($announcement->published_to == 2)
                                        Doctors
                                        @elseif($announcement->published_to == 3)
                                        Nurses
                                        @elseif($announcement->published_to == 4)
                                        Patients
                                        @else
                                        
                                        @endif
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Published To Branch:</th>
                                <td>
                                    <span>{{ $announcement->branch->name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Published At:</th>
                                <td>{{ date('d/m/Y H:i',strtotime($announcement->published_at)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Title:</th>
                                <td>{{ $announcement->title }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card">
            <div class="card-body scroll-container">
                <div class="col-lg-12 d-flex">
                    <h4 class="card-title mb-4">Description</h4>
                </div>

                <div class="overflow-scroll" style="max-height: 500px;">
                    {!! $announcement->description !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection