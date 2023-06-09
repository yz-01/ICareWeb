@extends('admin.layouts.app')

@section('content')
<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Create Announcement</h4>
        </div>
        <div class="page-title-left d-sm-flex align-items-center justify-content-between">
            <ol class="breadcrumb mt-n3 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.announcements.index')}}">Announcement List</a></li>
                <li class="breadcrumb-item active">Create Announcement</li>
            </ol>
        </div>
    </div>
</div>
<!-- End Page Title -->

<form action="{{route('admin.announcements.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="row">

        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create Announcement</h4>
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
                                <label for="formFile" class="form-label">Image<span class="text-danger">*</span></label>
                                <div class="file-upload w-100">
                                    <input type="file" name="image" onchange="readURL(this,1)" style="z-index:2; width: 100% !important;" required>
                                    <div class="camera-bg" style="display: none; left: auto !important;" id="camera1"></div>
                                    <i class="fa fa-plus" id="imageResultIcon1" style="border-radius:5px;"></i>
                                    <img id="imageResult1" class="w-100 h-100" style="object-fit: contain !important; display: none;" />
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Published to<span class="text-danger">*</span></label>
                                <select class="form-select @error('published_to') is-invalid @enderror" name="published_to" id="published_to" required>
                                    <option selected="" value="">-- Please Select --</option>
                                    <option value="1" {{ old('published_to') == 1 ? 'selected' : '' }}>All</option>
                                    <option value="2" {{ old('published_to') == 2 ? 'selected' : '' }}>Doctors</option>
                                    <option value="3" {{ old('published_to') == 3 ? 'selected' : '' }}>Nurses</option>
                                    <option value="3" {{ old('published_to') == 3 ? 'selected' : '' }}>Patients</option>
                                </select>
                                @error('published_to') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Published to Branch<span class="text-danger">*</span></label>
                                <select class="form-select @error('branch_id') is-invalid @enderror" name="branch_id">
                                    <option selected value="">All Branches</option>
                                    @foreach($branch as $branches)
                                    <option value="{{ $branches->id }}">{{ $branches->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Published At<span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" placeholder="Published Date" name="published_at" value="{{ old('published_at') }}" required>
                                @error('published_at') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
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
                                <label class="form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                @error('title') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="text-editor" name="description">{{ old('description') }}</textarea>
                                @error('description') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
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
                $('#imageResultIcon' + id).hide();
                $('#imageResult' + id)
                    .attr('src', e.target.result);
                $('#imageResult' + id).show();
                $('#camera' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush