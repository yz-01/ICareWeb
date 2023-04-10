@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Agent Password Change - {{ $agent->name }}</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.agents.index') }}">Agent List</a>
                    </li>
                    <li class="breadcrumb-item active">Agent Password Change</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('admin.agents.updatePassword', $agent->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Agent Account Password Change</h4>
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