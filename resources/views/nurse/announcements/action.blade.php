<div>
    <div class="row">
        <div class="col-3">
            <a href="{{route('nurse.announcements.show',$item->id)}}">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light" data-toggle='tooltip' data-placement='top' title='View'>
                    <i class="fas fa-eye"></i>
                </button>
            </a>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>