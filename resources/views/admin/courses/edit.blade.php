@extends('admin.layouts.app')
@push('livewire-style')
    @livewireStyles
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
@endpush
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

        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @livewire('admin.course',['trainers'=>$trainers , 'course'=>$course])
        </form>

@endsection
@push('livewire-script')
    @livewireScripts
@endpush
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
        $(document).on('change', '.changeExisting', function (e) {
            if(this.value == 1){
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            }
        });
        $(document).ready(function () {
            var editor = $('.ckeditor').ckeditor();
            let des = {{$course->description}};
            CKEDITOR.editor.setData(des)
        });
    </script>
@endpush
