<div>
    <div class="row">
        <div class="col-3">
            <a href="{{route('admin.treatments.show',$item->id)}}">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View'>
                    <i class="fas fa-eye"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <a href="{{route('admin.treatments.history',['treatment_id' => $item->id])}}">
                <button type="button" class="btn btn-success waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View Treatment Process'>
                    <i class="fas fa-history"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <a href="{{route('admin.treatments.edit',$item->id)}}">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='Edit'>
                    <i class="fas fa-edit"></i>
                </button>
            </a>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-danger waves-effect waves-light delFunc" data-id="{{$item->id}}" data-toggle='tooltip' data-placement='top' title='Delete'>
                <i class="fas fa-trash-alt"></i>
            </button>
            <form id="delete-treatment-{{$item->id}}" method="POST" action="{{ route('admin.treatments.destroy', $item->id) }}" class="destroy_{{$item->id}} d-none">
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