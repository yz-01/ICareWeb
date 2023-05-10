<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>I Care Management</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon/icon2.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('assets2/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets2/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets2/libs/bootstrap-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <!-- Styles -->
    <link href="{{ asset('assets2/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/icons.min.css') }}" rel="stylesheet">
    <style>
        .vertical-collpsed .vertical-menu #profileInfo
        {
            display: none;
            padding-left: 25px;
        }
    </style>
    @stack('style')
    @stack('livewire-style')

</head>
<body data-sidebar="dark">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>

    <!-- Full Loader -->
    <div class="loader-full">
        <div class="content">
            <div class="spinner-border text-white">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('patient.layouts.header')
        @include('patient.layouts.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('patient.layouts.footer')
        </div>
    </div>
</body>
<script src="{{ asset('assets2/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets2/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets2/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets2/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets2/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets2/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets2/libs/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets2/libs/tinymce6/tinymce/tinymce.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets2/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets2/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<!-- Bootstrap Editable js -->
<script src="{{ asset('assets2/libs/bootstrap-editable/js/index.js') }}"></script>

<!-- Sweet Alerts js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap Datepicker -->
<script src="{{ asset('assets2/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets2/js/app.js') }}"></script>

<script>
    $(document).ready(function() {
        tinymce.init({
            selector: 'textarea.text-editor',
            plugins: 'lists link',
            toolbar: [
                { name: 'history', items: [ 'undo', 'redo' ] },
                { name: 'styles', items: [ 'styles' ] },
                { name: 'formatting', items: [ 'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript' ] },
                { name: 'colors', items: [ 'forecolor', 'backcolor' ] },
                { name: 'links', items: [ 'link', 'unlink' ] },
                { name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ] },
                { name: 'lists', items: [ 'numlist', 'bullist' ] },
                { name: 'indentation', items: [ 'outdent', 'indent' ] },
            ],
            promotion: false,
            link_default_target: '_blank',
            link_target_list: false
        });
        
        $('.btn-logout').on('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout!'
            }).then((result) => {
                if (result.value) {
                    $('#logout-form').submit();
                }
            })
        });
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@include('patient.layouts.sweetalerts')
@stack('livewire-script')
@stack('script')
</html>
