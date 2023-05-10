<style>
    .swal2-container .swal2-select{
        display: none !important;
    }
</style>

@if(session('success'))
    <script>
        $(function () {
            Swal.fire({
                title: "Succeed!",
                text: "{{ session('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
                heightAuto: false
            });
        })
    </script>
@endif

@if(session('error'))
    <script>
        $(function () {
            Swal.fire({
                title: "Failed!",
                text: "{{ session('error') }}",
                icon: "error",
                showConfirmButton: false,
                timer: 3000,
                heightAuto: false
            });
        })
    </script>
@endif

@if(session('warning'))
    <script>
        $(function () {
            Swal.fire({
                title: "Warning!",
                text: '{{ session('warning') }}',
                icon: "warning",
                type: 'warning',
                showConfirmButton: false,
                timer: 3000,
                heightAuto: false
            });
        })
    </script>
@endif

@if(session('info'))
    <script>
        $(function () {
            Swal.fire({
                title: "{{ __('message.failed')}}",
                text: '{{ session('info') }}',
                icon: "info",
                type: 'info',
                showConfirmButton: false,
                timer: 3000,
                heightAuto: false
            });
        })
    </script>
@endif