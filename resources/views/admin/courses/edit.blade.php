@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Course Edit - {{ $course->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.courses.index') }}">Course List</a>
                    </li>
                    <li class="breadcrumb-item active">Course Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Course Information</h4>
                    <div class="form-group mb-3">
                        <label for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') ?: $course->title  }}">
                        @error('title')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Description<span class="text-danger">*</span></label>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror">
                            {{ old('desc') ?: $course->description  }}
                        </textarea>
                        @error('desc')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="claimable">Hrdf claimable</label>
                        <select name="claimable" class="form-control @error('claimable') is-invalid @enderror">
                            <option value="1" {{ old('claimable') == 1 ? 'selected' : ($course->claimable  == 1 ? 'selected' : '')}}>Yes</option>
                            <option value="2" {{ old('claimable') == 2 ? 'selected' : ($course->claimable  == 2 ? 'selected' : '')}}>No</option>
                        </select>
                        @error('claimable')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="datetime">Date Time<span class="text-danger">*</span></label>
                        <input type="datetime-local" class="form-control @error('datetime') is-invalid @enderror" name="datetime" placeholder="Date Time" value="{{ old('datetime') ?: $course->datetime  }}">
                        @error('datetime')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="duration">Duration in Day(s)<span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" placeholder="Duration" value="{{ old('duration') ?: $course->duration }}">
                        @error('duration')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="venue">Venue / Online<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" placeholder="Venue" value="{{ old('venue') ?: $course->venue }}">
                        @error('venue')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="venue">Trainer<span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-10">
                                <select name="trainer" class="form-control @error('trainer') is-invalid @enderror">
                                    <option value="">--Select a trainer--</option>
                                    @forelse($trainers as $trainer)
                                        <option value="{{$trainer->id}}" {{ old('trainer') == $trainer->id ? 'selected' : ($course->trainer ? ($course->trainer->id == $trainer->id ? 'selected' : '') : '')}}>{{$trainer->name}}</option>
                                    @empty
                                        <option value="" disabled>No trainer</option>
                                    @endforelse
                                </select>
                                @error('trainer')
                                <div class="invalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="col-2 ">
                                <a href="{{route('trainer.register.create')}}" target="_blank">
                                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='Create New Trainer'>
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Update Information</button>
                </div>
            </div>
        </form>
    </div>
</div>
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

                reader.onload = function (e) {
                    $('#imageResultIcon'+id).hide();
                    $('#imageResult'+id)
                        .attr('src', e.target.result);
                    $('#imageResult'+id).show();
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
