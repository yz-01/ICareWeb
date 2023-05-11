@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div>
                <h4 class="mb-sm-0 font-size-18">Room Type</h4>
                <ol class="breadcrumb m-0 mt-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.roomTypes.index') }}">Room Type List</a>
                    </li>
                    <li class="breadcrumb-item active">Room Type List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('admin.rooms.roomTypeStore') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Room Type Information</h4>
                            <div class="form-group mb-3">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') ?: '' }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="max_number">Maximum Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('max_number') is-invalid @enderror" name="max_number" placeholder="Maximum Number" value="{{ old('max_number') ?: '' }}">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@push('script')
<script>
    $('.upload.logo').click(function() {
        $('[name="logo"]').trigger('click');
    })

    $('.upload.logo_sm').click(function() {
        $('[name="logo_sm"]').trigger('click');
    })

    $('[name="logo"]').change(function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.upload.logo').find('.logo-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    $('[name="logo_sm"]').change(function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.upload.logo_sm').find('.logo-sm-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imageResultIcon' + id).hide();
                $('#imageResult' + id)
                    .attr('src', e.target.result);
                $('#imageResult' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush