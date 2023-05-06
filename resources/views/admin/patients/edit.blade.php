@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Patient Edit - {{ $patient->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.patients.index') }}">Patient List</a>
                    </li>
                    <li class="breadcrumb-item active">Patient Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <form action="{{ route('admin.patients.update', $patient->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Patient Information</h4>
                    <div class="form-group mb-3">
                        <label for="formFile" class="form-label">Photo</label>
                        <div class="file-upload" style="border-radius:65px;">
                            <input type="file" name="image" onchange="readURL(this,1);" style="z-index: 2;" class="">
                            <div class="camera-bg"></div>
                            @if ($patient->image == null)
                                <img id="imageResult1" src="{{ asset('images/default/profile.png') }}" class="w-100 h-100" style="object-fit: cover !important;"/>
                            @else
                                <img id="imageResult1" src="{{ asset($patient->image) }}" class="w-100 h-100" style="object-fit:contain;">
                            @endif
                        </div>
                        @error('image') <div id="val-username-error"
                            class="invalid-feedback animated fadeInUp" style="display: block;">{{$message}}</div>
                        @enderror
                        <label class="text-danger">***Maximum file size to upload is 8MB (8192 KB)***</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') ?: $patient->name }}">
                        @error('name')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="identity_card">Identity Card</label>
                        <input type="tel" class="form-control @error('identity_card') is-invalid @enderror" name="identity_card" placeholder="Identity Card" value="{{ old('identity_card') ?: $patient->identity_card }}">
                        @error('identity_card')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" value="{{ old('phone') ?: $patient->phone }}">
                        @error('phone')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') ?: $patient->email }}">
                        @error('email')
                        <div class="invalid-feedback">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Update Information</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('admin.patients.updatePassword', $patient->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Patient Account Password Change</h4>
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
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                    <button class="btn btn-light " type="button" id="password_confirmation-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>  
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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