<div>
    <div class="row">
        <!-- @if($item->status == 1)
        <div class="col-3">
            <a href="{{route('admin.wards.create', ['room_id' => $item->id])}}">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='Add Wards'>
                    <i class="fas fa-bed"></i>
                </button>
            </a>
        </div>
        @else
        <div class="col-3">
            <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View Wards' disabled>
                <i class="fas fa-bed"></i>
            </button>
        </div>
        @endif -->
        <div class="col-3">
            <a href="{{route('admin.rooms.show',$item->id)}}">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View'>
                    <i class="fas fa-eye"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <a href="{{route('admin.rooms.edit',$item->id)}}">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='Edit'>
                    <i class="fas fa-edit"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-danger waves-effect waves-light delFunc" data-id="{{$item->id}}" data-toggle='tooltip' data-placement='top' title='Delete'>
                <i class="fas fa-trash-alt"></i>
            </button>
            <form id="delete-room-{{$item->id}}" method="POST" action="{{ route('admin.rooms.destroy', $item->id) }}" class="destroy_{{$item->id}} d-none">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>