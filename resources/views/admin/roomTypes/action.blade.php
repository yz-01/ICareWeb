<div>
    <div class="row">
        <div class="col-3">
            <a href="{{route('admin.rooms.roomTypeShow', ['id' => $item->id])}}">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View'>
                    <i class="fas fa-eye"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <a href="{{route('admin.rooms.roomTypeEdit', ['id' => $item->id])}}">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='Edit'>
                    <i class="fas fa-edit"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-danger delete-data-room-type" data-id="{{ $item->id }}">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    $(document).on('click', '.delete-data-room-type', function() {
        var id = $(this).data('id');
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                if (id != null) {
                    var url = "{{ route('admin.rooms.roomTypeDelete', ['id' => '']) }}" + id;
                    window.location.href = url;
                }
            }
        });
    });
</script>