@extends('doctor.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item active">Welcome to I Care Management</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                Hi, <span class="text-danger">{{ auth()->user()->name }}</span> Welcome Back to I Care Management!
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow p-0" style="border-radius: 20px">
            <div class="card-body p-0" style="border-radius: 20px">
                <img src="{{ asset('images/icon/logo.png') }}" style="width: 100%; border-radius: 20px;" />
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card" style="border-radius: 10px">
            <div class="card-body py-2" style="background: linear-gradient(180deg, rgba(0,198,255,1) 100%, rgba(64,71,205,1) 100%); border-radius: 10px 10px 0px 0px">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="card-title mb-0">Announcement</h5>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row scroll-container">
                    <div class="col-lg-12" style="max-height: 260px; overflow: scroll;">
                        <div class="row">
                            @if($announcement)
                            <div class="col-lg-12 d-flex py-3" style="justify-content: space-around">
                                @if ($announcement->image != null)
                                <div>
                                    <a href="" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                        <img src="{{ asset($announcement->image) }}" style="width: 100px; border-radius: 20px; height: 100px" />
                                    </a>
                                </div>
                                @endif
                                <div class="px-3 flex-grow-1">
                                    <div class="col-lg-12">
                                        <div class="d-flex" style="justify-content: space-around">
                                            <h5 style="font-weight: 700">
                                                {{ $announcement->title }}
                                            </h5>
                                            <div class="ms-auto text-end">
                                                <h6>by {{ $announcement->admin->name }}</h6>
                                                <h6>{{ date('d M Y, H:i', strtotime($announcement->published_at)) }}</h6>
                                            </div>
                                        </div>
                                        <p class="text-truncate">{!! nl2br($announcement->description) !!}</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-12 pt-3">
                                No announcement..
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white" style="border-radius: 0px 0px 10px 10px">
                <a href="{{route('doctor.announcements.index')}}">
                    <button class="btn btn-light waves-effect waves-dark" style="width: 100%; font-weight: 600; background: linear-gradient(180deg, rgba(0,198,255,1) 100%, rgba(64,71,205,1) 100%); color: #263B93"><span class="px-2">View More</span> <i class="fas fa-chevron-right"></i></button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection