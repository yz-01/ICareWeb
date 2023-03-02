<div>
    <div class="row">
        <div class="col-3">
            <a href="{{route('admin.admins.show',$item->id)}}">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light">
                    <i class="fas fa-eye"></i>
                </button>
            </a>
        </div>
        @if($item->code != 'A00001' || $item->code == auth()->user()->code)
            <div class="col-3">
                <a href="{{route('admin.admins.edit',$item->id)}}">
                    <button type="button" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-edit"></i>
                    </button>
                </a>
            </div>
        @endif
        @if($item->code != 'A00001')
            <div class="col-3">
                <button type="submit" class="btn btn-danger waves-effect waves-light delFunc" data-id="{{$item->id}}">
                    <i class="fas fa-trash-alt"></i>
                </button>
                <form id="delete-admin-{{$item->id}}" method="POST" action="{{ route('admin.admins.destroy', $item->id) }}" class="destroy_{{$item->id}} d-none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </div>
        @endif
    </div>
</div>