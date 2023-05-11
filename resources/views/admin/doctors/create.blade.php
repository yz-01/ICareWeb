@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Doctor</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.doctors.index') }}">Doctor List</a>
                    </li>
                    <li class="breadcrumb-item active">Doctor List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Doctor Information</h4>
                    <div class="mb-3">
                        <label class="form-label">Photo</label>
                        <div class="file-upload" style="border-radius:65px">
                            <input type="file" name="image" onchange="readURL(this,1);" style="z-index:2;">
                            <div class="camera-bg" style="display: none" id="camera1"></div>
                            <i id="imageResultIcon1" class="fa fa-plus" style="border-radius:15px;"></i>
                            <img id="imageResult1" src="" class="w-100 h-100" style="display:none;object-fit:contain;" value="{{ old('file') }}">
                        </div>
                        <label class="text-danger">***Maximum file size to upload is 8MB (8192 KB)***</label>
                        @error('image') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch<span class="text-danger">*</span></label>
                        <select class="form-select @error('branch_id') is-invalid @enderror" name="branch_id">
                            <option selected="" value="">Select Branch</option>
                            @foreach($branch as $branches)
                            <option value="{{ $branches->id }}">{{ $branches->name }}</option>
                            @endforeach
                        </select>
                        @error('branch_id') <div id="val-username-error" class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') ?: '' }}">
                        @error('username')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') ?: '' }}">
                        @error('name')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="identity_card">Identity Card</label>
                        <input type="tel" class="form-control @error('identity_card') is-invalid @enderror" name="identity_card" placeholder="Identity Card" value="{{ old('identity_card') ?: '' }}">
                        @error('identity_card')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') ?: '' }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?: '' }}">
                        @error('email')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="area_of_experise">Area of Experise</label>
                        <input type="area_of_experise" class="form-control @error('area_of_experise') is-invalid @enderror" name="area_of_experise" placeholder="Area of Experise" value="{{ old('area_of_experise') ?: '' }}">
                        @error('area_of_experise')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Doctor Account Password</h4>
                    <div class="card mb-2">
                        <div class="card-body py-2"  style="background-color: rgba(128, 128, 128, 0.116); ">
                            <span class="text-danger" style="line-height: 25px;">
                                ***Password should be alphanumeric   <br />
                                ***Password must be at least 8 characters  <br />
                                ***Password must include Uppercase & Lowercase   <br />
                                ***Password must contain a special character (@, $, !, &, etc)
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
