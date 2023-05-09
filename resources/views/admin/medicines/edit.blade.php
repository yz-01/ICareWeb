@extends('admin.layouts.app')

@section('content')
<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Edit Medicine - {{ $medicine->title }}</h4>
        </div>
        <div class="page-title-left d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb mt-n3 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.medicines.index')}}">Medicine List</a></li>
                <li class="breadcrumb-item active">Edit Medicine </li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page Title -->

<form action="{{route('admin.medicines.update', $medicine->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Edit Medicine </h4>
                    @error('message')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-2"></i>
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <div class="file-upload w-100">
                                    <input type="file" name="image" onchange="readURL(this,1)" style="z-index:2; width: 100% !important;">
                                    <div class="camera-bg" id="camera1" style="left: auto !important;"></div>
                                    @if ($medicine->image)
                                    <img id="imageResult1" src="{{ asset($medicine->image) }}" class="w-100 h-100" style="object-fit: contain !important;" />
                                    @else
                                    <i class="fa fa-plus" id="imageResultIcon1" style="border-radius:5px;"></i>
                                    <img id="imageResult1" class="w-100 h-100" style="object-fit: contain !important; display: none;" />
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Branch</label>
                                <select class="form-select @error('branch_id') is-invalid @enderror" name="branch_id">
                                    <option selected="" value="">Select Type</option>
                                    @foreach($branch as $branches)
                                    <option value="{{ $branches->id }}" {{ $medicine->branch_id == $branches->id ? 'selected' : '' }}>{{ $branches->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Card -->
        </div>

        <div class="col-xl-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Content Information</h4>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $medicine->name }}">
                                @error('name') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="code" value="{{ $medicine->code }}">
                                @error('code') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="number" value="{{ $medicine->number }}">
                                @error('number') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="text-editor" name="description">{{ $medicine->description }}</textarea>
                                @error('description') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
    </div>
</form>
@endsection

@push('script')
<script>
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResultIcon1').hide();
                $('#imageResult1')
                    .attr('src', e.target.result);
                $('#imageResult1').show();
                $('#camera1').show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush